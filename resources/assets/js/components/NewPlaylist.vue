<template>
  <div class="newplaylist">
    <div class="backdrop" v-show="first">
      <button class="btn-main" @click="returnHome">
        <span>Cancel</span>
      </button>
    </div>
    <PlaylistCreator @formTime="showForm" @play="play" v-if="creation" :playlistId="playlistId"></PlaylistCreator>
    <Play v-if="playing" @edit="edit" :playlistId="playlistId"></Play>
  </div>
</template>

<script>

import PlaylistCreator from './PlaylistCreator'
import Play from './Play'
// import Loader from './Loader'

export default {
    data () {
      return {
        loading: false,
        first: true,
        playlist: null,
        creation: false,
        playing: false,
        fromAdmin: window.fromAdmin,
        playlistId: window.playlist_id,
        videos: null,
      }
    },
    components: {
      PlaylistCreator,
      Play
    },
    created () {
      console.log('NewPlaylist -> created. playlistId & fromAdmin: ' + this.playlistId + ' ' + this.fromAdmin);
      if (this.fromAdmin) { //coming from admin view
        this.showPlaylist();
      } else {
        this.showForm();
      }
    },
    methods: {
      made (playlistId) {
        window.location = `/playlist/${playlistId}`
        this.playlistId = playlistId;
      },
      returnHome () {
        this.$emit("goHome")
      },
      play (videos, playlistId) {
        this.videos = videos;
        this.playlistId = playlistId;
        this.playing = true;
        this.creation = false;
      },
      edit () {
        this.playing = false;
        this.creation = true;
      },
      showForm () {
        window.location = '/create'
      },
      showPlaylist () {
        this.creation = true;
        this.first = false;
      }
    }
}

</script>

<style scoped>

.newplaylist {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.backdrop {
  background-color: rgba(0, 0, 0, .5);
  height: 90vh;
  width: 90vw;
  padding: 20px;
}

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 15px 40px;
  display: inline-block;
  margin: 15px 15px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
}

.btn-main:hover {
  background: rgba(255,	215,175, 0.3);
}

</style>
