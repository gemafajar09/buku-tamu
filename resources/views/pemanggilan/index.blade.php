@extends('component.template')
@section('content')

    <style>
        #playlist {
            width: 100%;
            height: 460px;
            outline: auto;
        }
    </style>

   <div class="container py-5">
        <center><h3>PEMANGGILAN PEGAWAI</h3></center>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Pemanggilan Pegawai</h6>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select name="nama" id="nama" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            <select name="tujuan" id="tujuan" class="form-control"></select>
                        </div>
                        <div align="right">
                            <button class="btn btn-primary">Memanggil</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Play List</h6>
                        <div id="playlist"></div>
                        <center class="py-2">
                            <button style="width:120px" class="btn btn-primary">Play</button>
                            <button style="width:120px" class="btn btn-danger">Stop</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection
