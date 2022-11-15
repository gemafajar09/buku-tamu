@extends('admin.layout')
@section('title')
Halaman Data Pegawai
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pegawai</h4>
                <p class="card-description">
                    <a href="{{ route('input-pegawai') }}" class="btn btn-primary btn-sm"><i class="typcn typcn-plus"></i>Tambah Data</a>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($pegawai as $data) :
                            ?>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>
                                    <a href="{{ route('edit-pegawai', $data->id) }}" class="btn btn-info btn-sm"><i class="typcn typcn-edit"></i></a>
                                    <a href="{{ route('delete-pegawai', $data->id) }}" class="btn btn-danger btn-sm"><i class="typcn typcn-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
