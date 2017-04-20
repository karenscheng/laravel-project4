<template>
  <div class="newplaylist">
    <div class="panel">
      <button class="btn-main" @click="returnHome">
        <span>Cancel</span>
      </button>
      <PlaylistForm @created="fetch"></PlaylistForm>
    </div>
  </div>
</template>

<script>

import PlaylistForm from './PlaylistForm'
import Loader from './Loader'

export default {
    data () {
      return {
        loading: false
      }
    },
    components: {
      PlaylistForm
    },
    methods: {
      returnHome () {
        this.$emit("goHome")
      },
      fetch () {
        console.log('NewPlaylist -> fetch');
        this.loading = true;
        axios.get('/playlists')
          .then((response) => {
            console.log('NewPlaylist -> fetch success');
            console.log(response.data);
            this.loading = false;
          })
          .catch((response) => {
            console.log('App -> fetch error');
            // show error
            this.loading = false;
          })
      },
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

.panel {
  background-color: rgba(0, 0, 0, .5);
  height: 80vh;
  width: 80vw;
  /*display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;*/
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
  background: rgba(0, 0, 0, 0.5);
}

</style>
