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
        #playlist .active {
            background-color: red;
        }
        #playlist input {
            display: none;
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Pemanggilan Pegawai</h6>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select name="pegawai" id="pegawai" class="form-control">
                            @foreach($pegawai as $pg)
                                <option value="{{$pg->nama_pegawai}}">{{$pg->nama_pegawai}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            <select name="tujuan" id="tujuan" class="form-control">
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
                                
                                @foreach($playlist as $i => $a)
                                <div class="w-full h-5 p-2" id="item{{$i}}" onclick="idup('{{$i}}')">
                                    <input style="height: 12px; width: 12px; margin:5px" value="{{$i}}" type="radio" name="playlist" id="list{{$i}}"> {{$a}}<br>
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
                                <button id="stopbtn" class="btn btn-primary"><div id="namex"></div></button>
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
    {{-- <script>
        document.getElementById('namep').innerHTML = "Play"
        document.getElementById('names').innerHTML = "Mute"
        document.getElementById('namex').innerHTML = "Stop"

        // responsiveVoice.setTextReplacements([{
        //     searchvalue: "human",
        //     newvalue: "robot",
        //     systemvoices: ["id-ID"],
        //     lang : 'id-ID'
        // }]);

        lastId = -1;
        function idup(id){
            $('#item'+lastId).removeClass("active")
            $('#item'+id).addClass("active")
            $('#list'+lastId).prop("checked", false);
            $('#list'+id).prop("checked", true);
            lastId = id

            playlist = ['{!! implode("', '", $data) !!}'];

            ext = ".mp3";

            audio.src = "audio/"+playlist[id]+ext
            if (!audio.played) {
                audio.play();
            }
            playlist_status.innerHTML = "Track "+(parseInt(id)+1)+" - "+ playlist[id]+ext;
        }

        var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto, curtimetext, durtimetext, playlist_status, dir, playlist, ext, agent;
        function initAudioPlayer(){
            dir = "audio/";
            ext = ".mp3";
            agent = navigator.userAgent.toLowerCase();
            if(agent.indexOf('firefox') != -1 || agent.indexOf('opera') != -1) {
                ext = ".ogg";
            }
            
            playbtn = document.getElementById("playpausebtn");
            mutebtn = document.getElementById("mutebtn");
            seekslider = document.getElementById("seekslider");
            volumeslider = document.getElementById("volumeslider");
            curtimetext = document.getElementById("curtimetext");
            durtimetext = document.getElementById("durtimetext");
            playlist_status = document.getElementById("playlist_status");
            
            audio = new Audio();
            // audio.src = dir+playlist[0]+ext;
            // audio.loop = false;
            // audio.play();
            playlist_status.innerHTML = "Track "+(playlist_index+1)+" - "+ playlist[playlist_index]+ext;
            // Add Event Handling
            
            
            // Functions
            function switchTrack(id = false){
                if(playlist_index == (playlist.length - 1)){
                    playlist_index = 0;
                } else {
                    playlist_index++;
                }
                playlist_status.innerHTML = "Track "+(playlist_index+1)+" - "+ playlist[playlist_index]+ext;
                audio.src = dir+playlist[playlist_index]+ext;
                audio.play();
            }        
        }
        window.addEventListener("load", initAudioPlayer);
    </script> --}}
    <script>
        var btnPlayPause = document.getElementById('namep'),
            btnMute = document.getElementById('names'),
            btnStop = document.getElementById('namex'),
            playlist_status = document.getElementById("playlist_status"),
            curtimetext = document.getElementById("curtimetext"),
            durtimetext = document.getElementById("durtimetext");
            
        btnPlayPause.innerHTML = "Play"
        btnMute.innerHTML = "Mute"
        btnStop.innerHTML = "Stop"

        var audio = new Audio();

        const slowly = (callback, iteration, time) => {
            return new Promise((resolve, reject) => {
                a = 0;
                aa = setInterval(() => {
                    callback()
                    a++;
                    if (a > iteration) {
                        clearInterval(aa);
                        resolve(true)
                    }
                }, time);
            })
        }

        vol = 1
        async function bahasaIndo()
        {
            await slowly(() => {
                vol -= .2;
                audio.volume = vol;
            }, 3, 300)
            var pegawai = document.getElementById('pegawai').value
            var tujuan = document.getElementById('tujuan').value
            let msg = new SpeechSynthesisUtterance();
            var text = "Panggilan kepada "+pegawai+" tujuan "+tujuan;
            a = responsiveVoice.speak(text,
                "Indonesian Male",
                {
                    pitch: 1,
                    rate: 0.8,
                    volume: 1,
                    onend: async function() {
                        await slowly(() => {
                            vol += .2;
                            audio.volume = vol;
                        }, 3, 300)
                    }
                }
            );
        }   

        lastId = -1;
        function idup(id){
            btnPlayPause.innerHTML = "Pause"
            $('#item'+lastId).removeClass("active")
            $('#item'+id).addClass("active")
            $('#list'+lastId).prop("checked", false);
            $('#list'+id).prop("checked", true);
            lastId = id

            playlist = ['{!! implode("', '", $playlist) !!}'];

            ext = ".mp3";

            audio.src = "audio/"+playlist[id]+ext
            audio.play();
            playlist_status.innerHTML = "Track "+(parseInt(id)+1)+" - "+ playlist[id]+ext;
        }

        btnPlayPause.addEventListener("click", playPause);
        btnStop.addEventListener("click", stopPlayer);
        btnMute.addEventListener("click", mute);

        function stopPlayer(){
            if (!audio.paused) {
                audio.currentTime = 0
                playPause()
                btnPlayPause.innerHTML = "Play"
            }
        }

        function playPause(){
            if(audio.paused){
                audio.play();
                btnPlayPause.innerHTML = "Pause"
            } else {
                audio.pause();
                btnPlayPause.innerHTML = "Resume"
            }
        }

        function mute(){
            audio.muted = !audio.muted
            btnMute.innerHTML = !audio.muted ? 'Mute' : 'Unmute'
        }

        seekslider.addEventListener("mousedown", function(event){ seeking=true; seek(event); });
        seekslider.addEventListener("mousemove", function(event){ seek(event); });
        seekslider.addEventListener("mouseup",function(){ seeking=false; });
        volumeslider.addEventListener("mousemove", setvolume);
        audio.addEventListener("timeupdate", function(){ seektimeupdate(); });
        audio.addEventListener("ended", function(){ switchTrack(); });

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
        
    </script>
@endsection
