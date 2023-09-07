<h5>Data Antrian Pasien</h5>
<table id="tabelantrian" class="table table-sm table-bordered table-hover">
    <thead class="bg-warning">
        <th>Nomor Antrian</th>
        <th>Nomor RM</th>
        <th>Nama Pasien</th>
        <th>Status</th>
    </thead>
    <tbody>
        @foreach ($antrian as $a )
        <tr class="panggilantrian">
            <td>{{ $a->kode_registrasi }}</td>
            <td>{{ $a->no_rm}}</td>
            <td>{{ $a->nama_px }}</td>
            <td>@if($a->status_kunjungan == 1) Dalam antrian @endif</td>
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

                }
            })

        })
</script>
