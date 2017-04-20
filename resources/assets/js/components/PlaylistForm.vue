<template>
  <div class="playlistform">
    <h1>Create a New Playlist</h1>
    <input type="text" v-model="name" />
    <button class="btn btn-primary" @click="create" :disabled="loading">Create Playlist</button>
  </div>
</template>

<script>

import axios from 'axios';
import Loader from './Loader';

export default {
    data () {
      return {
        name: '',
        loading: false
      }
    },
    components: {
      Loader
    },
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
          this.reset();
          this.$emit('created');
        })
        .catch((error) => {
          console.error('ContactForm -> sendRequest error');
          // show an error message
        });
      },

      reset () {
        this.namespace = '';
      }
    }
}

</script>

<style scoped>



</style>
