<button class="btn btn-danger mb-2 btn-sm retursemua" kode="{{ $kode }}"><i class="bi bi-arrow-clockwise mr-2"></i>
    Retur Semua</button>
<table class="table table-sm table-bordered table-hover">
    <thead>
        <th>---</th>
        <th>Kode Layanan Header</th>
        <th>Tarif</th>
        <th>Nama Tarif</th>
        <th>Status Layanan</th>
    </thead>
    <tbody>
        @foreach ($r as $a)
            <tr>
                <td><button class="btn btn-danger btn-sm retursatu" iddetail="{{ $a->id_detail }}"
                        nama="{{ $a->NAMA_TARIF }}"><i class="bi bi-journal-x mr-2"></i>Retur</button>
                </td>
                <td>{{ $a->kode_layanan_header }}</td>
                <td>{{ $a->total_tarif }}</td>
                <td>{{ $a->NAMA_TARIF }}</td>
                <td>
                    @if ($a->status_layanan_detail == 1)
                        Aktif
                    @elseif($a->status_layanan_detail == 2)
                        Sudah Dibayar
                    @elseif($a->status_layanan_detail == 8)
                        Retur
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $('.retursatu').click(function() {
        kode = $(this).attr('iddetail')
        nama = $(this).attr('nama')
        Swal.fire({
            title: 'Layanan Akan diretur ?',
            text: nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Retur Layanan !',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Yakin retur layanan ?',
                    showDenyButton: true,
                    confirmButtonText: 'Ya',
                    denyButtonText: `Batal`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        spinner = $('#loader2');
                        spinner.show();
                        $.ajax({
                            async: true,
                            type: 'post',
                            dataType: 'json',
                            data: {
                                _token: "{{ csrf_token() }}",
                                kode,
                            },
                            url: '<?= route('retursatulayanan') ?>',
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
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            }
        })
    });
    $('.retursemua').click(function() {
        kode = $(this).attr('kode')

    });
</script>
