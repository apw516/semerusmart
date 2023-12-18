<form class="form-edit-pasien">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="email" class="form-control" id="nik" name="nik" value="{{ $pasien[0]->nik }}"
                    aria-describedby="emailHelp" placeholder="Nomor identitas pasien ( KTP / SIM )">
                <input hidden type="email" class="form-control" id="nomorrm" name="nomorrm" value="{{ $pasien[0]->no_rm }}"
                    aria-describedby="emailHelp" placeholder="Nomor identitas pasien ( KTP / SIM )">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nomor Asuransi</label>
                <input type="email" class="form-control" id="nomorasuransi" name="nomorasuransi"
                    value="{{ $pasien[0]->no_asuransi }}" aria-describedby="emailHelp"
                    placeholder="Nomor Asuransi / Nomor Bpjs ...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pasien</label>
                <input type="email" class="form-control" id="namapx" name="namapx"
                    value="{{ $pasien[0]->nama_px }}" aria-describedby="emailHelp" placeholder="Nama Pasien ...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                    value="{{ $pasien[0]->tempat_lahir }}" aria-describedby="emailHelp"
                    placeholder="Silahkan isi kota tempat lahir pasien ...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                    value="{{ $pasien[0]->tgl_lahir }}" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Agama</label>
                <select class="form-control" id="agama" name="agama">
                    <option value="">Silahkan Pilih</option>
                    @foreach ($agama as $a)
                        <option value="{{ $a->ID }}" @if ($a->ID == $pasien[0]->agama) selected @endif>
                            {{ $a->agama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Status Perkawinan</label>
                <select class="form-control" id="statusperkawinan" name="statusperkawinan">
                    <option value="">Silahkan Pilih</option>
                    @foreach ($status_perkawinan as $sk)
                        <option value="{{ $sk->ID }}" @if ($sk->ID == $pasien[0]->status_perkawinan) selected @endif>
                            {{ $sk->status_kawin }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Pendidikan</label>
                <select class="form-control" id="pendidikan" name="pendidikan">
                    <option value="">Silahkan Pilih</option>
                    @foreach ($pendidikan as $p)
                        <option value="{{ $p->ID }}" @if ($p->ID == $pasien[0]->pendidikan) selected @endif>
                            {{ $p->pendidikan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Pekerjaan</label>
                <select class="form-control" id="pekerjaan" name="pekerjaan">
                    <option value="">Silahkan Pilih</option>
                    @foreach ($pekerjaan as $pj)
                        <option value="{{ $pj->ID }}" @if ($pj->ID == $pasien[0]->pekerjaan) selected @endif>
                            {{ $pj->pekerjaan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Provinsi</label>
                <input type="text" class="form-control" id="provinsi_edit" name="provinsi_edit"
                    value="{{ $pasien[0]->prov }}" aria-describedby="emailHelp" placeholder="Cari Provinisi ...">
                <input hidden type="text" class="form-control" id="kodeprovinsi_edit" name="kodeprovinsi_edit"
                    aria-describedby="emailHelp" value="{{ $pasien[0]->propinsi }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Kabupaten</label>
                <input type="text" class="form-control" id="kabupaten_edit" name="kabupaten_edit"
                    value="{{ $pasien[0]->kab }}" aria-describedby="emailHelp" placeholder="Cari Kabupaten ...">
                <input hidden type="text" class="form-control" id="kodekabupaten_edit" name="kodekabupaten_edit"
                    aria-describedby="emailHelp" value="{{ $pasien[0]->kotakab }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan_edit" name="kecamatan"
                    value="{{ $pasien[0]->kec }}" aria-describedby="emailHelp" placeholder="Cari Kecamatan ...">
                <input hidden type="text" class="form-control" id="kodekecamatan_edit"
                    value="{{ $pasien[0]->kecamatan }}" name="kodekecamatan_edit" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Desa</label>
                <input type="text" class="form-control" id="desa_edit" name="desa_edit"
                    value="{{ $pasien[0]->desaa }}" aria-describedby="emailHelp" placeholder="Cari Desa ...">
                <input hidden type="text" class="form-control" id="kodedesa_edit" name="kodedesa_edit"
                    value="{{ $pasien[0]->desa }}" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#provinsi_edit').autocomplete({
            source: function(request, response) {
                $.getJSON("<?= route('cariprovinsi') ?>", {
                        prov: $('#provinsi_edit').val()
                    },
                    response);
            },
            select: function(event, ui) {
                $('[id="provinsi_edit"]').val(ui.item.label);
                $('[id="kodeprovinsi_edit"]').val(ui.item.kode);
            }
        });
    });
    $(document).ready(function() {
        $('#kabupaten_edit').autocomplete({
            source: function(request, response) {
                $.getJSON("<?= route('carikabupaten') ?>", {
                        kab: $('#kabupaten_edit').val(),
                        prov: $('#kodeprovinsi_edit').val()
                    },
                    response);
            },
            select: function(event, ui) {
                $('[id="kabupaten_edit"]').val(ui.item.label);
                $('[id="kodekabupaten_edit"]').val(ui.item.kode);
            }
        });
    });
    $(document).ready(function() {
        $('#kecamatan_edit').autocomplete({
            source: function(request, response) {
                $.getJSON("<?= route('carikecamatan') ?>", {
                        kec: $('#kecamatan_edit').val(),
                        kab: $('#kodekabupaten_edit').val()
                    },
                    response);
            },
            select: function(event, ui) {
                $('[id="kecamatan_edit"]').val(ui.item.label);
                $('[id="kodekecamatan_edit"]').val(ui.item.kode);
            }
        });
    });
    $(document).ready(function() {
        $('#desa_edit').autocomplete({
            source: function(request, response) {
                $.getJSON("<?= route('caridesa') ?>", {
                        des: $('#desa_edit').val(),
                        kec: $('#kodekecamatan_edit').val()
                    },
                    response);
            },
            select: function(event, ui) {
                $('[id="desa_edit"]').val(ui.item.label);
                $('[id="kodedesa_edit"]').val(ui.item.kode);
            }
        });
    });
</script>
