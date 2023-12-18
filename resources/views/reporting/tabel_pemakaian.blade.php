<table id="tabelpemakaian" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Nama Obat</th>
        <th>Bulan</th>
        <th>QTY</th>
    </thead>
    <tbody>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->nama_tarif }}</td>
                <td>{{ $d->bulan }}</td>
                <td>{{ $d->qty }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabelpemakaian').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "dom": 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });
