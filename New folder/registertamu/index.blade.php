
@extends('component.template')
@section('content')

   <div class="container py-2">
        <center><h3>BUKU TAMU</h3></center>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- form data -->
                    <div class="col-md-6">
                        <h4><b>REGISTER TAMU</b></h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Instansi</label>
                                    <input type="text" name="instansi" id="instansi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" value="{{date('Y-m-d')}}" name="tanggal" id="tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Waktu</label>
                                    <input type="time" value="{{date('h:i:s')}}" name="waktu" id="waktu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">No Telp</label>
                                    <input type="number" name="notelp" id="notelp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Bertemu</label>
                                    <input type="text" name="bertemu" id="bertemu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <center>
                                        <button type="submit" style="width:120px" class="btn btn-primary">Simpan</button>
                                        <button type="submit" style="width:120px" class="btn btn-danger">Batal</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form foto -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="fototamu"></div>
                                <button id="btnfoto" type="button" onclick="ambilgambar()" class="btn btn-success">Ambil Foto</button>
                            </div>
                            <div class="col-md-6 bg-gray">
                                <canvas id="tandatangan"></canvas>
                                <button type="button" id="clear" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <table class="datatable table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>instansi</th>
                        <th>Tanggal / waktu</th>
                        <th>No Telpon</th>
                        <th>Bertemu</th>
                        <th>Keperluan</th>
                        <th>Foto</th>
                        <th>Tanda Tangan</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody> -->
            </table>
        </div>
   </div>

    <script>
        function ShowCam() {
            Webcam.set({
                // width: 250,
                // height: 300,
                image_format: 'jpeg',
                jpeg_quality: 100
            });

            Webcam.attach('#fototamu');
        }
        window.onload = ShowCam;

        function ambilgambar() {
            Webcam.snap(function(data_uri) {
                document.getElementById('fototamu').innerHTML = '<img id="image" src="' + data_uri + '"/>';
            });
        }

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        var canvas = document.getElementById('tandatangan');

        //warna dasar signaturepad
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });

        //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });

        //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
        // document.getElementById('undo').addEventListener('click', function () {
        //     var data = signaturePad.toData();
        //     if (data) {
        //         data.pop(); // remove the last dot or line
        //         signaturePad.fromData(data);
        //     }
        // });

        //saat tombol change color diklik maka akan merubah warna pena
        // document.getElementById('change-color').addEventListener('click', function () {

        //     //jika warna pena biru maka buat menjadi hitam dan sebaliknya
        //     if(signaturePad.penColor == "rgba(0, 0, 255, 1)"){

        //         signaturePad.penColor = "rgba(0, 0, 0, 1)";
        //     }else{
        //         signaturePad.penColor = "rgba(0, 0, 255, 1)";
        //     }
        // })
    </script>

@endsection


