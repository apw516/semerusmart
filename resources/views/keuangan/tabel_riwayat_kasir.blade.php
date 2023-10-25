<table id="tabelriwayat_kasir" class="table table-hover table-bordered text-xs">
    <thead class="bg-info">
        <th>Tanggal Masuk</th>
        <th>Nomor RM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>action</th>
    </thead>
    <tbody>
        @foreach ($cari_antrian as $c)
            <tr class="bayar" kodekunjungan={{ $c->kode_kunjungan }}>
                <td>{{ $c->tgl_masuk }}</td>
                <td>{{ $c->no_rm }}</td>
                <td>{{ $c->nama_px }}</td>
                <td>{{ $c->alamat }}</td>
                <td>
                    @if ($c->status_kunjungan == 4)
                        Sudah Dibayar !
                    @endif
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-warning detailpembayaran" kodekunjungan="{{ $c->kode_kunjungan }}"
                        data-toggle="modal" data-target="#modaldetailkasir"><i class="bi bi-ticket-detailed"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="modaldetailkasir" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_t_r_k">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tabelriwayat_kasir').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('.detailpembayaran').click(function() {
        kodekunjungan = $(this).attr('kodekunjungan')
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kodekunjungan
            },
            url: '<?= route('ambilriwayat_bayar_kasir') ?>',
            success: function(response) {
                $('.v_t_r_k').html(response);
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    })
