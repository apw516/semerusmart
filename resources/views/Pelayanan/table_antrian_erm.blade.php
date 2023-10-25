<table id="tabelantrian_erm" class="table table-sm table-bordered table-hover">
    <thead class="bg-warning">
        <th>Nomor Antrian</th>
        <th>Nomor RM</th>
        <th>Nama Pasien</th>
        <th>Status</th>
    </thead>
    <tbody>
        @foreach ($antrian as $a)
            <tr class="pilihpasien" kodekunjungan="{{ $a->kode_kunjungan }}" rm="{{ $a->no_rm }}">
                <td>{{ $a->kode_registrasi }}</td>
                <td>{{ $a->no_rm }}</td>
                <td>{{ $a->nama_px }}</td>
                <td>
                    @if ($a->status_kunjungan == 1)
                        Dalam antrian
                    @elseif ($a->status_kunjungan == 2)
                        Dalam pelayanan
                    @elseif ($a->status_kunjungan == 3)
                        Sudah diperiksa
                    @elseif ($a->status_kunjungan == 4)
                        Selesai
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabelantrian_erm').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#tabelantrian_erm').on('click', '.pilihpasien', function() {
        kodekunjungan = $(this).attr('kodekunjungan');
        rm = $(this).attr('rm');
        spinner = $('#loader2');
        spinner.show();
        $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodekunjungan,
                    rm
                },
                url: '<?= route('form_erm') ?>',
                success: function(response) {
                    spinner.hide()
                    $('.form-ermnya').html(response);
                }
            });

    })
</script>
