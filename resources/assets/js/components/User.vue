<template>
  <div id="secondary">
    <Add></Add>
  </div>
</template>

<script>
import axios from 'axios';
import Add from './Add';

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
      Add
    }
}
</script>

<style scoped>

</style>
