<template>
  <div id="app">
    <!-- This is the default component when you load up the app -->
    <Homepage></Homepage>
  </div>
</template>

<script>
import axios from 'axios';
import Homepage from './Homepage';

export default {
    data () {
      return {
        start: true
      }
    },
    mounted() {
        console.log('Component mounted.')
    },
    components: {
      Homepage
    }
}
</script>

<style scoped>

</style>
