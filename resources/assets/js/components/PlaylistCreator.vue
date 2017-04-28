<template>
  <div class="playlistcreator">
    <div class="theme-panel">
      <h2 v-if="!editing">Edit playlist "<span class="white">{{ this.playlist.name }}</span>"</h2>
      <div v-if="editing" class="edit-div">
        <h2>Edit playlist</h2>
        <form action="#" v-on:submit="doneEditing">
          <input type="text" class="playlist-name" :placeholder="playlist.name" v-model="playlist.name">
        </form>
      </div>
      <img src="/edit.png" v-if="!editing" id="edit-btn" @click="editPlaylist"></img>
      <button class="btn btn-main save" @click="play">Play</button>
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
      <div class="playlistview-placeholder">
        <div class="flex-me" v-if="videos.length == 0">
          <h3>Your playlist is currently empty.</h3>
        </div>
        <PlaylistView class="playlistview" v-for="video in videos" :currentVideo="video" @remove="remove" @edit="editVideo" :admin="admin"></PlaylistView>
      </div>
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
        currentVideo: null,
        editing: false,
        admin: true,
        videos: [],
        playlist: null
      }
    },
    mounted () {
      this.getPlaylist();
      this.fetch(this.playlistId);
    },
    props: [
      'playlistId',
    ],

    components: {
      PlaylistView
    },
    methods: {
      add () {
        console.log('PlaylistCreator -> add');
        this.sendRequest();
        this.videoName = '';
        this.link = ''
      },
      remove(video) {
        console.log('PlaylistCreator -> remove' + video);
        axios.delete(`videos/${video.id}`)
          .then((response) => {
            console.log('PlaylistCreator -> video delete success' + response.data);
            this.fetch(video.playlist_id);
          })
          .catch((error) => {
            console.log('PlaylistCreator -> delete video error');
          })
      },
      fetch (id) {
        // console.log('NewPlaylist->fetch: playlist_id ' + video.playlist_id);
        axios.get(`/playlists/${id}/videos`)
          .then((response) => {
            console.log('NewPlaylist -> fetch response.data: ' + response.data);
            this.videos = response.data;
            console.log(this.videos);
          })
          .catch((response) => {
            console.log('NewPlaylist -> fetch error');
          })
      },
      editVideo(video) {
        console.log('PlaylistCreator -> edit' + video);
        axios.put(`videos/${video.id}`, {
          link: video.link,
          name: video.name
        })
        .then((response) => {
          console.log('PlaylistCreator -> put success: ' + response.data);
        })
        .catch((error) => {
          console.log('PlaylistCreator -> edit video error');
        })
      },
      editPlaylist() {
        // this.$emit('edit', this.playlist);
        this.editing = true;
      },
      doneEditing(){
        this.editing = false;
        axios.put(`/playlists/${this.playlist.id}`, {
          name: this.playlist.name,
        })
        .then((response) => {
          console.log('NewPlaylist -> put success')
        })
        .catch((response) => {
          console.log('NewPlaylist -> put error')
        })
      },
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
          this.fetch(response.data.playlist_id);
        })
        .catch((error) => {
          console.log('PlaylistCreator -> sendRequest error');
          this.error = true;
        });
      },
      getPlaylist () {
        console.log('getPlaylist() - current playlist: ' + this.playlistId);
        axios.get(`playlists/${this.playlistId}`)
          .then((response) => {
            console.log('Add -> get playlist success: ' + response);
            this.playlist = response.data;
          })
          .catch((response) => {
            console.log('Add -> get playlist error: ' + response);
          })
      },
      play () {
        this.$emit('play', this.videos, this.playlistId);
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

#edit-btn {
  height: 35px;
  width: 35px;
  margin-left: 20px;
  cursor: pointer;
}

.edit-div {
  display: flex;
  flex-direction: row;
}

.edit-div form {
  align-self: center;
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

h2 span {
  color: white;
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

.playlist-name {
  width: 250px;
  font-size: 32px;
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
  padding-top: 10px;
  background-color: rgba(255, 255, 255, 0.1);
  overflow-y: scroll;
  position: relative;
}

.flex-me {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.playlistview {
  margin-bottom: 5px
}

</style>
