<form class="formutama_daftar">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nomor RM</label>
                <input readonly type="text" class="form-control" id="nomorrm" name="nomorrm"
                    value="{{ $dtpx[0]->no_rm }}" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input readonly type="text" class="form-control" id="nik" name="nik"
                    value="{{ $dtpx[0]->nik }}" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Pasien</label>
        <input readonly type="text" class="form-control" id="namapx" name="namapx"
            value="{{ $dtpx[0]->nama_px }}">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input readonly type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                    value="{{ $dtpx[0]->no_rm }}" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input readonly type="text" class="form-control" id="tgllahir"
                    name="tgllahir"value="{{ $dtpx[0]->tgl_lahir }}" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <textarea readonly type="text" class="form-control" id="alamat" name="alamat"
            aria-describedby="emailHelp">{{ $dtpx[0]->alamatnya }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tujuan</label>
                    <select class="form-control" id="tujuan" name="tujuan">
                        <option value="0">Poli Klinik</option>
                        @foreach ($unit as $u)
                        <option value="{{ $u->kode_unit }}">{{ $u->nama_unit }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Dokter</label>
                    <select class="form-control" id="dokter" name="dokter">
                        <option value="0">Pilih Dokter</option>
                        @foreach ($dokter as $d )
                        <option value="{{ $d->kode_paramedis }}">{{ $d->nama_paramedis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Tekanan Darah</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik tekanan darah pasien"
                        name="tekanandarah" id="tekanandarah">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">mmHg</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Suhu Tubuh</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ketik suhu tubuh pasien" name="suhutubuh"
                    id="suhutubuh">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">°C</span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label for="exampleInputEmail1">Keluhan Utama</label>
            <textarea type="text" class="form-control" id="keluhanutama" name="keluhanutama" value="{{ $dtpx[0]->no_rm }}"
                aria-describedby="emailHelp" placeholder="Ketik keluhan utama pasien ..."></textarea>
        </div>
    </div>
</form>
