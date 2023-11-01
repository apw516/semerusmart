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
                <td class="text-center"><button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
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
</script>
