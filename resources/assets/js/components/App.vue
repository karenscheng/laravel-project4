<template>
  <div class="homepage-hero-module">

    <div class="video-container">
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">

            <source :src="videoSrc" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source :src="webmSrc" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        <div class="poster hidden">
            <img :src="imgSrc" alt="">
        </div>
    </div>
    <div class="overlay">
      <div class="title">
        <h1>Welcome to Crowdplay</h1>
      </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    data () {
      return {
        videoSrc: "./Bokeh-Tov.mp4",
        webmSrc: "./Bokeh-Tov.webm",
        imgSrc: "./Bokeh-Tov.jpg"
      }
    },
    mounted() {
        console.log('Component mounted.')
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
    }
}
</script>

<style scoped>

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
      z-index: 100;
      position: absolute;
      background: rgba(0, 0, 0, 0.4);
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
    color: white;
    font-weight: 300;
    font-style: normal;
    font-size: 64px;
    cursor: default;
  }

</style>
