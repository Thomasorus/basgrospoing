panel.plugin('bgp/patreon', {
  blocks: {
    patreon: {
      template: `
            <div class="patreon">
            <h3>Avant de finir...</h3>
            <div @click="open" v-html="content.text"> 
               
            </div>
            `
    }
  }
})
