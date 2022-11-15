@extends('admin.layout')
@section('title')
Halaman Edit Data User
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Data User</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="{{ route('update-user', $user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama Lengkap" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Masukkan Alamat Email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Masukkan Password" value="{{ $user->password }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('user') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
