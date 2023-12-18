<table id="tabel_paramedis" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Kode Paramedis</th>
        <th>Nama Paramedis</th>
        {{-- <th>Kode Dokter Jkn</th> --}}
        <th>Unit</th>
        <th>SIP Dokter</th>
        <th class="text-center">===</th>
    </thead>
    <tbody>
        @foreach ($par as $p)
            <tr>
                <td>{{ $p->kode_paramedis }}</td>
                <td>{{ $p->nama_paramedis }}</td>
                {{-- <td>{{ $p->kode_dokter_jkn}}</td> --}}
                <td>{{ $p->unit }}</td>
                <td>{{ $p->sip_dr }}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm editkaryawan" id="{{ $p->ID }}" data-toggle="modal"
                        data-target="#modaleditkary"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modaleditkary" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="staticBackdropLabel"> <i class="bi bi-person-plus-fill mr-1"></i>Edit Data
                    Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body formeditkary">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="bi bi-x mr-1"></i>Close</button>
                <button type="button" class="btn btn-primary" onclick="simpaneditkary()"><i
                        class="bi bi-save mr-1"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tabel_paramedis').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#tabel_paramedis').on('click', '.editkaryawan', function() {
        id = $(this).attr('id')
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                id
            },
            url: '<?= route('ambil_data_karyawan') ?>',
            success: function(response) {
                $('.formeditkary').html(response);
                spinner.hide()
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    })

    function simpaneditkary() {
        var data = $('.form_edit_kary').serializeArray();
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
            url: '<?= route('simpaneditkary') ?>',
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
                $('#modaleditkary').modal('hide')
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
                    get_master_kary()
                }
            }
        });
    }
</script>
