<div class="card mt-3">
    <div class="card-header bg-dark">{{ $title }}</div>
    <div class="card-body">
        <table id="tabelobat" class="table table-sm table-bordered table-hover">
            <thead class="bg-info">
                <th>Nama Obat</th>
                <th>Tarif</th>
            </thead>
            <tbody>
                @foreach ($obat as $t)
                    <tr class="pilihlayanan" namatindakan ="{{ $t->NAMA_TARIF }}"
                        tarif ="{{ $t->TOTAL_TARIF_CURRENT }}"
                        kodetarifheader="{{ $t->KODE_TARIF_HEADER }}"
                        kodetarifdetail="{{ $t->KODE_TARIF_DETAIL }}"
                        id="{{ $t->KODE_TARIF_DETAIL }}">
                        <td>{{ $t->NAMA_TARIF }}</td>
                        <td>IDR {{ number_format($t->TOTAL_TARIF_CURRENT, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
      $(function() {
        $('#tabelobat').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 4
        });
    });
</script>
