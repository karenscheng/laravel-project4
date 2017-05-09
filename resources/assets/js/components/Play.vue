<template>
  <div class="play">
    <button class="btn btn-main edit" @click="edit">Edit</button> <!-- edit playlist name. calls edit -->
    <h2>Playing Playlist "{{ this.playlist.name }}"</h2>
    <!-- TODO: when playlist is done playing, show prompt that says "play again" or "add more videos to playlist" -->
    <YoutubePlayer v-for="(video, i) in videos" v-if="index === i" :index="i" :link="video.link" :name="video.name" :prev="videos[checkIndex(index-1)].name" :next="videos[checkIndex(index+1)].name" :prevInd='index-1' :nextInd='index+1' :lastInd="videos.length" @done="nextVideo" @playNext="nextVideo" @playPrev="prevVideo"></YoutubePlayer>
  </div>
</template>

<script>

import YoutubePlayer from './YoutubePlayer'

export default {
    data () {
      return {
        playlist: null,
        index: 0,
        videos: null,
        prevInd: 0,
        nextInd: 0
      }
    },
    mounted () {
      console.log('Play -> playlistId: ' + this.playlistId);
      this.fetch(this.playlistId);  // populates videos
      this.getPlaylist(); // populates playlist
    },
    props: [
      'playlistId'
    ],
    components: {
      YoutubePlayer
    },
    methods: {
      fetch (id) {
        axios.get(`/playlists/${id}/videos`)  // get all videos with playlistid
          .then((response) => {
            console.log('Play -> fetch response.data: ' + response.data);
            this.videos = response.data;
            console.log('Play -> videos: ' + this.videos);
            this.setIndexes();
          })
          .catch((response) => {
            console.log('Play -> fetch error');
          })
      },
      getPlaylist () {  // get playlist name
        console.log('getPlaylist() - current playlist: ' + this.playlistId);
        axios.get(`playlists/${this.playlistId}`)
          .then((response) => {
            console.log('Play -> get playlist success: ' + response);
            this.playlist = response.data;
          })
          .catch((response) => {
            console.log('Play -> get playlist error: ' + response);
          })
      },
      checkIndex (index) {
        if (index < 0) {
          return 0;
        } else if (index > this.videos.length) {
          return this.videos.length;
        } else {
          return index;
        }
      },
      edit () { // parent executes playlist name change
        this.$emit('edit');
      },
      nextVideo () {  // called when YoutubePlayer emits "done"
        this.index++;
      },
      prevVideo () {
        this.index--;
      }
    }
}

</script>

<style scoped>

.play {
  height: 100vh;
  width: 100vw;
  background-image: url('/Bokeh-Tov.jpg');
  display: flex;
  flex-direction: column;
  align-items: center;
}

h2 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 48px;
  cursor: default;
}

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 10px 15px;
  display: inline-block;
  margin: 10px 5px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
}

.edit {
  margin: 0;
  position: absolute;
  top: 30px;
  left: 150px;
  padding: 10px 25px;
  font-size: 16px;
  /*align-self: flex-end;*/
}

.btn-main:hover {
  background: rgba(255,	215,175, 0.3);
  color: 	#ffd7af;
}

</style>
