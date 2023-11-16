<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-warning">Data Kartu Stok Terbaru <a class="text-bold text-lg">{{ $barang[0]->nama_barang }} | {{ $barang[0]->nama_distributor }}</a></div>
            <div class="card-body">
                <table id="table_ti_kartu_stok" class="table table-sm table-bordered table-hover">
                    <thead class="bg-secondary">
                        <th>Tanggal Stok</th>
                        <th>Kode Barang</th>
                        <th>Stok Last</th>
                        <th>Stok In</th>
                        <th>Stok Out</th>
                        <th>Stok Current</th>
                        <th>Harga beli</th>
                        <th>Harga history</th>
                    </thead>
                    <tbody>
                        @foreach ($stok as $s )
                        <tr>
                            <td>{{ $s->tgl_stok}}</td>
                            <td>{{ $s->kode_barang}}</td>
                            <td>{{ $s->stok_last}}</td>
                            <td>{{ $s->stok_in}}</td>
                            <td>{{ $s->stok_out}}</td>
                            <td>{{ $s->stok_current}}</td>
                            <td>{{ $s->harga_beli}}</td>
                            <td>{{ $s->harga_beli_history}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info">Data Persediaan <a class="text-bold text-lg"> {{ $barang[0]->nama_barang }} | {{ $barang[0]->nama_distributor }}</a></div>
            <div class="card-body">
                <table id="tabelpersediaan" class="table table-sm table-bordered table-hover">
                    <thead class="bg-secondary">
                        <th>Kode Barang</th>
                        <th>Stok</th>
                        <th>Expired Date</th>
                        <th>Tgl entry</th>
                    </thead>
                    <tbody>
                        @foreach ($sediaan as $s )
                            <tr>
                                <td>{{ $s->kode_barang}}</td>
                                <td>{{ $s->stok}}</td>
                                <td>{{ $s->ed}}</td>
                                <td>{{ $s->tgl_entry}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
        $('#table_ti_kartu_stok').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
$(function() {
        $('#tabelpersediaan').DataTable({
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
