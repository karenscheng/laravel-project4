<template>
  <div class="playlistform">
    <h1>Create a New Playlist</h1>
    <form action="#" v-on:submit="create">
      <input type="text" placeholder="Playlist Name" v-model="name" />
    </form>
    <p class="boo" v-if="error">Error: Playlist could not be created</p>
    <p class="yay" v-if="success">Playlist created!</p>
    <button class="btn btn-main" @click="create" :disabled="loading">Create Playlist</button>
  </div>
</template>

<script>

import axios from 'axios';
// import Loader from './Loader';

export default {
    data () {
      return {
        name: '',
        loading: false,
        error: false,
        success: false
      }
    },
    // components: {
    //   Loader
    // },
    methods: {
      create () {
        console.log('PlaylistForm -> create');
        if (this.loading) {
          alert('request is already being made');
          return false;
        }
        this.loading = true;
        this.sendRequest();
      },

      sendRequest () {
        axios.post('/playlists', {
          name: this.name,
        })
        .then((response) => {
          console.log('PlaylistForm -> sendRequest success');
          console.log(response.data);
          this.loading = false;
          this.success = true;
          this.reset();
          this.$emit('created', this.name);
          this.name = '';
        })
        .catch((error) => {
          console.error('ContactForm -> sendRequest error');
          this.loading = false;
          this.error = true;
        });
      },

      reset () {
        this.namespace = '';
      }
    }
}

</script>

<style scoped>

.boo, .yay {
  margin-top: -12px;
  margin-bottom: -10px;
}

.boo {
  color: red
}

.yay {
  color: green
}

h1 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 72px;
  cursor: default;
}

.playlistform {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

input {
  margin-top: 60px;
  margin-bottom: 60px;
  width: 40vw;
  background-color: transparent;
  color: #eeeeee;
  outline: none;
  outline-style: none;
  outline-offset: 0;
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: solid #eeeeee 1px;
  padding: 3px 10px;
  font-size: 24px;
}

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 25px 80px;
  display: inline-block;
  margin: 45px 30px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 18px;
}

.btn-main:hover {
  background: rgba(255,	215,175, 0.1);
}

</style>
