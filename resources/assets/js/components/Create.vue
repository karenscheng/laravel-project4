<template>
  <!-- this component is associated with the /create route -->
  <div class="create">
    <div class="normal-view">
      <div class="video-container"> <!-- video background exists here -->
          <div class="filter"></div>
          <video autoplay loop class="fillWidth">
              <source :src="videoSrc" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
              <source :src="webmSrc" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
          </video>
          <div class="poster hidden">
              <img :src="imgSrc" alt="">
          </div>
      </div>

      <div class="overlay">   <!-- puts this div on top of video -->
        <div class="backdrop"> <!-- black transparent background -->
          <button class="btn btn-main cancel" @click="goHome">Cancel</button>
          <h1>Create a New Playlist</h1>
          <form action="#" v-on:submit="create">
            <input type="text" placeholder="Playlist Name" v-model="name" />
          </form>
          <p class="boo" v-if="error">Error: Playlist could not be created</p>
          <p class="yay" v-if="success">Playlist created!</p>
          <button class="btn btn-main" @click="create" :disabled="loading">Create Playlist</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

//imports here

export default {
    data () {
      return {
        videoSrc: "./Bokeh-Tov.mp4",
        webmSrc: "./Bokeh-Tov.webm",
        imgSrc: "./Bokeh-Tov.jpg",
        name: '',
        loading: false,
        error: false,
        success: false
      }
    },
    mounted() {
        console.log('Component mounted.')
        // this below is all code to get the video background to work.
        // credit: http://coverr.co/
        $( document ).ready(function() {

            scaleVideoContainer()

            initBannerVideoSize('.video-container .poster img')
            initBannerVideoSize('.video-container .filter')
            initBannerVideoSize('.video-container video')

            $(window).on('resize', function() {
                scaleVideoContainer()
                scaleBannerVideoSize('.video-container .poster img')
                scaleBannerVideoSize('.video-container .filter')
                scaleBannerVideoSize('.video-container video')
            })

        })

        function scaleVideoContainer() {

            var height = $(window).height() + 5
            var unitHeight = parseInt(height) + 'px'
            $('.homepage-hero-module').css('height',unitHeight)

        }

        function initBannerVideoSize(element){

            $(element).each(function(){
                $(this).data('height', $(this).height())
                $(this).data('width', $(this).width())
            })

            scaleBannerVideoSize(element)

        }

        function scaleBannerVideoSize(element){

            var windowWidth = $(window).width(),
            windowHeight = $(window).height() + 5,
            videoWidth,
            videoHeight

            $(element).each(function(){
                var videoAspectRatio = $(this).data('height')/$(this).data('width')

                $(this).width(windowWidth)

                if(windowWidth < 1000){
                    videoHeight = windowHeight
                    videoWidth = videoHeight / videoAspectRatio
                    $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'})

                    $(this).width(videoWidth).height(videoHeight)
                }

                $('.homepage-hero-module .video-container video').addClass('fadeIn animated')

            })
        }
        // end of jQuery for video play
    },
    methods: {
      create () {
        console.log('Create -> create');
        if (this.loading) {
          alert('request is already being made');
          return false;
        }
        this.loading = true;
        this.sendRequest();
      },
      sendRequest () {
        axios.post('/playlists', {  // creates new playlist
          name: this.name,
        })
        .then((response) => {
          console.log('Create -> sendRequest success');
          console.log('playlist id: ' + response.data.id);
          this.loading = false;
          this.success = true;
          this.name = '';
          window.location = `/playlist/${response.data.id}`;  // go to playlist admin route
        })
        .catch((error) => {
          console.error('ContactForm -> sendRequest error');
          this.loading = false;
          this.error = true;
        });
      },
      goHome () { // runs when "cancel" is clicked
        window.location = '/';
      }
    }
}

</script>

<style scoped>

.create, .normal-view {
  height: 100vh;
  width: 100vw;
}

.overlay {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.homepage-hero-module {
    border-right: none;
    border-left: none;
    position: relative;
}
.no-video .video-container video,
.touch .video-container video {
    display: none;
}
.no-video .video-container .poster,
.touch .video-container .poster {
    display: block !important;
}
.video-container {
    position: relative;
    bottom: 0%;
    left: 0%;
    height: 100%;
    width: 100%;
    overflow: hidden;
    background: #000;
}
.video-container .poster img {
    width: 100%;
    bottom: 0;
    position: absolute;
}
.video-container .filter {
    /*z-index: 100;*/
    position: absolute;
    /*background: rgba(0, 0, 0, 0.4);*/
    width: 100%;
}
.video-container video {
    z-index: 0;
    bottom: 0;
}
.video-container video.fillWidth {
    width: 100%;
}
.overlay {
  position:absolute;
  top:0;
  left:0;
  z-index:1;
}

.title {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
}

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 25px 80px;
  display: inline-block;
  margin: 45px 30px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 24px;
}

.cancel {
  font-size: 18px;
  padding: 15px 30px;
  position: absolute;
  top: 15px;
  left: 60px
}

.btn-main:hover {
  background: rgba(255,	215, 175, 0.1);
}

.boo {
  color: red
}

.yay {
  color: green
}

h1 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 72px;
  cursor: default;
}

input {
  margin-top: 60px;
  margin-bottom: 60px;
  width: 40vw;
  background-color: transparent;
  color: white;
  outline: none;
  outline-style: none;
  outline-offset: 0;
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: solid #eeeeee 1px;
  padding: 3px 10px;
  font-size: 24px;
}

::-webkit-input-placeholder {
  color: #FAEBD7;
}

.backdrop {
  background-color: rgba(0, 0, 0, .5);
  height: 90vh;
  width: 90vw;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

@media only screen and (max-width: 680px) {
  h1 {
    font-size: 64px;
  }

  .btn-main {
    padding: 20px 60px;
    margin: 30px 15px;
    font-size: 20px;
  }

  input {
    width: 60vw;
  }
}

@media only screen and (max-width: 545px) {
  h1{
    font-size: 48px;
  }

  .btn-main {
    padding: 20px 40px;
    margin: 20px 10px;
    font-size: 18px;
  }

  .cancel {
    padding: 10px 20px;
  }

  h3 {
    font-size: 24px;
  }

  input {
    width: 80vw;
  }
}

@media only screen and (max-width: 410px) {
  h1{
    font-size: 36px;
  }

  .cancel {
    padding: 10px 20px;
  }

  h3 {
    font-size: 18px;
  }

  input {
    width: 80vw;
  }
}

</style>
