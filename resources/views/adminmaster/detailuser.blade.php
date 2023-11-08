<form class="form-edit-pasien">
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="namauser" name="namauser" aria-describedby="emailHelp"
            value="{{ $user[0]->nama }}">
        <input hidden type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp"
            value="{{ $user[0]->id }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input readonly type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
            value="{{ $user[0]->username }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Alamat Email</label>
        <input readonly type="email" class="form-control" id="alamatemail" name="alamatemail"
            aria-describedby="emailHelp" value="{{ $user[0]->email }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Hak akses</label>
        <select class="form-control" id="hakakses" name="hakakses">
            <option value="1" @if ($user[0]->hak_akses == 1) selected @endif>Super User</option>
            <option value="2" @if ($user[0]->hak_akses == 2) selected @endif>Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Unit</label>
        <select class="form-control" id="unit" name="unit">
            <option value="0">Silahkan Pilih</option>
            @foreach ($unit as $u)
                <option value="{{ $u->kode_unit }}" @if ($user[0]->unit == $u->kode_unit) selected @endif>
                    {{ $u->nama_unit }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Kode Paramedis</label>
        <input type="text" class="form-control" id="kodeparamedis" name="kodeparamedis"
            value="{{ $user[0]->kode_paramedis }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="1" @if ($user[0]->is_activated == 1) Selected @endif>Aktif</option>
            <option value="" @if ($user[0]->is_activated != 1) Selected @endif>Tidak Aktif</option>
        </select>
    </div>
</form>
