<form class="form_edit_kary">
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Lengkap</label>
        <input type="text" class="form-control" id="namakary" name="namakary" value="{{ $mt_paramedis[0]->nama_paramedis }}"
            placeholder="Masukan nama lengkap ditambah gelar jika ada ... ">
        <input hidden type="text" class="form-control" id="idkary" name="idkary" value="{{ $mt_paramedis[0]->ID }}"
            placeholder="Masukan nama lengkap ditambah gelar jika ada ... ">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">SIP</label>
        <input type="text" class="form-control" id="sip" name="sip" value="{{ $mt_paramedis[0]->sip_dr }}"
            aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Diisi jika dokter ...</small>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Unit</label>
        <select class="form-control" id="unit" name="unit">
            <option value="">Silahkan Pilih</option>
            @foreach ($unit as $u)
                <option value="{{ $u->kode_unit }}" @if($mt_paramedis[0]->unit == $u->kode_unit) selected @endif>{{ $u->nama_unit }}</option>
            @endforeach
        </select>
    </div>
</form>
