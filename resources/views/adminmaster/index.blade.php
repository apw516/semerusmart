@extends('templates.main')
@section('container')

<form id="formD" name="formD" action="" method="post" enctype="multipart/form-data">
    Harga Satuan: <br>
    <input type="text" name="harga" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"><br>
    Jumlah:<br>
    <input type="text" name="jmlpsn" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"><br>
    Harga keseluruhan : <br>
    <input type="text" name="txtDisplay" value="" readonly="readonly">
</form>


<script type="text/javascript" language="Javascript">
    hargasatuan = document.formD.harga.value;
    document.formD.txtDisplay.value = hargasatuan;
    jumlah = document.formD.jmlpsn.value;
    document.formD.txtDisplay.value = jumlah;

    function OnChange(value) {
        hargasatuan = document.formD.harga.value;
        jumlah = document.formD.jmlpsn.value;
        total = hargasatuan * jumlah;
        document.formD.txtDisplay.value = total;
    }
</script>
@endsection