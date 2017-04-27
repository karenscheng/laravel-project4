<template>
  <div id="edit">
    <PlaylistCreator></PlaylistCreator>
  </div>
</template>

<script>
import axios from 'axios';
import PlaylistCreator from './PlaylistCreator';

export default {
    data () {
      return {
      }
    },
    mounted() {
        console.log('Component mounted.')
    },
    components: {
      PlaylistCreator
    }
}
</script>

<style scoped>

</style>
