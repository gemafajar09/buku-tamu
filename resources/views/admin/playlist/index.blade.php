@extends('admin.layout')
@section('title')
Halaman Data Tamu
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Playlist</h4>
                <p class="card-description">
                    <a href="#" onclick="modalB()" role="button" class="btn btn-primary btn-sm"><i class="typcn typcn-plus"></i>Tambah Data</a>
                </p>
                <div class="table-responsive pt-3">
                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Lagu</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($play as $i => $a)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$a->playlist}}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{route('playlist-hapus',$a->id)}}">hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="addPlay" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('playlist-add')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="">Playlist <i style="color:red;font-size:9px">.mp3/.oog</i></label>
                <input type="file" name="audio" id="audio" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    function modalB(){
        $('#addPlay').modal('show')
    }
</script>
@endsection
