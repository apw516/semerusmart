<div class="card">
    <div class="card-header bg-success">Antrian Kasir</div>
    <div class="card-body">
        <table id="tabelkasir" class="table table-hover table-bordered">
            <thead class="bg-info">
                <th>Tanggal Masuk</th>
                <th>Nomor RM</th>
                <th>Nama</th>
                <th>Alamat</th>
            </thead>
            <tbody>
                @foreach ($cari_antrian as $c)
                    <tr class="bayar" kodekunjungan={{ $c->kode_kunjungan }}>
                        <td>{{ $c->tgl_masuk }}</td>
                        <td>{{ $c->no_rm }}</td>
                        <td>{{ $c->nama_px }}</td>
                        <td>{{ $c->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-5">
    <div class="card-header bg-success">Riwayat Pembayaran</div>
    <div class="card-body">
        <form class="form-inline mb-3">
            <div class="form-group mx-sm-2 mb-2">
                <label for="inputPassword2" class="sr-only">nomorrm</label>
                <input type="date" class="form-control" id="tanggalawal_r" placeholder="Tanggal awal" value="{{ $now }}">
            </div>
            <div class="form-group mx-sm-2 mb-2">
                <label for="inputPassword2" class="sr-only">ktp</label>
                <input type="date" class="form-control" id="tanggalakhir_r" placeholder="Tanggal akhir"
                    value="{{ $now }}">
            </div>
            <button type="button" class="btn btn-primary mb-2" onclick="riwayatpembayaran()"><i
                    class="bi bi-search mr-2"></i>Cari Pasien</button>
        </form>
        <div class="riwayat_kasir">

        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tabelkasir').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#tabelkasir').on('click', '.bayar', function() {
        kodekunjungan = $(this).attr('kodekunjungan')
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kodekunjungan
            },
            url: '<?= route('detail_pembayaran') ?>',
            success: function(response) {
                $('.detail_bayar').html(response);
                spinner.hide()
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    })
    $(document).ready(function() {
        riwayatpembayaran()
        })
    function riwayatpembayaran() {
        tglawal = $('#tanggalawal_r').val()
        tglakhir = $('#tanggalakhir_r').val()
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                tglawal,
                tglakhir
            },
            url: '<?= route('ambilriwayat_kasir') ?>',
            success: function(response) {
                $('.riwayat_kasir').html(response);
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    }
</script>
