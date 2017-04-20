<template>
  <div id="info">
    <div class="text">
      <h1>What is Crowdplay?</h1>
      <div class="panel">
        <p>It's lit 🔥</p>
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
  height: 40vh;
  width: 80vw;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
}

.panel p {
  font-size: 36px;
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
  background: rgba(0, 0, 0, 0.5);
}

</style>
