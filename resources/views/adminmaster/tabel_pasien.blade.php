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
                <td><button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
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
</script>
