@extends('admin.layout')
@section('title')
Halaman Input Data Pegawai
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Input Data Pegawai</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{ route('save-pegawai') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama Pegawai">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('pegawai') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
