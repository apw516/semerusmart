@extends('templates.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Tarif Pelayanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Master Tarif Pelayanan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <button class="btn btn-success"><i class="bi bi-file-earmark-plus-fill mr-1"></i> Tarif Pelayanan</button>
        <div class="v_master_tarif">

        </div>
    </div>
</section>
<script>
  $(document).ready(function() {
            get_master_tarif()
        })
        function get_master_tarif() {
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_tarif') ?>',
                success: function(response) {
                    $('.v_master_tarif').html(response);
                }
            });
        }
</script>
@endsection
