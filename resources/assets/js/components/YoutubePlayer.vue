<template>
<div class="YoutubePlayer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 left nopadding center">
        <h3>Previous Video: </h3>
        <button v-if="this.hasPrev" class="btn btn-main" @click="playPrev">
          <h4>Play '{{ this.prevMod }}'</h4>
        </button>
      </div>
      <div class="col-md-6 middle nopadding center">
        <h3>Currently playing: "{{ this.name }}"</h3>
        <div class="video-player" :id="this.youtubeid"></div>
      </div>
      <div class="col-md-3 right nopadding center">
        <h3>Next Video: </h3>
        <button v-if="this.hasNext" class="btn btn-main" @click="playNext">
          <h4>Play '{{ this.nextMod }}'</h4>
        </button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'YoutubePlayer',
  props: [
    'link',
    'index',
    'name',
    'prev',
    'next',
    'prevInd',
    'nextInd',
    'lastInd'
  ],
  data () {
    return {
      youtubeid: null,
      el: null,
      loaded: false,
      prevMod: '',
      nextMod: '',
      hasPrev: false,
      hasNext: false
    }
  },
  mounted () {
    console.log('YoutubePlayer -> link: ' + this.link);
    this.$nextTick(() => {
      this.parseLink()
      setTimeout(() => {
        this.render()
      }, 500)
    });

    if (this.prevInd < 0) {
      this.prevMod = '';
      this.hasPrev = false
    } else {
      this.prevMod = this.prev;
      this.hasPrev = true
    }

    if (this.nextInd >= this.lastInd) {
      this.nextMod = '';
      this.hasNext = false
    } else {
      this.nextMod = this.next;
      this.hasNext = true
    }
  },
  methods: {
    parseLink () {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/
        var match = this.link.match(regExp)
        this.youtubeid = (match&&match[7].length==11)? match[7] : false
    },
    render () {
      console.log(`Youtube ${this.youtubeid} -> render.`)
      console.log(window.YT);
      this.el = new window.YT.Player(this.youtubeid, {
        height: '312px',
        width: '512px',
        videoId: this.youtubeid,
        playerVars: {
          autoplay: 1,
          controls: 1,
          showinfo: 0,
          vq: 'hd1080',
          rel: 0,
          autohide: 1,
          search: 0,
          fs: 0,
          html5: 1
        },
        events: {
          onReady: this.loadInit,
          onStateChange: this.stateChanged,
          onError: this.loadError
        }
      })
    },
    loadInit () {
      if (this.loaded) return
      console.log(`Youtube ${this.youtubeid} -> Ready.`)
      this.loaded = true
    },
    stateChanged (e) {
      console.log(`Youtube -> ${this.youtubeid} State changed ${e.data}.`)
      switch (e.data) {
        case 0:
          this.$emit('done')
          break
        case 1:
          this.$emit('play')
          break
        case 2:
          this.$emit('pause')
          break
        case 3:
          break
        default:
          break
      }
    },
    loadError () {
      console.log(`Youtube ${this.youtubeid} -> Load error.`)
      this.$emit('error')
    },
    playNext () {
      this.$emit('playNext')
    },
    playPrev () {
      this.$emit('playPrev')
    }
  }
}
</script>

<style scoped>

.container {
  background-color: rgba(0, 0, 0, 0.7);
  height: 70vh;
  width: 90vw;
}

.row {
  height: 100%
}

h3 {
  font-family: "Open Sans";
  color: white;
  text-align: center;
  margin-bottom: 30px;
}

h4 {
  font-family: 'Open Sans';
  font-weight: 200;
  text-align: center;
  color: #ffd7af;
}

.btn-main {
  border-radius: 50px;
  border: 3px solid #ffd7af;
  color: 	#ffd7af;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
  padding: 10px 15px;
  display: inline-block;
  margin: 10px 5px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 500;
  outline: none;
  position: relative;
  transition: all 0.3s;
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
}

.YoutubePlayer {
  margin-top: 50px;
  /*height: 312px;
  width: 512px;*/
  /*background-color: rgba(0, 0, 0, 0.7);*/
}

.nopadding {
  padding: 0;
  margin: 0
}

.center {
  height: 100%;
  /*width: 100%;*/
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
</style>
