<table id="tabelstokfar" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Tanggal Stok</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Stok Last</th>
        <th>Stok In</th>
        <th>Stok Out</th>
        <th>Stok Current</th>
        <th>===</th>
    </thead>
    <tbody>
        @foreach ($stok as $s )
            <tr>
                <td>{{ $s->tgl_stok}}</td>
                <td>{{ $s->kode_barang}}</td>
                <td>{{ $s->nama_barang}}</td>
                <td>{{ $s->stok_last}}</td>
                <td>{{ $s->stok_in}}</td>
                <td>{{ $s->stok_out}}</td>
                <td>{{ $s->stok_current}}</td>
                <td><button class="badge badge-info"><i class="bi bi-eye-fill"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabelstokfar').DataTable({
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
