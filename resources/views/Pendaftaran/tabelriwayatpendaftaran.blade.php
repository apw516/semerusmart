  <table id="tabelriwayatpendaftaran" class="table table-sm table-bordered table-hover mt-3">
      <thead class="bg-dark">
          <th>Tgl Masuk</th>
          <th>Nomor RM</th>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Status Kunjungan</th>
      </thead>
      <tbody>
        @foreach ($datakunjungan as $d )
            <tr>
                <td>{{ $d->tgl_masuk}}</td>
                <td>{{ $d->no_rm}}</td>
                <td>{{ $d->tgl_masuk}}</td>
                <td>{{ $d->kode_paramedis}}</td>
                <td>@if($d->status_kunjungan == 1) Dalam antrian @endif</td>
            </tr>
        @endforeach
      </tbody>
  </table>
