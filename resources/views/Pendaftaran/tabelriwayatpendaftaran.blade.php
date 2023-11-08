  <table id="tabelriwayatpendaftaran" class="table table-sm table-bordered table-hover mt-3">
      <thead class="bg-dark">
          <th>Tgl Masuk</th>
          <th>Nomor RM</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>Nama Dokter</th>
          <th>Status Kunjungan</th>
          <th class="text-center">---</th>
      </thead>
      <tbody>
          @foreach ($datakunjungan as $d)
              <tr>
                  <td>{{ $d->tgl_masuk }}</td>
                  <td>{{ $d->no_rm }}</td>
                  <td>{{ $d->nama_pasien }}</td>
                  <td>{{ $d->alamat }}</td>
                  <td>{{ $d->kode_paramedis }}</td>
                  <td>
                      @if ($d->status_kunjungan == 1)
                          Dalam antrian
                      @elseif($d->status_kunjungan == 2)
                          Dalam Pelayanan
                      @elseif($d->status_kunjungan == 3)
                          Proses Pembayaran
                      @elseif($d->status_kunjungan == 4)
                          Selesai
                      @elseif($d->status_kunjungan == 5)
                          Batal
                      @endif
                  </td>
                  <td class="text-center">
                      <button kodekunjungan={{ $d->kode_kunjungan }} nama="{{ $d->nama_pasien }}"
                          class="btn btn-danger btn-sm batalkunjungan" data-toggle="tooltip" data-placement="top"
                          title="Batal kunjungan ..."><i class="bi bi-trash-fill mr-1 ml-1"></i></button>
                      <button kodekunjungan={{ $d->kode_kunjungan }} class="btn btn-info btn-sm detailkunjungan"
                          data-placement="top" title="Detail Pelayanan ..." data-toggle="modal"
                          data-target="#modaldetail_layanan"><i class="bi bi-ticket-detailed"></i></button>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="modaldetail_layanan" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Pelayanan </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="detailpelayanan">

                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  <script>
      $(function() {
          $('#tabelriwayatpendaftaran').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
      $('#tabelriwayatpendaftaran').on('click', '.batalkunjungan', function() {
          kodekunjungan = $(this).attr('kodekunjungan')
          nama = $(this).attr('nama')
          Swal.fire({
              title: 'Kunjungan Pasien akan dibatalkan ?',
              text: nama,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Batal Kunjungan!',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  Swal.fire({
                      title: 'Kunjungan pasien dibatalkan ?',
                      showDenyButton: true,
                      confirmButtonText: 'Ya',
                      denyButtonText: `Batal`,
                  }).then((result) => {
                      if (result.isConfirmed) {
                          spinner = $('#loader2');
                          spinner.show();
                          $.ajax({
                              async: true,
                              type: 'post',
                              dataType: 'json',
                              data: {
                                  _token: "{{ csrf_token() }}",
                                  kodekunjungan,
                              },
                              url: '<?= route('batalkunjungan') ?>',
                              error: function(data) {
                                  Swal.fire({
                                      icon: 'error',
                                      title: 'Ooops....',
                                      text: 'Sepertinya ada masalah......',
                                      footer: ''
                                  })
                                  spinner.hide();
                              },
                              success: function(data) {
                                  spinner.hide();
                                  if (data.kode == 500) {
                                      Swal.fire({
                                          icon: 'error',
                                          title: 'Oopss...',
                                          text: data.message,
                                          footer: ''
                                      })
                                  } else {
                                      Swal.fire({
                                          icon: 'success',
                                          title: 'OK',
                                          text: data.message,
                                          footer: ''
                                      })
                                      location.reload()
                                  }
                              }
                          });
                      } else if (result.isDenied) {
                          Swal.fire('Changes are not saved', '', 'info')
                      }
                  })
              }
          })
      })
      $('#tabelriwayatpendaftaran').on('click', '.detailkunjungan', function() {
          kodekunjungan = $(this).attr('kodekunjungan')
          $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    kodekunjungan
                },
                url: '<?= route('detail_pelayanan') ?>',
                success: function(response) {
                    $('.detailpelayanan').html(response);
                    // $('#daftarpxumum').attr('disabled', true);
                }
            });
      })
  </script>
