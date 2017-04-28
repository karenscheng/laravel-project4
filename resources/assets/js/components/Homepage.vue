<template>
  <div class="homepage">
    <!-- loads when you access the home route -->
    <div class="normal-view">
      <div class="video-container"> <!-- video background -->
          <div class="filter"></div>
          <video autoplay loop class="fillWidth">
              <source :src="videoSrc" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
              <source :src="webmSrc" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
          </video>
          <div class="poster hidden">
              <img :src="imgSrc" alt="">
          </div>
      </div>
      <div class="overlay" v-if="normal"> <!-- puts this div on top of video -->
        <div class="title">
          <h1>Welcome to Crowdplay</h1>
          <button @click="createPlaylist" class="btn-main create-btn arrow-right">
            <span>Create a new playlist</span>
          </button>
          <button class="btn-info" id="info" @click="info">
            <span>What is Crowdplay?</span>
          </button>
          <div class="credits">
            <a href="/styleguide" class="credit-entry">Styleguide</a>
            <a href="http://karenscheng.com/" target="_newtab" class="credit-entry">Portfolio</a>
            <a href="https://github.com/karenscheng" target="_newtab" class="credit-entry">Github</a>
            <a href="#" @click="viewCredits" class="credit-entry">Credits</a>
          </div>
        </div>
      </div>
      <Credits class="overlay" v-if="creditsMode" @goHome="normalView"></Credits> <!-- loads when you click "credits" -->
      <Info class="overlay" v-if="infoMode" @goHome="normalView"></Info> <!-- loads when you click "what is crowdplay?" -->
    </div>
  </div>
</template>

<script>

import Info from './Info'
import Credits from './Credits'
import axios from 'axios'

export default {
    data () {
      return {
        videoSrc: "./Bokeh-Tov.mp4",
        webmSrc: "./Bokeh-Tov.webm",
        imgSrc: "./Bokeh-Tov.jpg",
        normal: true,
        infoMode: false,
        formMode: false,
        creditsMode: false
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

            // console.log(windowHeight)

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
    components: {
      Info,
      Credits
    },
    methods: {
      info () {
        this.normal = false
        this.infoMode = true
      },
      normalView () {
        this.infoMode = false
        this.formMode = false
        this.creditsMode = false
        this.normal = true
      },
      createPlaylist () {
        window.location = `/create`
      },
      viewCredits () {
        this.creditsMode = true
        this.normal = false
      }
    }
}

</script>

<style scoped>

.homepage, .normal-view {
  height: 100vh;
  width: 100vw;
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

h1 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 72px;
  cursor: default;
}

.btn-info {
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: #ffd7af;
  cursor: pointer;
  padding: 10px 30px;
  display: inline-block;
  margin: 30px 15px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
}

.btn-info span {
  color: rgba(0, 0, 0, .7);
  font-family: "Open Sans", sans-serif;
}

.btn-info:hover {
  background: rgba(255,	215,175, 0.3);
  border: 3px solid #ffd7af;
  color: white;
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

.btn-main:hover {
  background: rgba(255,	215, 175, 0.1);
}

#info {
  cursor: pointer;
  color: white;
  font-family: "Open Sans", sans-serif;
}

#styleguide {
  cursor: pointer;
}

.credits {
  margin-top: 30px;
  margin-bottom: -20px;
  display: flex;
  width: 60vw;
  justify-content: space-between;
}

.credit-entry {
  color: white;
  text-decoration: none;
}

.styleguide:hover {
  color: white;
  text-decoration: underline;
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
}

@media only screen and (max-width: 410px) {
  h1{
    font-size: 36px;
  }
}


</style>
