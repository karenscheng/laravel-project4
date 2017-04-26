<template>
  <div class="playlistview">
    <div class="videoBox">
      <div class="flexme">
        <h3>{{ this.currentVideo.name }}</h3>
      </div>
      <iframe id="player" type="text/html" width="256" height="156"
  :src="this.modifiedLink" frameborder="0"></iframe>
    </div>
  </div>
</template>

<script>

//imports here

// http://www.youtube.com/embed/Q5_47eLxb8o?enablejsapi=1&origin=http://example.com
// https://www.youtube.com/watch?v=Q5_47eLxb8o
// https://www.youtube.com/watch?v=EfYf6RIxZ3Y
// https://www.youtube.com/watch?v=ultX5ZR-sQE
// https://www.youtube.com/watch?v=ukNOaKeUEQY

export default {
    data () {
      return {
        modifiedLink: ''
      }
    },
    created () {
      console.log('PlaylistView -> this.currentVideo: ' + this.currentVideo);
      var videoId = this.parseLink(this.currentVideo.link);
      //autoplay=1&
      this.modifiedLink = 'https://www.youtube.com/embed/' + videoId + '?origin=http://example.com';
      console.log(this.modifiedLink);
    },
    props: [
      'currentVideo'
    ],
    methods: {
      parseLink (url) {
          var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
          var match = url.match(regExp);
          return (match&&match[7].length==11)? match[7] : false;
      }
    }
}

</script>

<style scoped>

.videoBox {
  display: flex;
  width: 80vw;
  justify-content: center;

}

.flexme {
  display: flex;
  flex-direction: column;
  align-items: baseline;
  justify-content: center;
}

.playlistview {
  height: 45vh;
  padding: 10px;
  overflow: scroll;
  width: 80vw;
  background-color: rgba(255, 255, 255, 0.1);
}

h2 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 48px;
  cursor: default;
}

h3 {
  font-family: "Open Sans";
  color: white;
  align-self: baseline;
  margin-right: 20px;
}

</style>
