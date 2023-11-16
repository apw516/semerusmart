<form class="formdetailobat">
    <div class="form-group">
        <label for="exampleFormControlInput1">Kode Barang</label>
        <input readonly type="text" class="form-control" id="kodebarang" name="kodebarang"
            value="{{ $barang[0]->kode_barang }}">
        <input hidden readonly type="text" class="form-control" id="id" name="id"
            value="{{ $barang[0]->id }}">
        <input hidden readonly type="text" class="form-control" id="id_tarif_header" name="id_tarif_header"
            value="{{ $barang[0]->id_tarif_header }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Barang</label>
        <input readonly type="text" class="form-control" id="namabarang" name="namabarang"
            placeholder="name@example.com" value="{{ $barang[0]->nama_barang }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Distributor</label>
        <select readonly class="form-control" id="distributor" name="distributor">
            <option value="">-- Silahkan pilih --</option>
            @foreach ($dist as $d)
                <option value="{{ $d->id }}" @if ($d->id == $barang[0]->id_distributor) selected @endif>
                    {{ $d->nama_distributor }}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan Besar</label>
                <select disabled class="form-control" id="satuan_besar" name="satuan_besar">
                    <option value="" @if ($barang[0]->satuan_besar == '') selected @endif>-- Silahkan pilih --
                    </option>
                    <option value="BOX" @if ($barang[0]->satuan_besar == 'BOX') selected @endif>BOX</option>
                    <option value="BTL" @if ($barang[0]->satuan_besar == 'BTL') selected @endif>BTL</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput1">Rasio satuan besar</label>
                <input type="text" class="form-control" id="isi_satuan_besar" name="isi_satuan_besar" placeholder="Masukan dosis obat ..."
                    value="0">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan Sedang</label>
                <select disabled class="form-control" id="satuan_sedang" name="satuan_sedang">
                    <option value="" @if ($barang[0]->satuan_sedang == '') selected @endif>-- Silahkan pilih --
                    </option>
                    <option value="PCS" @if ($barang[0]->satuan_sedang == 'PCS') selected @endif>PCS</option>
                    <option value="BTL" @if ($barang[0]->satuan_sedang == 'BTL') selected @endif>BTL</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput1">Rasio satuan sedang</label>
                <input type="text" class="form-control" id="isi_satuan_sedang" name="isi_satuan_sedang" placeholder="Masukan dosis obat ..."
                    value="0">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Satuan Kecil</label>
                <select disabled class="form-control" id="satuan_kecil" name="satuan_kecil">
                    <option value="" @if ($barang[0]->satuan_kecil == '') selected @endif>-- Silahkan pilih --
                    </option>
                    <option value="TAB" @if ($barang[0]->satuan_kecil == 'TAB') selected @endif>TAB</option>
                    <option value="BTL" @if ($barang[0]->satuan_kecil == 'BTL') selected @endif>BTL</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlInput1">Rasio satuan kecil</label>
                <input type="text" class="form-control" id="isi_satuan_kecil" name="isi_satuan_kecil" placeholder="Masukan dosis obat ..."
                    value="0">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Expired Date</label>
        <input type="date" class="form-control" id="ed" name="ed" placeholder="name@example.com"
            value="{{ $barang[0]->ed }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Dosis</label>
        <input readonly type="text" class="form-control" id="dosis" name="dosis" placeholder="Masukan dosis obat ..."
            value="{{ $barang[0]->dosis }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Beli</label>
        <input type="text" class="form-control" id="hargabeli" name="hargabeli" placeholder="Masukan harga beli satuan kecil ..."
            value="{{ $barang[0]->harga_beli }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Jual</label>
        <input type="text" class="form-control" id="hargajual" name="hargajual" placeholder="Masukan harga beli satuan besar ..."
            value="{{ $barang[0]->harga_jual }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Aturan Pakai</label>
        <textarea class="form-control" id="aturanpakai" name="aturanpakai" rows="3">{{ $barang[0]->aturan_pakai }}</textarea>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="ceklisan" name="ceklisan">
        <label class="form-check-label text-bold text-lg text-danger" for="exampleCheck1">Input Kartu Stok </label>
    </div>
</form>
