<template>
  <div id="info">
    <div class="text">
      <h1>What is Crowdplay?</h1>
      <div class="panel">
        <h3>Crowdplay is a tool that allows you to create a playlist of YouTube
          videos, while allowing others contribute to the playlist on their own
          devices. To get started, click "Create A New Playlist" on the homepage,
          give your playlist a name (it can be changed later), add a few videos to
          get started, and hit "play" to have your playlist autoplay.
        </h3>
        <h3>To have your friends contribute to the playlist, they can go to
          /edit/{your playlist id here}, and you can get the playlist id from the
          url bar by looking at the number here: /playlist/{id here}. Now no one
          has to fight for the aux cord, because everyone's the DJ!
        </h3>
      </div>
      <button class="btn-main" @click="returnHome">
        <span>Return Home</span>
      </button>
    </div>
  </div>
</template>

<script>

export default {
  methods: {
    returnHome () {
      this.$emit("goHome")
    }
  }
}

</script>

<style scoped>

#info {
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

.panel h3 {
  font-family: 'Open Sans';
  color: white;
  line-height: 150%;
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

</style>
