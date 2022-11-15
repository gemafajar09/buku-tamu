@extends('admin.layout')
@section('title')
Halaman Edit Data Tujuan
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Data Tujuan</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{ route('update-tujuan', $tujuan->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" id="exampleInputName1" placeholder="Masukkan Tujuan" value="{{ $tujuan->tujuan }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('tujuan') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
