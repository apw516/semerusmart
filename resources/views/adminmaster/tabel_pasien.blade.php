<table id="tabelpasien" class="table table-sm table-hover">
    <thead>
        <th>No RM</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Tempat,Tanggal lahir</th>
        <th>Alamat</th>
        <th>===</th>
    </thead>
    <tbody>
        @foreach ($pasien as $p)
            <tr>
                <td>{{ $p->no_rm }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama_px }}</td>
                <td>{{ $p->tempat_lahir }} , {{ $p->tgl_lahir }} </td>
                <td>{{ $p->alamat }}</td>
                <td>
                    <button class="btn btn-warning btn-sm editpasien" data-toggle="modal" norm="{{ $p->no_rm }}"
                        data-target="#modaleditpasien"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modaleditpasien" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="staticBackdropLabel"> <i class="bi bi-person-plus-fill mr-1"></i>Edit Data
                    Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body formeditpasien">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="bi bi-x mr-1"></i>Close</button>
                <button type="button" class="btn btn-primary" onclick="simpaneditpasien()"><i
                        class="bi bi-save mr-1"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tabelpasien').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#tabelpasien').on('click', '.editpasien', function() {
        rm = $(this).attr('norm')
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                rm
            },
            url: '<?= route('ambil_data_pasien_edit') ?>',
            success: function(response) {
                $('.formeditpasien').html(response);
                spinner.hide()
                // $('#daftarpxumum').attr('disabled', true);
            }
        });
    })

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
            url: '<?= route('simpaneditpasien2') ?>',
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
