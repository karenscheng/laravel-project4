<template>
  <div class="add">
    <h1>Add Video To Playlist</h1>
    <div class="row">
      <form action="#" v-on:submit="add">
        <input type="text" placeholder="Custom video name">
        <input type="text" placeholder="Youtube video link">
      </form>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
    data () {
      return {

      }
    },
    components: {
      //optional
    },
    methods: {
      add () {
        console.log ('Add.vue -> video add');
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

h1 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 72px;
  cursor: default;
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

</style>
