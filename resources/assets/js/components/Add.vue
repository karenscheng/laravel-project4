<template>
  <!-- Add.vue is the only unique component to a user adding to a playlist  -->
  <div class="add">
    <div class="theme-panel">
      <h1>Contribute To Playlist</h1>
      <a href="/" class="btn btn-main home">Home</a>
    </div>
    <div class="overlay-panel"> <!-- everything with the black background-->
      <div class="container">
        <div class="row">
          <div class="col-md-6 tall"> <!-- left form -->
            <h3>Add video to playlist</h3>
            <form action="#" v-on:submit="add">
              <input type="text" placeholder="Custom video name" v-model="videoName">
              <input type="text" placeholder="Youtube video link" v-model="link">
            </form>
            <button class="btn btn-main" @click="add">Add Video</button>
            <!-- feedback for what's going on because sometimes there's a lag -->
            <p class="boo" v-if="error">Error: Video could not be added</p>
            <p class="yay" v-if="success">Video Added!</p>
          </div>
          <div class="col-md-6 tall"> <!-- right list of videos -->
            <div class="light-background">
              <div id="scroller" class="playlistview-placeholder">
                <div class="flex-me" v-if="videos.length == 0">
                  <h3>Your playlist is currently empty.</h3> <!-- will appear if there are no videos -->
                </div>
                <!-- shows videos in playlist -->
                <PlaylistView class="playlistview" v-for="video in videos" :currentVideo="video" @remove="remove" @edit="editVideo" :admin="admin"></PlaylistView>
              </div>
            </div>
          </div>
        </div>
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
        playlistId: window.playlist_id, // passed from add.blade file
        videos: [], // populated in getVideos
        playlist: null, // populated in getPlaylist
        videoName: '',  // v-model in form field
        link: '', // v-model in form field
        currentVideo: null,
        admin: false  // passed to playlistView so that delete button is not shown
      }
    },
    created () {  // make axios calls to populate data
      console.log('current playlist: ' + this.playlistId);
      this.getPlaylist();
      this.getVideos();
    },
    components: {
      PlaylistView
    },
    methods: {
      add () {
        console.log ('Add.vue -> video add');
        this.sendRequest();
        this.videoName = '';
        this.link = ''
      },
      sendRequest () {  // called when user adds video
        axios.post(`/edit/playlists/${this.playlistId}/videos`, {
          name: this.videoName,
          link: this.link
        })
        .then((response) => {
          console.log('Add -> post success');
          console.log(response.data);
          this.currentVideo = response.data;
          this.success = true;
          this.getVideos();  // refreshes listview
        })
        .catch((error) => {
          console.log('Add -> sendRequest error');
          this.error = true;
        });
      },
      getPlaylist () {
        console.log('getPlaylist() - current playlist: ' + this.playlistId);
        axios.get(`/edit/playlists/${this.playlistId}`)
          .then((response) => {
            console.log('Add -> get playlist success: ' + response);
            this.playlist = response.data;  // populates current playlist
          })
          .catch((response) => {
            console.log('Add -> get playlist error: ' + response);
          })
      },
      getVideos () {
        console.log('getVideos() - current playlist: ' + this.playlistId);
        axios.get(`/edit/playlists/${this.playlistId}/videos`)
          .then((response) => {
            console.log('Add -> get videos success: ' + response);
            this.videos = response.data;  // will then refresh listview since it's bound to videos
          })
          .catch((response) => {
            console.log('Add -> get videos error: ' + response);
          })
      },
      remove (video) {
        console.log('Add -> remove' + video);
        axios.delete(`/edit/videos/${video.id}`)
          .then((response) => {
            console.log('Add -> video delete success' + response.data);
            this.getVideos(); // refresh listview
          })
          .catch((error) => {
            console.log('Add -> delete video error');
          })
      },
      editVideo (video) {
        console.log('Add -> edit' + video);
        axios.put(`videos/${video.id}`, {
          link: video.link,
          name: video.name
        })
        .then((response) => {
          console.log('PlaylistCreator -> put success: ' + response.data);
          this.getVideos(); // refresh listview
        })
        .catch((error) => {
          console.log('PlaylistCreator -> edit video error');
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

.container, .row {
  height: 100%;
  width: 100%;
}

.tall {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.light-background {
  margin-top: 10px;
  height: 80%;
  width: 100%;
  padding-top: 10px;
  background-color: rgba(255, 255, 255, 0.1);
  position: relative;
}

.playlistview-placeholder {
  height: 95%;
  width: 100%;
  overflow-y: scroll;
  position: relative;
}

.center-me {
  display: flex;
  align-items: center;
  justify-content: center;
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
