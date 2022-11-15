@extends('admin.layout')
@section('title')
Halaman Edit Data Tamu
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Data Tamu</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{ route('update-tamu', $tamu->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Tamu</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Nama Lengkap" value="{{ $tamu->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Instansi</label>
                                <input type="text" name="instansi" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Instansi" value="{{ $tamu->instansi }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">No.Telepon</label>
                                <input type="number" name="no_telp" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan No.Telepon" value="{{ $tamu->no_telp }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Bertemu</label>
                                <input type="text" name="bertemu" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Bertemu" value="{{ $tamu->bertemu }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Keperluan" value="{{ $tamu->keperluan }}">
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputName1" value="{{ $tamu->tanggal }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="exampleInputName1" value="{{ $tamu->waktu }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Foto</label><br>
                                <input type="hidden" name="fotolama" value="{{ $tamu->foto }}">
                                <img src="{{ asset('assets_admin/foto/' . $tamu->foto) }}" width="50px" alt="">
                                <input type="file" name="foto" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tanda Tangan</label><br>
                                <input type="hidden" name="fotolama2" value="{{ $tamu->ttd }}">
                                <img src="{{ asset('assets_admin/ttd/' . $tamu->ttd) }}" width="50px" alt="">
                                <input type="file" name="ttd" class="form-control" id="exampleInputName1">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('tamu') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
