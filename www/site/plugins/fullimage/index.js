panel.plugin('bgp/fullimage', {
  blocks: {
    fullimage: {
      computed: {
        fullimage () {
          if (this.content.fullimage.length === 0) {
            return false
          }

          return this.content.fullimage[0].url
        },
        citation () {
          if (this.content.citation.length === 0) {
            return false
          }

          return this.content.citation
        }
      },
      template: `
          <div @click="open">          
            <img loading="lazy" v-if="fullimage" :src="fullimage"></img>
            <div v-if="citation" >
              {{content.citation}}
              </small>
            </div>
          <div> 
        `
    }
  }
})
