<template>
<div class="YoutubePlayer">
  <div :id="this.youtubeid"></div>
</div>
</template>

<script>
export default {
  name: 'YoutubePlayer',
  props: [
    'link'
  ],
  data () {
    return {
      youtubeid: null,
      el: null,
      loaded: false,
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.parseLink()
      this.render()
    })
  },
  methods: {
    parseLink () {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/
        var match = this.link.match(regExp)
        this.youtubeid = (match&&match[7].length==11)? match[7] : false
    },
    render () {
      console.log(`Youtube ${this.youtubeid} -> render.`)
      this.el = new window.YT.Player(this.youtubeid, {
        height: '100%',
        width: '100%',
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
      this.el.play()
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
    }
  }
}
</script>

<style scope>

</style>
