<template>
  <div class="newplaylist">
    <div class="backdrop" v-show="first">
      <button class="btn-main" @click="returnHome">
        <span>Cancel</span>
      </button>
      <PlaylistForm @created="created"></PlaylistForm>
    </div>
    <PlaylistCreator @goFetch="fetch" v-if="creation" :playlist="playlist" :videos="videos"></PlaylistCreator>
  </div>
</template>

<script>

import PlaylistForm from './PlaylistForm'
import PlaylistCreator from './PlaylistCreator'
// import Loader from './Loader'

export default {
    data () {
      return {
        loading: false,
        first: true,
        playlist: null,
        creation: false,
        videos: []
      }
    },
    components: {
      PlaylistForm,
      PlaylistCreator
    },
    methods: {
      returnHome () {
        this.$emit("goHome")
      },
      created (playlist) {
        this.playlist = playlist;
        this.loading = true;
        this.loading = false;
        this.first = false;
        this.creation = true;
      },
      fetch (video) {
        // console.log('NewPlaylist->fetch: playlist_id ' + video.playlist_id);
        axios.get(`/playlists/${video.playlist_id}/videos`)
          .then((response) => {
            console.log('NewPlaylist -> fetch response.data: ' + response.data);
            this.videos = response.data;
            console.log(this.videos);
          })
          .catch((response) => {
            console.log('NewPlaylist -> fetch error');
          })
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
