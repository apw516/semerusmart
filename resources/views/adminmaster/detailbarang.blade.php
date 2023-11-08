<form class="formdetailobat">
    <div class="form-group">
        <label for="exampleFormControlInput1">Kode Barang</label>
        <input readonly type="text" class="form-control" id="kodebarang" name="kodebarang"
            value="{{ $barang[0]->kode_barang }}">
        <input hidden readonly type="text" class="form-control" id="id" name="id" value="{{ $barang[0]->id }}">
        <input hidden readonly type="text" class="form-control" id="id_tarif_header" name="id_tarif_header" value="{{ $barang[0]->id_tarif_header }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Barang</label>
        <input readonly type="text" class="form-control" id="namabarang" name="namabarang"
            placeholder="name@example.com" value="{{ $barang[0]->nama_barang }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Distributor</label>
        <select class="form-control" id="distributor" name="distributor">
            <option value="">-- Silahkan pilih --</option>
            @foreach ($dist as $d )
            <option value="{{ $d->id }}" @if($d->id == $barang[0]->id_distributor) selected @endif >{{ $d->nama_distributor }}</option>
           @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Expired Date</label>
        <input type="date" class="form-control" id="ed" name="ed" placeholder="name@example.com" value="{{ $barang[0]->ed}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Dosis</label>
        <input type="text" class="form-control" id="dosis" name="dosis" placeholder="Masukan dosis obat ..."
            value="{{ $barang[0]->dosis }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" placeholder="name@example.com"
            value="{{ $barang[0]->stok }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Jual</label>
        <input type="text" class="form-control" id="hargajual" name="hargajual" placeholder="name@example.com"
            value="{{ $barang[0]->harga_jual }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Beli</label>
        <input type="text" class="form-control" id="hargabeli" name="hargabeli" placeholder="name@example.com"
            value="{{ $barang[0]->harga_beli }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Satuan</label>
        <select class="form-control" id="satuan" name="satuan">
            <option value="" @if($barang[0]->satuan  == '') selected @endif>-- Silahkan pilih --</option>
            <option value="PCS" @if($barang[0]->satuan  == 'PCS') selected @endif>PCS</option>
            <option value="TAB"  @if($barang[0]->satuan  == 'TAB') selected @endif>TAB</option>
            <option value="BTL"  @if($barang[0]->satuan  == 'BTL') selected @endif>BTL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Satuan Besar</label>
        <select class="form-control" id="satuanbesar" name="satuanbesar">
            <option value=""  @if($barang[0]->satuan_besar  == '') selected @endif>-- Silahkan pilih --</option>
            <option value="BOX"  @if($barang[0]->satuan_besar  == 'BOX') selected @endif>BOX</option>
            <option value="BTL"  @if($barang[0]->satuan_besar  == 'BTL') selected @endif>BTL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Isi</label>
        <input type="text" class="form-control" id="isi" name="isi" placeholder="name@example.com"
            value="{{ $barang[0]->isi }}">
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
