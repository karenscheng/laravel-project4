<template>
  <div class="playlistcreator">
    <div class="theme-panel">
      <h2>Edit playlist "{{ this.name }}" </h2>
    </div>
    <div class="overlay-panel">
      <h3>Add video to playlist</h3>
      <div class="row">
        <form action="#" v-on:submit="add">
          <input type="text" placeholder="Custom video name" v-model="videoName">
          <input type="text" placeholder="Youtube video link" v-model="link">
        </form>
      </div>
      <p class="boo" v-if="error">Error: Playlist could not be created</p>
      <p class="yay" v-if="success">Playlist created!</p>
      <div class="row">
        <button class="btn btn-main" @click="add">Add Video</button>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
    data () {
      return {
        videoName: '',
        link: '',
        error: false,
        success: false
      }
    },
    props: {
      name
    },
    components: {
      //optional
    },
    methods: {
      add () {
        console.log('PlaylistCreator -> add');
        this.videoName = '';
        this.link = '';
        this.sendRequest();
    },
    sendRequest () {
      // console.log(playlist.id);
      axios.post('playlists/${playlist.id}/videos', {
        name: this.videoName,
        link: this.link
      })
        .then((response) => {
          console.log('PlaylistCreator -> fetch success');
          console.log(response.data);
          this.success = true;
        })
        .catch((error) => {
          console.log('PlaylistCreator -> sendRequest error');
          this.error = true;
        });
      // axios.post('/playlists/')
    }
  }
}

</script>

<style scoped>

.playlistcreator {
  height: 100vh;
  width: 100vw;
  background-image: url('/Bokeh-Tov.jpg');
  /*background-color: #a196bd;*/
  display: flex;
  flex-direction: column;
  align-items: center;
}

.overlay-panel {
  background-color: rgba(0, 0, 0, 0.7);
  height: 85vh;
  width: 100vw;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.theme-panel {
  width: 100vw;
  height: 15vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-image: url('/Bokeh-Tov.jpg');
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
  color: white
}

form {
  display: flex;
  flex-direction: column;
}

form input {
  width: 30vw;
  font-family: 'Open Sans';
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
  background: rgba(255,	215,175, 0.1);
}

</style>
