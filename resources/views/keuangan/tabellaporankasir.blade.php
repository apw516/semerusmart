<table id="tabellaporan_kasir" class="table table-sm mt-3 table-hover">
    <thead class="bg-secondary">
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Kode Kasir Header</th>
        <th>Tgl Transaksi</th>
        <th>Total Uang</th>
        <th>Total Transaksi</th>
        <th>Kembalian</th>
    </thead>
    <tbody>
    @php
        $uang_masuk = 0;
        $uang_kembalian = 0;
        $uang_pendapatan = 0;
    @endphp
    @foreach ($hasil as $h)
        <tr>
            <td>{{ $h->no_rm}}</td>
            <td>{{ $h->nama_pasien}}</td>
            <td>{{ $h->kode_kasir_header}}</td>
            <td>{{ $h->tgl_trans_kasir}}</td>
            <td> Rp. {{ number_format($h->total_uang, 2) }}</td>
            <td> Rp. {{ number_format( $h->total_trans_kasir, 2) }}</td>
            <td> Rp. {{ number_format($h->kembalian, 2) }}</td>
        </tr>
        @php
            $uang_masuk = $h->total_uang + $uang_masuk;
            $uang_kembalian = $h->kembalian + $uang_kembalian;
            $uang_pendapatan = $h->total_trans_kasir + $uang_pendapatan;
        @endphp
    @endforeach
    </tbody>
</table>
<table class="table table-bordered bg-light shadow-lg mt-3">
    <thead class="text-bold text-lg">
        <th colspan="3" class="bg-info">Grand Total</th>
    </thead>
    <tbody class="text-bold text-lg">
        <tr class="text-bold">
            <td>Uang Masuk</td>
            <td>Uang Kembalian</td>
            <td>Total Pendapatan</td>
        </tr>
        <tr>
            <td>Rp. {{ number_format($uang_masuk, 2) }}</td>
            <td>Rp. {{ number_format($uang_kembalian, 2) }}</td>
            <td>Rp. {{ number_format($uang_pendapatan, 2) }}</td>
        </tr>
    </tbody>
</table>
<script>
    $(function() {
        $('#tabellaporan_kasir').DataTable({
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
