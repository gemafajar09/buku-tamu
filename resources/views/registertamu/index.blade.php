@extends('component.template')

@section('content')

<style>


    #fototamu {
        outline: auto;
        width: 380px;
        height: 280px;
        margin-top: 26px;
        /* position: absolute;
        top: 360px; */
    }
    #tandatangan {
        outline: auto;
        width: auto;
        height: 280px;
        margin-top:20px;

        /* position: absolute; */
        /* top: 360px; */
    }

    body {
        /* transform: scale(0,8) */
    }

    /* #btnfoto {
        position: absolute;
        top: 570px;
    } */

    /* #clear {
        position: absolute;
        top: 570px;
    } */


</style>

   <div class="container">
        <center><h3>BUKU TAMU</h3></center>
        <hr style="border :1px solid black">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- form data -->
                    <div class="col-md-5">
                        <h4><b>REGISTER TAMU</b></h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" onkeyup="cekData()" name="nama_lengkap" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Instansi</label>
                                    <input type="text" id="instansi" onkeyup="cekData()" name="instansi" class="form-control">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Tanggal</label> -->
                                    <input type="hidden" onkeyup="cekData()" id="tanggal" name="tanggal" value="{{date('Y-m-d')}}" class="form-control">
                                <!-- </div> -->
                                <!-- <div class="form-group">
                                    <label for="">Waktu</label> -->
                                    <input type="hidden" id="waktu" name="waktu"  onkeyup="cekData()" value="{{date('H:i:s')}}" class="form-control">
                                <!-- </div> -->
                                <div class="form-group">
                                    <label for="">No Telp</label>
                                    <input type="number" id="notelp" name="notelp"  onkeyup="cekData()" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Bertemu</label>
                                    <input type="text" id="bertemu" name="bertemu" onkeyup="cekData()" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Keperluan</label>
                                    <textarea name="keperluan" id="keperluan" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <button type="button" id="simpan" onclick="simpanx()" style="width:120px" class="btn btn-primary">Simpan</button>
                                        <button type="submit" style="width:120px" class="btn btn-danger">Batal</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form foto -->
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="fototamu"></div>
                            </div>
                            <div class="col-md-12 py-2">
                                <button id="btnfoto" type="button" onclick="ambilgambar()" class="btn btn-success">Ambil Foto</button>
                            </div>
                            <div class="col-md-12 bg-gray">
                                <canvas id="tandatangan"></canvas>
                            </div>
                            <div class="ml-3">
                                <button type="button" id="clear" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <table class="datatable table table-striped">
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
                <tbody>
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
                </tbody>
            </table>
        </div> -->
    </div>

    <script>
        var simpan = document.getElementById("simpan")
        simpan.disabled = true
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
            cekData()
        }

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            cekData()
        }

        var canvas = document.getElementById('tandatangan');

        //warna dasar signaturepad
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });


        //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
            cekData()
        });

        function cekData()
        {
            var file = document.getElementById("image") ? document.getElementById("image").src : ""
            var signature = signaturePad.toDataURL();
            var nama_lengkap = document.getElementById('nama_lengkap').value
            var instansi = document.getElementById('instansi').value
            var tanggal = document.getElementById('tanggal').value
            var waktu = document.getElementById('waktu').value
            var notelp = document.getElementById('notelp').value
            var bertemu = document.getElementById('bertemu').value
            var keperluan = document.getElementById('keperluan').value


            if(nama_lengkap == ""){
                simpan.disabled = true;
            }else if(instansi == ""){
                simpan.disabled = true;
            }else if(tanggal == ""){
                simpan.disabled = true;
            }else if(waktu == ""){
                simpan.disabled = true;
            }else if(notelp == ""){
                simpan.disabled = true;
            }else if(bertemu == ""){
                simpan.disabled = true;
            }else if(file == ""){
                simpan.disabled = true;
            }else if(signature == ""){
                simpan.disabled = true;
            }else if(keperluan == ""){
                simpan.disabled = true;
            }else{
                simpan.disabled = false;
            }
        }

        function simpanx()
        {
            var file = document.getElementById("image") ? document.getElementById("image").src : ""
            var signature = signaturePad.toDataURL();
            var nama_lengkap = document.getElementById('nama_lengkap').value
            var instansi = document.getElementById('instansi').value
            var tanggal = document.getElementById('tanggal').value
            var waktu = document.getElementById('waktu').value
            var notelp = document.getElementById('notelp').value
            var bertemu = document.getElementById('bertemu').value
            var keperluan = document.getElementById('keperluan').value

            var formdata = new FormData();
            formdata.append("foto", file);
            formdata.append("tandatangan", signature);
            formdata.append("nama_lengkap", nama_lengkap);
            formdata.append("instansi", instansi);
            formdata.append("tanggal", tanggal);
            formdata.append("waktu", waktu);
            formdata.append("notelp", notelp);
            formdata.append("bertemu", notelp);
            formdata.append("keperluan", keperluan);
            $.ajax({
                url: "{{url('api/simpanRegister')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'JSON',
                success: function(data) {
                   if(data){
                    window.location.reload()
                   }else{
                    toastr.error("Periksa Kembali")
                   }
                }
            })
        }

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


