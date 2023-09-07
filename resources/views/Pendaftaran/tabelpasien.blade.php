   <table id="tabelpasien" class="table table-sm table-hover table-bordered mt-5">
       <thead class="bg-secondary">
           <th>Nomor RM</th>
           <th>NIK</th>
           <th>Nama</th>
           <th>Alamat</th>
       </thead>
       <tbody>
           @foreach ($pasien as $p)
               <tr class="pilihpasien" data-toggle="modal" norm="{{ $p->no_rm }}" data-target="#modalpendaftaran">
                   <td>{{ $p->no_rm }}</td>
                   <td>{{ $p->nik }}</td>
                   <td>{{ $p->nama_px }}</td>
                   <td></td>
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
       $('#tabelpasien').on('click', '.pilihpasien', function() {
            rm = $(this).attr('norm')
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    rm
                },
                url: '<?= route('ambil_form_pendaftaran') ?>',
                success: function(response) {
                    $('.formnya_pendaftaran').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
       })
   </script>
