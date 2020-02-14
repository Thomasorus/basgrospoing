<audio id="player" src="<?php echo $audioFile ?>"></audio>
<div class="audioplayer">
    <button id="playbutton" class="playbutton">
        <p id="playtext" class="play-icon" aria-label="Jouer ce podcast"></p>
        <p id="currentTime">00:00</p>
    </button>
    <progress id="seekbar" value="0" max="1"></progress>
    <button id="changeSpeed" type="button"><small>Vitesse : x <span id="showSpeed">1</span></small></button>
    <div class="volume">
        <input type="radio" name="volume" value="0.1" id="vol10" class="sr-only" />
        <label for="vol10">
            <span class="sr-only">Volume Level 10/100</span>
        </label>
        <input type="radio" name="volume" value="0.2" id="vol20" class="sr-only" />
        <label for="vol20">
            <span class="sr-only">Volume Level 20/100</span>
        </label>
        <input type="radio" name="volume" value="0.3" id="vol30" class="sr-only" />
        <label for="vol30">
            <span class="sr-only">Volume Level 30/100</span>
        </label>
        <input type="radio" name="volume" value="0.4" id="vol40" class="sr-only" />
        <label for="vol40">
            <span class="sr-only">Volume Level 40/100</span>
        </label>
        <input type="radio" name="volume" value="0.5" id="vol50" class="sr-only" />
        <label for="vol50">
            <span class="sr-only">Volume Level 50/100</span>
        </label>
        <input type="radio" name="volume" value="0.6" id="vol60" class="sr-only" />
        <label for="vol60">
            <span class="sr-only">Volume Level 60/100</span>
        </label>
        <input type="radio" name="volume" value="0.7" id="vol70" class="sr-only" />
        <label for="vol70">
            <span class="sr-only">Volume Level 70/100</span>
        </label>
        <input type="radio" name="volume" value="0.8" id="vol80" class="sr-only" />
        <label for="vol80">
            <span class="sr-only">Volume Level 80/100</span>
        </label>
        <input defaultChecked type="radio" name="volume" value="0.9" id="vol90" class="sr-only" />
        <label for="vol90">
            <span class="sr-only">Volume Level 90/100</span>
        </label>
        <input type="radio" name="volume" value="1" id="vol100" class="sr-only" />
        <label for="vol100">
            <span class="sr-only">Volume Level 100/100</span>
        </label>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        var audio = document.querySelector('#player');
        var url = audio.getAttribute('src');
        var filename = url.replace(/^.*[\\\/]/, '');
        var currentTime = document.querySelector('#currentTime');
        var totalTime = document.querySelector('#totalTime');
        var changeSpeed = document.querySelector('#changeSpeed');
        var showSpeed = document.querySelector("#showSpeed");
        var changeVolume = document.querySelectorAll('input.sr-only');
        var playbutton = document.querySelector("#playbutton");
        var playtext = document.querySelector("#playtext");
        var pause = document.querySelector("#pause");
        var progressbar = document.querySelector('#seekbar');
        var playbackRateMax = 2;
        var playbackRateMin = 0.75;
        var localProgress = localStorage.getItem(filename);
        if (!localProgress) {
            localStorage.setItem(filename, audio.currentTime);
        }

        function setPlaySpeed() {
            var currentSpeed = audio.playbackRate;
            if (currentSpeed < playbackRateMax) {
                audio.playbackRate = currentSpeed + 0.25;
            } else {
                audio.playbackRate = playbackRateMin;
            }
            showSpeed.innerHTML = audio.playbackRate;
        }

        function setVolume(val) {
            audio.volume = val;
        }

        function playAudio() {
            if (audio.currentTime >= 0 && audio.paused) {
                if (localStorage.getItem(filename)) {
                    audio.currentTime = localStorage.getItem(filename);
                    audio.play();
                } else {
                    audio.play();
                }
                playtext.classList.add("paused");
            } else {
                audio.pause();
                playtext.classList.remove("paused");
            }
        }

        function seek(e) {
            var percent = e.offsetX / this.offsetWidth;
            audio.currentTime = percent * audio.duration;
            progressbar.value = percent / 100;
            if (audio.duration > 0 && audio.paused) {
                localStorage.setItem(filename, audio.currentTime);
            }
        }

        function formatTime(time) {
            var hours = Math.floor(time / 3600);
            var minutes = Math.floor((time - hours * 3600) / 60);
            var seconds = time - hours * 3600 - minutes * 60;
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            seconds = parseInt(seconds, 10);
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            currentTime.innerHTML = hours + ':' + minutes + ':' + seconds;
        }

        function udpateProgress() {
            progressbar.value = audio.currentTime / audio.duration;
        }

        var update = setInterval(function () {
            //Updating progress bar in real time
            if (localProgress) {
                formatTime(localStorage.getItem(filename));
            } else {
                formatTime(audio.currentTime);
            }
            if (audio.duration && localProgress) {
                progressbar.value = localStorage.getItem(filename) / audio.duration;
            }
            //Updating localstorage in real time
            if (audio.duration > 0 && !audio.paused) {
                localStorage.setItem(filename, audio.currentTime);
            }
        }, 10);

        //Event Listeners
        changeSpeed.addEventListener('click', setPlaySpeed, false);
        playbutton.addEventListener('click', playAudio, false);
        audio.addEventListener('progress', udpateProgress, false);
        progressbar.addEventListener('click', seek, false);
        for (var i = 0; i < changeVolume.length; i++) {
            changeVolume[i].addEventListener("click", function () {
                setVolume(this.value);
            });
        }
    });
</script>