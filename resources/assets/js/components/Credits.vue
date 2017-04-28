<template>
  <div class="credits">
    <div class="text">
      <h1>Credits</h1>
      <div class="panel">
        <p>Video background: <a href="http://coverr.co/" target="_newtab">covverr.co</a></p>
        <p>Basic JavaScript knowlege: <a href="http://javascript30.com" target="_newtab">javascript30.com</a></p>
        <p>Neat Buttons: <a href="https://tympanus.net/Development/CreativeButtons/ " target="_newtab">Creative Buttons</a></p>
        <p>Color scheme generator: <a href="http://www.color-hex.com/" target="_newtab">color-hex.com</a></p>
        <p>Form field: <a href="http://jsfiddle.net/BpUHG/1/" target="_newtab">This JS Fiddle</a></p>
        <p>Best professor: <a href="http://sethawright.com/" target="_newtab">Seth Wright</a></p>
      </div>
      <button class="btn-main" @click="returnHome">
        <span>Return Home</span>
      </button>
    </div>
  </div>
</template>

<script>

//imports here

export default {
    data () {
      return {

      }
    },
    methods: {
      returnHome () {
        this.$emit("goHome")
      }
    }
}

</script>

<style scoped>

.credits {
  width: 100vw;
  height: 100vh;
  cursor: default;
}

.text {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
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

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 15px 40px;
  display: inline-block;
  margin: 30px 15px;
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

.panel {
  margin-top: 15px;
  background-color: rgba(0, 0, 0, .5);
  height: 50vh;
  width: 80vw;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
  overflow-y: scroll;
}

p {
  font-family: 'Open Sans';
  color: white
}

</style>
