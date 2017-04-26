<template>
  <div class="playlistcreator">
    <div class="theme-panel">
      <h2>Edit playlist "{{ this.playlist.name }}" </h2>
      <button class="btn btn-main save">Save</button>
    </div>
    <div class="overlay-panel">
      <h3>Add video to playlist</h3>
      <div class="row">
        <form action="#" v-on:submit="add">
          <input type="text" placeholder="Custom video name" v-model="videoName">
          <input type="text" placeholder="Youtube video link" v-model="link">
        </form>
      </div>
      <p class="boo" v-if="error">Error: Video could not be added</p>
      <!-- <p class="yay" v-if="success">Video added!</p> -->
      <div class="row">
        <button class="btn btn-main" @click="add">Add Video</button>
      </div>
      <div v-if="!added" class="playlistview-placeholder">
        <h3>Your playlist is currently empty.</h3>
      </div>
      <PlaylistView v-if="added" :currentVideo="currentVideo"></PlaylistView>
      <!-- <div class="row">
        <button class="btn btn-main">Save</button>
      </div> -->
    </div>
  </div>
</template>

<script>

import axios from 'axios';
import PlaylistView from './PlaylistView';

export default {
    data () {
      return {
        videoName: '',
        link: '',
        error: false,
        success: false,
        player: null,
        done: false,
        tag: null,
        firstScriptTag: null,
        added: false,
        currentVideo: null,
        videos: []
      }
    },
    props: [
      'playlist'
    ],

    components: {
      PlaylistView
    },
    // created () {
    //   // 2. This code loads the IFrame Player API code asynchronously.
    //   this.tag = document.createElement('script');
    //   this.tag.src = 'https://www.youtube.com/iframe_api';
    //   this.firstScriptTag = document.getElementsByTagName('script')[0];
    //   this.firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    //
    // },
    methods: {
      add () {
        console.log('PlaylistCreator -> add');
        this.sendRequest();
        this.videoName = '';
        this.link = ''
      },
      // onYouTubeIframeAPIReady() {
      //   this.player = new YT.Player('player', {
      //     height: '390',
      //     width: '640',
      //     videoId: 'M7lc1UVf-VE',
      //     events: {
      //       'onReady': onPlayerReady,
      //       'onStateChange': onPlayerStateChange
      //     }
      //   });
      // },
      // onPlayerReady(event) {
      //   event.target.playVideo();
      // },
      // onPlayerStateChange(event) {
      //   if (event.data == YT.PlayerState.PLAYING && !done) {
      //     setTimeout(stopVideo, 6000);
      //     this.done = true;
      //   }
      // },
      // stopVideo() {
      //   this.player.stopVideo();
      // },
      sendRequest () {
        axios.post(`playlists/${this.playlist.id}/videos`, {
          name: this.videoName,
          link: this.link
        })
        .then((response) => {
          console.log('PlaylistCreator -> post success');
          console.log(response.data);
          this.currentVideo = response.data;
          this.success = true;
          this.added = true;
          this.$emit('created', response.data);
        })
        .catch((error) => {
          console.log('PlaylistCreator -> sendRequest error');
          this.error = true;
        });
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
  flex-direction: row;
  align-items: center;
  justify-content: center;
  position: relative;
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

.save {
  margin: 0;
  position: absolute;
  top: 30px;
  right: 200px;
  padding: 10px 25px;
  font-size: 16px;
  /*align-self: flex-end;*/
}

.btn-main:hover {
  background: rgba(255,	215,175, 0.3);
  color: 	#ffd7af;
}

.boo, .yay {
  /*margin-top: -5px;*/
  margin-bottom: -5px;
}

.boo {
  color: red
}

.yay {
  color: green
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
}

</style>
