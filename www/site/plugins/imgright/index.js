panel.plugin('bgp/imgright', {
  blocks: {
    imgright: {
      computed: {
        imageright () {
          if (this.content.imageright.length === 0) {
            return false
          }

          return this.content.imageright[0].url
        },
        figcaption () {
          if (this.content.figcaption != null) {
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
          <div @click="open" class="imgright" >     
              <img class="imgright-img" loading="lazy" v-if="imageright" :src="imageright"></img>
              <div v-if="figcaption" class="imgright-figcaption" v-html="content.figcaption">
              </div>
          <div> 
            <div class="textleft" v-html="content.textcol">
            </div>
          </div>
        `
    }
  }
})
