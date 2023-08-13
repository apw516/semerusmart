   <table id="tabelpasien" class="table table-sm table-hover table-bordered mt-5">
       <thead class="bg-secondary">
           <th>Nomor RM</th>
           <th>NIK</th>
           <th>Nama</th>
           <th>Alamat</th>
       </thead>
       <tbody>
           @foreach ($pasien as $p)
               <tr class="pilihpasien" data-toggle="modal" data-target="#modalpendaftaran">
                   <td>{{ $p->no_rm }}</td>
                   <td>{{ $p->nik }}</td>
                   <td>{{ $p->nama_px }}</td>
                   <td>{{ $p->nama_px }}</td>
               </tr>
           @endforeach
       </tbody>
   </table>
