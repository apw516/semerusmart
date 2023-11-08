<table id="tb_user" class="table table-sm table-stripped table-bordered table-hover">
    <thead>
        <th>Username</th>
        <th>Nama</th>
        <th>Hak akses</th>
        <th>Unit</th>
        <th>Kode Paramedis</th>
        <th>Email</th>
        <th>Status</th>
        <th class="text-center">---</th>
    </thead>
    <tbody>
        @foreach ($user as $u)
            <tr>
                <td>{{ $u->username }}</td>
                <td>{{ $u->nama }}</td>
                <td>@if($u->hak_akses == 1) Super Admin @elseif ($u->hak_akses == 2) Admin @endif</td>
                <td>{{ $u->unit }}</td>
                <td>{{ $u->kode_paramedis }}</td>
                <td>{{ $u->username }}</td>
                <td>@if($u->is_activated == 1) Aktif @else Tidak aktif @endif</td>
                <td class="text-center"><button id="{{ $u->id }}" class="btn btn-sm btn-warning edituser"
                        data-toggle="modal" data-target="#modaledituser"><i class="bi bi-pencil-square"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="modaledituser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_detail_user">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpaneditpasien()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#tb_user').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(".edituser").on('click', function(event) {
        id = $(this).attr('id');
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                id
            },
            url: '<?= route('detailuser') ?>',
            success: function(response) {
                $('.v_detail_user').html(response);
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    });

    function simpaneditpasien() {
        var data = $('.form-edit-pasien').serializeArray();
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
            url: '<?= route('simpaneditpasien') ?>',
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
