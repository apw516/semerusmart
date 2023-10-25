<div class="card">
    <div class="card-header bg-info">Detail Layanan Pasien</div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-warning">
                <th>Kode Layanan Header</th>
                <th>Nama Tarif</th>
                <th>Total</th>
                <th>Status</th>
                <th>Status Detail</th>
            </thead>
            <tbody>
                @php $gt = 0; @endphp
                @foreach ($detail as $d)
                    <tr>
                        <td>{{ $d->kode_layanan_header }}</td>
                        <td>{{ $d->NAMA_TARIF }}</td>
                        <td>IDR {{ number_format($d->grantotal_layanan, 2) }}</td>
                        <td>
                            @if ($d->status_layanan == 1)
                                Belum Dibayar
                            @elseif($d->status_layanan == 2)
                                Sudah dibayar
                            @endif
                        </td>
                        <td>
                            @if ($d->status_layanan_detail == 1)
                                Aktif
                            @elseif($d->status_layanan_detail == 8)
                               Retur
                            @endif
                        </td>
                    </tr>
                    @php $gt = $gt + $d->grantotal_layanan @endphp
                @endforeach

                <tr class="bg-secondary">
                    <td colspan="4" class="text-center text-bold">GRAND TOTAL LAYANAN</td>
                    <td class="text-bold">IDR {{ number_format($gt, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
