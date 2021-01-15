panel.plugin('bgp/localvideo', {
  blocks: {
    localvideo: {
      computed: {
        video () {
          if (this.content.video.length === 0) {
            return false
          }

          return this.content.video[0].url
        },
        figcaption () {
          if (this.content.figcaption != null) {
            return false
          }

          return this.content.figcaption
        }
      },
      template: `
          <div @click="open">          
            <video v-if="video" preload="metadata">
              <source :src="video" type="video/mp4">
            </video>
            <div v-if="figcaption" >
              <small v-html="content.figcaption">
              </small>
            </div>
          <div> 
        `
    }
  }
})
