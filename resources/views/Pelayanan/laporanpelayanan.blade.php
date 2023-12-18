<table id="tabellaporanpelayanan" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Tanggal Masuk</th>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Keluhan Utama</th>
        <th class="text-center">===</th>
    </thead>
    <tbody>
        @foreach ($data as $d )
            <tr>
                <td>{{ $d->tgl_masuk }}</td>
                <td>{{ $d->no_rm }}</td>
                <td>{{ $d->nama_pasien}}</td>
                <td>{{ $d->keluhanutama}}</td>
                <td class="text-center"><button class="badge badge-info"><i class="bi bi-ticket-detailed"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
      $('#tabellaporanpelayanan').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "pageLength": 10
      });
  });
</script>
