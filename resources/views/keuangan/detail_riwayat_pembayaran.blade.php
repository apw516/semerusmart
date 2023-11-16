@foreach ($header as $a)
    <div class="card">
        <div class="card-header bg-warning text-bold">{{ $a->kode_layanan_header }}</div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead class="bg-secondary">
                    <th>Nama Tarif</th>
                    <th>Tarif</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($r as $b)
                        @if ($a->id == $b->id)
                            <tr>
                                <td>{{ $b->NAMA_TARIF }}</td>
                                <td>Rp. {{ number_format($b->grantotal_layanan, 2) }}</td>
                                <td>@if($b->status_layanan_detail == 8) Retur @else Aktif @endif</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="bg-danger">
                        <td class="text-bold text-lg">Grand Total</td>
                        <td class="bg-light text-bold text-lg" colspan="2">Rp. {{ number_format($a->total_layanan, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- <table class="table table-sm table-bordered">
                <thead class="bg-info">
                    <th>Total bayar</th>
                    <th>Total yang harus dibayar</th>
                    <th>Kembalian</th>
                </thead>
                <tbody>
                    @foreach ($detail_kasir as $dk)
                        @if($dk->kode_invoice == $a->kode_kunjungan)
                        <tr class="text-lg text-bold">
                            <td>Rp.{{ number_format($dk->total_uang,2) }}</td>
                            <td>Rp.{{ number_format($a->total_layanan,2) }}</td>
                            <td>Rp.{{ number_format($dk->kembalian,2) }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
@endforeach
