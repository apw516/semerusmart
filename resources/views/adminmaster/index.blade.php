@extends('templates.main')
@section('container')


<div class="row" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('pasien')}}" data-toggle="tab">Data Pasien</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pegawai" data-toggle="tab">Data Pegawai</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user" data-toggle="tab">Data User</a></li>
                    <li class="nav-item"><a class="nav-link" href="#diagnosa" data-toggle="tab">Data Diagnosa</a></li>

                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="pasien">
                       
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="pegawai">
                       
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="user">
                      
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="diagnosa">
                        
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
   
</script>

@endsection