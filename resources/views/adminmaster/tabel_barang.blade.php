<table id="tabelbarang" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Distributor</th>
        {{-- <th>Stok</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th> --}}
        <th>Satuan</th>
        <th>Tgl Entry</th>
        <th>Last Update</th>
        <th class="text-center">===</th>
    </thead>
    <tbody>
        @foreach ($bar as $t)
            <tr>
                <td>{{ $t->kode_barang }}</td>
                <td>{{ $t->nama_barang }}</td>
                <td>{{ $t->id_distributor }}</td>
                {{-- <td>{{ $t->stok }}</td>
                <td>{{ $t->harga_jual }}</td>
                <td>{{ $t->harga_beli }}</td> --}}
                <td>{{ $t->satuan }}</td>
                <td>{{ $t->tgl_input }}</td>
                <td>{{ $t->last_update }}</td>
                <td class="text-center">
                    <button id="{{ $t->id }}" class="btn btn-warning btn-sm detailobat" data-toggle="modal"
                        data-target="#modaldetailobat" title="Tambah detail ..."><i
                            class="bi bi-database-add"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="modaldetailobat" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_d_o">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpanbarang()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#tabelbarang').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(".detailobat").on('click', function(event) {
        id = $(this).attr('id');
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                id
            },
            url: '<?= route('detail_barang') ?>',
            success: function(response) {
                $('.v_d_o').html(response);
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    });

    function simpanbarang() {
        var data = $('.formdetailobat').serializeArray();
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                data: JSON.stringify(data),
            },
            url: '<?= route('simpandetailbarang') ?>',
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
                if (data.kode == 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopss...',
                        text: data.message,
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
