<div class="card">
    <div class="card-header bg-info">Detail Layanan Pasien</div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-warning">
                <th>Kode Layanan Header</th>
                <th>Nama Tarif</th>
                <th>Total</th>
                <th>Status Pembayaran</th>
                <th>Status Layanan</th>
            </thead>
            <tbody>
                @php $gt = 0; @endphp
                @foreach ($detail as $d)
                    <tr>
                        <td>{{ $d->kode_layanan_header }}</td>
                        <td>{{ $d->NAMA_TARIF }}</td>
                        <td>IDR {{ number_format($d->grantotal_layanan, 2) }}</td>
                        <td>
                            @if($d->status_layanan_detail != 8)
                            @if($d->status_layanan == 1) Belum Dibayar @elseif($d->status_layanan == 2) Sudah dibayar @endif
                            @else
                            Retur
                            @endif
                        </td>
                        <td>
                            @if($d->status_layanan_detail == 1) Aktif
                            @elseif($d->status_layanan_detail == 8) Retur @endif
                        </td>
                    </tr>
                    @if($d->status_layanan == 1)
                        @php $gt = $gt + $d->grantotal_layanan @endphp
                   @endif
                @endforeach

                <tr class="bg-secondary">
                    <td colspan="4" class="text-center text-bold">GRAND TOTAL LAYANAN</td>
                    <td class="text-bold">IDR {{ number_format($gt, 2) }}</td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-success float-right mt-2 btn-lg ml-1" data-toggle="modal" data-target="#modalkasir"><i
                class="bi bi-cash-coin mr-2"></i>Bayar</button>
        <button class="btn btn-danger float-right mt-2 btn-lg"><i class="bi bi-x-square mr-2"></i>Batal</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalkasir" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Grand Total Layanan</label>
                    <input readonly ="text" class="form-control" id="grandtotal_layanan"
                        value="IDR {{ number_format($gt, 2) }}">
                    <input hidden type="text" class="form-control" id="grandtotal_layanan_2"
                        value="{{ $gt }}">
                    <input hidden type="text" class="form-control" id="kodekunjungan" value="{{ $kodekunjungan }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Uang Yang Dibayarkan</label>
                    <input type="text" class="form-control" id="uangbayar">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kembalian</label>
                    <input readonly type="text" class="form-control" id="kembalian">
                </div>
                <button type="button" class="btn btn-primary" onclick="hitungkembalian()"><i
                        class="bi bi-arrow-clockwise mr-2"></i>Hitung</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button disabled type="button" class="btn btn-success" id="tombolakhirbayar" onclick="bayarfinal()"><i
                        class="bi bi-cash-coin mr-2"></i>Bayar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function hitungkembalian() {
        gt = $('#grandtotal_layanan_2').val()
        ub = $('#uangbayar').val()
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                gt,
                ub
            },
            url: '<?= route('hitung_kembalian') ?>',
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops....',
                    text: 'Sepertinya ada masalah......',
                    footer: ''
                })
                spinner.hide();
            },
            success: function(data) {
                spinner.hide();
                if (data.kode != 200) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopss...',
                        text: 'error!!',
                        footer: ''
                    })
                } else {
                    k = data.kembalian
                    $('#kembalian').val(k)
                    if (k >= 0) {
                        $('#tombolakhirbayar').removeAttr('disabled', true)
                    }
                }
            }
        });
    }

    function bayarfinal() {
        gt = $('#grandtotal_layanan_2').val()
        kodekunjungan = $('#kodekunjungan').val()
        uangbayar = $('#uangbayar').val()
        kembalian = $('#kembalian').val()
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                gt,
                kodekunjungan,
                uangbayar,
                kembalian
            },
            url: '<?= route('bayarfinal') ?>',
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops....',
                    text: 'Sepertinya ada masalah......',
                    footer: ''
                })
                spinner.hide();
            },
            success: function(data) {
                spinner.hide();
                if (data.kode != 200) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopss...',
                        text: 'error!!',
                        footer: ''
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: data.message,
                        footer: ''
                    })
                    location.reload()
                }
            }
        });
    }
</script>
