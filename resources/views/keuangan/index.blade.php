@extends('templates.main')
@section('container')
<div class="card-body">
    <div class="row" style="align-content: 10px;">
        <h4 class="col-md-6">Data Pasien Klinik Hari ini</h4>

    </div>
    <div class="row center" style="align-content:center; margin-top: 10px">

        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="No RM">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Nama Pasien">
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="tanggal_kunjungan" autocomplete="off" data-language="en" data-date-format="yyyy-mm-dd" placeholder="Tanggal">
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="tanggal_kunjungan1" autocomplete="off" data-language="en" data-date-format="yyyy-mm-dd" placeholder="Tanggal">
        </div>

        <div>
            <button type="submit" class="badge badge-primary" onclick="lihatpasienex()"> <i class="bi bi-search-heart"></i> </button>
        </div>
    </div>
    <div class="row " style="align-content: center; margin-top:20px">
        <div class="col-md-6">
            <table id="datakasir" class="table  table-sm text-sm table-bordered table-hover">
                <thead class="bg-warning">
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Poli</th>
                    <th>Total Layanan</th>
                    <th>Penjamin</th>

                </thead>
                <tbody>
                    <tr>
                        <td>50609080</td>
                        <td>Abdul Gofur</td>
                        <td>Umum</td>
                        <td>150.000</td>
                        <td>

                            <a style="align-content: center;" class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609080</td>
                        <td>Abdul gofar</td>
                        <td>GIGI</td>
                        <td>75.000</td>
                        <td class="center">

                            <a class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609081</td>
                        <td>Ghifari hernandes</td>
                        <td>UMUM</td>
                        <td>100.000</td>
                        <td class="center">

                            <a class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609083</td>
                        <td>muhammad jaidi al kahfiru</td>
                        <td>UMUM</td>
                        <td>55.000</td>
                        <td class="center">

                            <a class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609089</td>
                        <td>subhi</td>
                        <td>UMUM</td>
                        <td>100.000</td>
                        <td class="center">

                            <a class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>
                    <tr>
                        <td>50609123</td>
                        <td>SHANIA</td>
                        <td>KANDUNGAN</td>
                        <td>75.000</td>
                        <td class="center">

                            <a class=" badge badge-primary btn-sm " href="#">
                                <i class="fas  fa-card"></i> UMUM
                            </a>

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form id="add_name" name="add_name">
                <div class="form-group">
                    <table class="table table-bordered" id="dynamic_field">
                        <thead class="bg-info">
                            <th></th>
                            <th></th>

                        </thead>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="inputName">Nama </label>
                                        <input type="text" name="nama" class="form-control name_list" placeholder="Input Nama">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Jumlah </label>
                                        <input type="text" name="jumlah"  class="form-control name_list" placeholder="Input Jumlah">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Disc </label>
                                        <input type="text" name="disc" class="form-control name_list" placeholder="Input Disc">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Harga </label>
                                        <input type="text" name="harga"  class="form-control name_list" placeholder="Input Harga">
                                    </div>

                                </div>
                            </td>
                            <td>
                                <button type="button" id="add" class="btn btn-success">+
                                </button>
                            </td>
                        </tr>
                    </table>
                    <button class="btn btn-primary" id="submit">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('tanggal_kunjungan').valueAsDate = new Date()
    document.getElementById('tanggal_kunjungan1').valueAsDate = new Date()

    $(function() {
        $("#datakasir").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $(document).ready(function() {
        var i = 1;
        var app = {
            addRow: function() {
                i++;
                $("#dynamic_field").append(`
					<tr id="row${i}">
						<td>
                        <div class="row">
                                    <div class="col-5">
                                        <label for="inputName">Nama </label>
                                        <input type="text" name="nama" class="form-control name_list" placeholder="Input Nama">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Jumlah </label>
                                        <input type="text" name="jumlah"  class="form-control name_list" placeholder="Input Jumlah">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Disc </label>
                                        <input type="text" name="disc" class="form-control name_list" placeholder="Input Disc">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputName">Harga </label>
                                        <input type="text" name="harga"  class="form-control name_list" placeholder="Input Harga">
                                    </div>

                                </div>
						<td>
							<button type="button" id="${i}" class="btn btn-danger btn-remove">X
							</button>
						</td>
					</tr>
					`)
            },
            remove: function() {
                var idBtn = $(this).attr("id");
                $("#row" + idBtn + "").remove()

            },
            insertData: function(e) {
                e.preventDefault()
                var data = $("#add_name").serializeArray();
                var kodekunjungan = $('#kodekunjungan').val()
                var kodepenjamin = $('#kodepenjamin').val()
                var kodepenunjang = $('#namapenunjang').val()
                var dokter = $('#dokter').val()
                var diagnosa = $('#diagnosa').val()
                var kodeunit = $('#kodeunit').val()
                var kelasunit = $('#kelas_unit').val()
                var kelas = $('#kelas').val()

                var gt = $('#gt').val()
                var norm = $('#norm').val()
                var namaunit = $('#nama_unit').val()


                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        data: JSON.stringify(data),
                        kodekunjungan: $('#kodekunjungan').val(),
                        kodepenunjang: $('#namapenunjang').val(),
                        dokter: $('#dokter').val(),
                        kodepenjamin: $('#kodepenjamin').val(),
                        diagnosa: $('#diagnosa').val(),
                        kodeunit: $('#kodeunit').val(),
                        gt: $('#gt').val(),
                        kelasunit: $('#kelasunit').val(),
                        norm: $('#norm').val(),
                        namaunit: $('#nama_unit').val(),
                        kelas: $('#kelas').val()

                    },

                    error: function(data) {
                        spinner.hide();
                        alert('error!!')
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: data.message,
                            footer: ''
                        })

                    }
                })
            }

        }

        $("#add").on("click", app.addRow)
        $(document).on("click", ".btn-remove", app.remove)
        $("#submit").on("click", app.insertData)
    });
  
</script>

@endsection