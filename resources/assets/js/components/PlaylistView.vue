<template>
  <div class="playlistview">
    <!-- This component contains 1 video: edit button, video iframe, edit button, and video name -->
    <!-- It is added to the listview in playlistcreator -->
    <div class="videoBox">
      <div v-if="admin" class="delete-btn">
        <img src="/delete.png" @click="remove"></img>
      </div>
      <div class="vertical-flex">
        <div class="flexme">
          <img src="/edit.png" v-if="!editing" @click="edit"></img> <!-- axios put call made -->
          <div class="form-div">
            <form action="#" v-on:submit="doneEditing" v-if="editing">
              <input type="text" :placeholder="currentVideo.name" v-model="currentVideo.name">
            </form>
          </div>
          <h3 v-if="!editing">{{ this.currentVideo.name }}</h3>
        </div>
      </div>
      <iframe id="player" type="text/html" width="128" height="78"
  :src="this.modifiedLink" frameborder="0"></iframe>
    </div>
  </div>
</template>

<script>

// some videos for testing purposes

// gold http://www.youtube.com/embed/Q5_47eLxb8o?enablejsapi=1&origin=http://example.com
// gold https://www.youtube.com/watch?v=Q5_47eLxb8o
// wrong https://www.youtube.com/watch?v=EfYf6RIxZ3Y
// fred https://www.youtube.com/watch?v=ultX5ZR-sQE
// awk https://www.youtube.com/watch?v=ukNOaKeUEQY

export default {
    data () {
      return {
        modifiedLink: '',
        editing: false
      }
    },
    created () {
      console.log('PlaylistView -> this.currentVideo: ' + this.currentVideo);
      var videoId = this.parseLink(this.currentVideo.link); // parses the link so it returns only the videoId
      this.modifiedLink = 'https://www.youtube.com/embed/' + videoId + '?origin=http://example.com';
      console.log(this.modifiedLink);
    },
    props: [
      'currentVideo',
      'admin'
    ],
    methods: {
      parseLink (url) { // credit: http://stackoverflow.com/questions/3452546/javascript-regex-how-do-i-get-the-youtube-video-id-from-a-url
          var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
          var match = url.match(regExp);
          return (match&&match[7].length==11)? match[7] : false;
      },
      remove () { // parent will delete video
        this.$emit('remove', this.currentVideo);
      },
      edit () {
        this.editing = true;
      },
      doneEditing () { // parent will update video name
        this.editing = false;
        this.$emit('edit', this.currentVideo);
      }
    }
}

</script>

<style scoped>

.videoBox {
  display: flex;
  /*width: 80vw;*/
  justify-content: center;
  position: relative;
  margin-left: -250px;
}

.vertical-flex {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.flexme {
  display: flex;
  flex-direction: row;
  align-items: center;
  /*margin-top: 20px;*/
  justify-content: center;
  position: absolute;
  left: 600px;
}

img {
  height: 20px;
  width: 20px;
  margin-right: 10px;
  cursor: pointer;
}

.delete-btn {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-right: 20px;
}

h2 {
  font-family: "Lobster Two";
  color: #ffd7af;
  font-weight: 300;
  font-style: normal;
  font-size: 48px;
  cursor: default;
}

h3 {
  font-family: "Open Sans";
  color: white;
  align-self: baseline;
  margin-right: 20px;
  margin-top: 0;
  margin-bottom: 0;
}

form {
  margin-top: 15px;
}

form input {
  width: 250px;
  font-family: 'Open Sans';
  color: white;
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
