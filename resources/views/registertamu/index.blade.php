<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    #fototamu {
        outline: auto;
        width: 250px;
        height: 300px;
        position: absolute;
        top: 230px;
    }
    #tandatangan {
        outline: auto;
        width: 250px;
        height: 300px;
        position: absolute;
        top: 230px;
    }

    #btnfoto {
        position: absolute;
        top: 550px;
    }
</style>

<body>
   <div class="container py-5">
        <center><h3>BUKU TAMU</h3></center>
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
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Waktu</label>
                            <input type="time" name="waktu" id="waktu" class="form-control">
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
                        <button id="btnfoto" type="button" class="btn btn-primary">Ambil Foto</button>
                    </div>
                    <div class="col-md-6 bg-gray">
                        <div id="tandatangan"></div>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script>
        function ShowCam() {
        Webcam.set({
            width: 220,
            height: 220,
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#fototamu');
    }
   </script>
</body>
</html>