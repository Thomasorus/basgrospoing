panel.plugin('bgp/imgleft', {
  blocks: {
    imgleft: {
      computed: {
        imageleft () {
          if (this.content.imageleft.length === 0) {
            return false
          }

          return this.content.imageleft[0].url
        },
        figcaption () {
          if (this.content.figcaption.length === 0) {
            return false
          }
          return this.content.figcaption
        },
        textcol () {
          if (this.content.textcol.length === 0) {
            return false
          }
          return this.content.textcol
        }
      },
      template: `
          <div @click="open" class="imgleft" >     
              <img class="imgleft-img" loading="lazy" v-if="imageleft" :src="imageleft"></img>
              <div v-if="figcaption" class="imgleft-figcaption" v-html="content.figcaption">
              </div>
          <div> 
            <div class="textleft" v-html="content.textcol">
            </div>
          </div>
        `
    }
  }
})
