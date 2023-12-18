<table id="tabeltarif" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Kode Tarif Header</th>
        <th>Nama Tarif</th>
        <th>Tanggal Input</th>
        <th class="text-center">===</th>
    </thead>
    <tbody>
        @foreach ($tar as $t)
            <tr>
                <td>{{ $t->KODE_TARIF_HEADER }}</td>
                <td>{{ $t->NAMA_TARIF }}</td>
                <td>{{ $t->TGL_INPUT }}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm updatetarif" data-toggle="modal" data-target="#modaledittarif"
                        kodeheader="{{ $t->KODE_TARIF_HEADER }}" title="Tambah detail ..."><i
                            class="bi bi-database-add"></i></button>
                    <button class="btn btn-info btn-sm detailtarif" data-toggle="modal" data-target="#modaldetailtarif"
                        kodeheader="{{ $t->KODE_TARIF_HEADER }}" title="Info detail ..."><i
                            class="bi bi-info-circle-fill"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modaledittarif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tarif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="modaldetailtarif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Tarif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

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
