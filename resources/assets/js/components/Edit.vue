<template>
  <div id="edit">
    <NewPlaylist></NewPlaylist>
  </div>
</template>

<script>
import axios from 'axios';
import NewPlaylist from './NewPlaylist';

export default {
    data () {
      return {
      }
    },
    mounted() {
        console.log('Component mounted.')
    },
    components: {
      NewPlaylist
    }
}
</script>

<style scoped>

</style>
