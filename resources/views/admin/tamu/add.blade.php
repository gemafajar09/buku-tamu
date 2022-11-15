@extends('admin.layout')
@section('title')
Halaman Input Data Tamu
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Input Data Tamu</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{ route('save-tamu') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Tamu</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Instansi</label>
                                <input type="text" name="instansi" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Instansi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">No.Telepon</label>
                                <input type="number" name="no_telp" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan No.Telepon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Bertemu</label>
                                <input type="text" name="bertemu" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Bertemu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" id="exampleInputName1"
                                    placeholder="Masukkan Keperluan">
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Foto</label>
                                <input type="file" name="foto" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Tanda Tangan</label>
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
