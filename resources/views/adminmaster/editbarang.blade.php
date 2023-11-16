<form class="form_edit_barang">
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Barang</label>
        <input type="text" class="form-control" id="namabarang" name="namabarang"
            placeholder="Masukan nama barang ..." value="{{ $barang[0]->nama_barang }}">
        <input hidden type="text" class="form-control" id="idbarang" name="idbarang"
            placeholder="Masukan nama barang ..." value="{{ $barang[0]->id }}">
        <input hidden type="text" class="form-control" id="idtarif" name="idtarif"
            placeholder="Masukan nama barang ..." value="{{ $barang[0]->id_tarif_header }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Satuan Besar</label>
        <select class="form-control" id="satuanbesar" name="satuanbesar">
            <option value="">-- Silahkan pilih --</option>
            <option value="BOX" @if($barang[0]->satuan_besar == 'BOX') selected @endif>BOX</option>
            <option value="BTL"  @if($barang[0]->satuan_besar == 'BTL') selected @endif>BTL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Rasio Besar</label>
        <input type="text" class="form-control" id="rasiobesar" name="rasiobesar"
            placeholder="Masukan rasio besar ..." value="{{ $barang[0]->isi_satuan_besar }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Satuan Sedang</label>
        <select class="form-control" id="satuansedang" name="satuansedang">
            <option value="">-- Silahkan pilih --</option>
            <option value="PCS" @if($barang[0]->satuan_sedang == 'PCS') selected @endif>PCS</option>
            <option value="BTL" @if($barang[0]->satuan_sedang == 'BTL') selected @endif>BTL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Rasio Sedang</label>
        <input type="text" class="form-control" id="rasiosedang" name="rasiosedang"
            placeholder="Masukan rasio besar ..." value="{{ $barang[0]->isi_satuan_sedang }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Satuan Kecil</label>
        <select class="form-control" id="satuankecil" name="satuankecil">
            <option value="">-- Silahkan pilih --</option>
            <option value="TAB" @if($barang[0]->satuan_kecil == 'TAB') selected @endif>TAB</option>
            <option value="BTL" @if($barang[0]->satuan_kecil == 'BTL') selected @endif>BTL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Rasio Kecil</label>
        <input type="text" class="form-control" id="rasiokecil" name="rasiokecil"
            placeholder="Masukan rasio besar ..." value="{{ $barang[0]->isi_satuan_kecil }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Distributor</label>
        <select class="form-control" id="distributor" name="distributor">
            <option value="">-- Silahkan pilih --</option>
            @foreach ($dist as $d )
            <option value="{{ $d->id }}" @if($barang[0]->id_distributor == $d->id ) selected @endif>{{ $d->nama_distributor }}</option>
           @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Dosis</label>
        <input type="text" class="form-control" id="dosis" name="dosis"
            placeholder="Masukan dosis obat ..." value="{{ $barang[0]->dosis }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Aturan Pakai</label>
        <textarea class="form-control" id="aturanpakai" name="aturanpakai" rows="3">{{ $barang[0]->aturan_pakai }}</textarea>
    </div>
</form>
