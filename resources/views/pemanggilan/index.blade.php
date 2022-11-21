@extends('admin.layout')
@section('title')
Halaman Data User
@endsection
@section('content')

    <style>
        #playlist {
            width: 100%;
            height: 350px;
            outline: auto;
        }

        input#seekslider{
            width:100px;
        }

        input#volumeslider{
            width: 70px;
        }

        div#timebox{
            margin: 0px 10px 0px 0px;
            float:left;
            width:90px;
            background:#000;
            border-bottom:#333 1px solid;
            text-align:center;
            color: gray;
            font-family: Arial, Helvetica, sans-serif;
            font-size:11px;
            border-radius: 3px;
        }


    </style>

   <div class="container">
        <center><h3>PEMANGGILAN PEGAWAI</h3></center>
        <div class="card" style="outline:auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Pemanggilan Pegawai</h6>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select style="outline:auto" name="pegawai" id="pegawai" class="form-control">
                            @foreach($pegawai as $pg)
                                <option value="{{$pg->nama_pegawai}}">{{$pg->nama_pegawai}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            <select style="outline:auto" name="tujuan" id="tujuan" class="form-control">
                            @foreach($tujuan as $tj)
                                <option value="{{$tj->tujuan}}">{{$tj->tujuan}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div align="right">
                            <button onclick="bahasaIndo()" class="btn btn-primary">Memanggil</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6>Play List</h6>

                        <div id="playlist">
                            <div id="audio_player">
                                @php
                                    $data = ["audio","audio1"];
                                @endphp
                                @foreach($data as $i => $a)
                                <div class="w-full h-5">
                                    <input style="height: 12px; width: 12px; margin:5px" type="radio" name="playlist" id="playlist"> {{$a}}<br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="float-left">
                            <h5 id="playlist_status" style=""></h5>
                            <div id="timebox">
                                <span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span>
                            </div>
                        </div>
                        <div class="float-right">
                            <center class="py-2">
                                <input id="volumeslider" type="range" min="0" max="100" value="30" step="1">
                                <button id="playpausebtn" class="btn btn-primary"><div id="namep"></div></button>
                                <input id="seekslider" type="hidden" value="0" step="1">
                                <button id="mutebtn" class="btn btn-danger"><div id="names"></div></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=lQPREaQE"></script>
    <script>
        document.getElementById('namep').innerHTML = "Play"
        document.getElementById('names').innerHTML = "Mute"

        // responsiveVoice.setTextReplacements([{
        //     searchvalue: "human",
        //     newvalue: "robot",
        //     systemvoices: ["id-ID"],
        //     lang : 'id-ID'
        // }]);
        function bahasaIndo()
        {
            var pegawai = document.getElementById('pegawai').value
            var tujuan = document.getElementById('tujuan').value
            let msg = new SpeechSynthesisUtterance();
            var text = "Panggilan kepada "+pegawai+" tujuan "+tujuan;
            responsiveVoice.speak(text,
                "Indonesian Male",
                {
                    pitch: 1,
                    rate: 0.8,
                    volume: 1
                }
            );
        }

        function initAudioPlayer(){
            var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto, curtimetext, durtimetext, playlist_status, dir, playlist, ext, agent;
            dir = "audio/";
            playlist = ["audio","audio1"];
            playlist_index = 0;
            ext = ".mp3";
            agent = navigator.userAgent.toLowerCase();
            if(agent.indexOf('firefox') != -1 || agent.indexOf('opera') != -1) {
                ext = ".ogg";
            }
            // Set object references
            playbtn = document.getElementById("playpausebtn");
            mutebtn = document.getElementById("mutebtn");
            seekslider = document.getElementById("seekslider");
            volumeslider = document.getElementById("volumeslider");
            curtimetext = document.getElementById("curtimetext");
            durtimetext = document.getElementById("durtimetext");
            playlist_status = document.getElementById("playlist_status");
            // Audio Object
            audio = new Audio();
            audio.src = dir+playlist[0]+ext;
            audio.loop = false;
            audio.play();
            playlist_status.innerHTML = "Track "+(playlist_index+1)+" - "+ playlist[playlist_index]+ext;
            // Add Event Handling
            playbtn.addEventListener("click",playPause);
            mutebtn.addEventListener("click", mute);
            seekslider.addEventListener("mousedown", function(event){ seeking=true; seek(event); });
            seekslider.addEventListener("mousemove", function(event){ seek(event); });
            seekslider.addEventListener("mouseup",function(){ seeking=false; });
            volumeslider.addEventListener("mousemove", setvolume);
            audio.addEventListener("timeupdate", function(){ seektimeupdate(); });
            audio.addEventListener("ended", function(){ switchTrack(); });
            // Functions
            function switchTrack(){
                if(playlist_index == (playlist.length - 1)){
                    playlist_index = 0;
                } else {
                    playlist_index++;
                }
                playlist_status.innerHTML = "Track "+(playlist_index+1)+" - "+ playlist[playlist_index]+ext;
                audio.src = dir+playlist[playlist_index]+ext;
                audio.play();
            }

            function playPause(){
                if(audio.paused){
                    audio.play();
                    // playbtn.style.background = "url(btnimg/pause.png) no-repeat";
                    document.getElementById("namep").innerHTML = "Pause"
                } else {
                    audio.pause();
                    document.getElementById("namep").innerHTML = "Play"
                    // playbtn.style.background = "url(btnimg/play.png) no-repeat";
                }
            }

            function mute(){
                if(audio.muted){
                    audio.muted = false;
                    // mutebtn.style.background = "url(btnimg/speaker.png) no-repeat";
                } else {
                    audio.muted = true;
                    // mutebtn.style.background = "url(btnimg/speaker_muted.png) no-repeat";
                }
            }

            function seek(event){
                if(seeking){
                    seekslider.value = event.clientX - seekslider.offsetLeft;
                    seekto = audio.duration * (seekslider.value / 100);
                    audio.currentTime = seekto;
                }
            }

            function setvolume(){
                audio.volume = volumeslider.value / 100;
            }

            function seektimeupdate(){
                var nt = audio.currentTime * (100 / audio.duration);
                seekslider.value = nt;
                var curmins = Math.floor(audio.currentTime / 60);
                var cursecs = Math.floor(audio.currentTime - curmins * 60);
                var durmins = Math.floor(audio.duration / 60);
                var dursecs = Math.floor(audio.duration - durmins * 60);
                if(cursecs < 10){ cursecs = "0"+cursecs; }
                if(dursecs < 10){ dursecs = "0"+dursecs; }
                if(curmins < 10){ curmins = "0"+curmins; }
                if(durmins < 10){ durmins = "0"+durmins; }
                curtimetext.innerHTML = curmins+":"+cursecs;
                durtimetext.innerHTML = durmins+":"+dursecs;
            }
        }
        window.addEventListener("load", initAudioPlayer);
    </script>

@endsection
