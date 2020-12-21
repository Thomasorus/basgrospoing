panel.plugin('bgp/imglarge', {
  blocks: {
    imglarge: {
      computed: {
        imagelarge () {
          if (this.content.imagelarge.length === 0) {
            return false
          }

          return this.content.imagelarge[0].url
        },
        figcaption () {
          if (this.content.figcaption.length === 0) {
            return false
          }

          return this.content.figcaption
        }
      },
      template: `
          <div @click="open">          
            <img loading="lazy" v-if="imagelarge" :src="imagelarge"></img>
            <div v-if="figcaption" >
              {{content.figcaption}}
              </small>
            </div>
          <div> 
        `
    }
  }
})
