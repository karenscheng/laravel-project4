<template>
  <div class="add">
    <div class="theme-panel">
      <h1>Contribute To Playlist</h1>
      <a href="/" class="btn btn-main home">Home</a>
    </div>
    <div class="overlay-panel">
      <h3>Add videos to Playlist "{{ this.playlistId }}"</h3>
      <div class="add-video">
        <form action="#" v-on:submit="add">
          <input type="text" placeholder="Custom video name">
          <input type="text" placeholder="Youtube video link">
        </form>
      </div>
      <div class="row">
        <button class="btn btn-main" @click="add">Add Video</button>
      </div>
      <div class="playlistview-placeholder">
        <h3>Videos in this playlist will appear here as soon as I figure out how this frkn axios call works :)</h3>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
    data () {
      return {
        playlistId: window.playlist_id,
        videos: [],
        playlist: null
      }
    },
    created () {
      console.log('current playlist: ' + this.playlistId);
      this.getPlaylist();
      this.getVideos();
    },
    components: {
      //optional
    },
    methods: {
      add () {
        console.log ('Add.vue -> video add');
      },
      getPlaylist () {
        axios.get(`playlists/${this.playlistId}`)
          .then((response) => {
            console.log('Add -> get playlist success: ' + reponse.data);
            this.playlist = response.data;
          })
          .catch((response) => {
            console.log('Add -> get playlist error: ' + response.data);
          })
      },
      getVideos () {
        axios.get(`playlists/${this.playlistId}/videos`)
          .then((response) => {
            console.log('Add -> get videos success: ' + reponse.data);
            this.videos = response.data;
          })
          .catch((response) => {
            console.log('Add -> get videos error: ' + response.data);
          })
      }
    }
}

</script>

<style scoped>

.add {
  height: 100vh;
  width: 100vw;
  background-image: url('/Bokeh-Tov.jpg');
  display: flex;
  flex-direction: column;
  align-items: center;
}

.theme-panel {
  width: 100vw;
  height: 15vh;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  position: relative;
  background-image: url('/Bokeh-Tov.jpg');
}

.add-video {
  display: flex;
  flex-direction: row;
}

.add-video form {
  align-self: center;
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

.btn-main:hover {
  background: rgba(255,	215,175, 0.3);
  color: 	#ffd7af;
}

.home {
  margin: 0;
  position: absolute;
  top: 30px;
  left: 100px;
  padding: 10px 25px;
  font-size: 16px;
  /*align-self: flex-end;*/
}

.overlay-panel {
  background-color: rgba(0, 0, 0, 0.7);
  height: 85vh;
  width: 100vw;
  display: flex;
  flex-direction: column;
  align-items: center;
}

h1 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 72px;
  cursor: default;
}

h3 {
  font-family: "Open Sans";
  color: white
}

form {
  display: flex;
  flex-direction: column;
}

form input {
  width: 30vw;
  font-family: 'Open Sans';
  color: white;
  margin: 5px 15px;
  padding: 5px;
  background-color: transparent;
  outline: none;
  outline-style: none;
  outline-offset: 0;
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: solid #eeeeee 1px;
}

.playlistview-placeholder {
  margin-top: 10px;
  height: 45vh;
  width: 80vw;
  background-color: rgba(255, 255, 255, 0.1);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  overflow-y: scroll;
  position: relative;
}

</style>
