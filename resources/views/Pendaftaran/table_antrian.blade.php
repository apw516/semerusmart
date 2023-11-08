<h5>Data Antrian Pasien</h5>
<table id="tabelantrian" class="table table-sm table-bordered table-hover">
    <thead class="bg-warning">
        <th>Nomor Antrian</th>
        <th>Nomor RM</th>
        <th>Nama Pasien</th>
        <th>Status</th>
        <th>===</th>
    </thead>
    <tbody>
        @foreach ($antrian as $a)
            <tr>
                <td>{{ $a->kode_registrasi }}</td>
                <td>{{ $a->no_rm }}</td>
                <td>{{ $a->nama_px }}</td>
                <td>
                    @if ($a->status_kunjungan == 1)
                        Dalam antrian
                    @elseif ($a->status_kunjungan == 2)
                        Dalam pelayanan
                    @elseif ($a->status_kunjungan == 3)
                        Menuju Loket Pembayaran
                    @elseif ($a->status_kunjungan == 4)
                        Selesai
                    @endif
                </td>
                <td><button class="btn btn-success btn-sm panggilantrian" kodekunjungan="{{ $a->kode_kunjungan }}">Panggil</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabelantrian').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#tabelantrian').on('click', '.panggilantrian', function() {
        kodekunjungan = $(this).attr('kodekunjungan');
        Swal.fire({
            title: 'Berhasil Panggil Antrian ?',
            text: "Nomor Antrian A1",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Berhasil'
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
                        kodekunjungan,
                    },
                    url: '<?= route('updateantrian') ?>',
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
        })

    })
</script>
