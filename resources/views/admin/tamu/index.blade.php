@extends('admin.layout')
@section('title')
Halaman Data Tamu
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Data Tamu</h4>
                {{-- <p class="card-description">
                    <a href="{{ route('input-tamu') }}" class="btn btn-primary btn-sm"><i class="typcn typcn-plus"></i>Tambah Data</a>
                </p> --}}
                <div class="table-responsive pt-3">
                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tamu</th>
                                <th>Instansi</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>No.Telepon</th>
                                <th>Bertemu</th>
                                <th>Keperluan</th>
                                <th>Foto Tamu</th>
                                <th>Tanda Tangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($tamu as $data) :
                            ?>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->instansi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td>{{ $data->no_telp }}</td>
                                <td>{{ $data->bertemu }}</td>
                                <td>{{ $data->keperluan }}</td>
                                <td><img src="{{ asset($data->foto) }}" alt=""></td>
                                <td><img src="{{ asset($data->ttd) }}" alt=""></td>
                                <td>
                                    <a href="{{ route('edit-tamu', $data->id) }}" class="btn btn-info btn-sm btn-block"><i class="typcn typcn-edit"></i></a>
                                    <a href="{{ route('delete-tamu', $data->id) }}" class="btn btn-danger btn-sm btn-block"><i class="typcn typcn-trash"></i></a>
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
