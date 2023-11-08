<table id="tabeltarif" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Kode Tarif Header</th>
        <th>Nama Tarif</th>
        <th>Tanggal Input</th>
        <th class="text-center">===</th>
    </thead>
    <tbody>
        @foreach ($tar as $t )
            <tr>
                <td>{{ $t->KODE_TARIF_HEADER}}</td>
                <td>{{ $t->NAMA_TARIF}}</td>
                <td>{{ $t->TGL_INPUT}}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm" title="Tambah detail ..."><i class="bi bi-database-add"></i></button>
                    <button class="btn btn-info btn-sm" title="Info detail ..."><i class="bi bi-info-circle-fill"></i></button>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabeltarif').DataTable({
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
