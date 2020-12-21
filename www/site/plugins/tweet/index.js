panel.plugin('bgp/tweet', {
  blocks: {
    tweet: {
      computed: {
        text () {
          if (this.content.text.length === 0) {
            return false
          }

          return this.content.text
        },
        date () {
          if (this.content.date.length === 0) {
            return false
          }

          return this.content.date
        },
        author () {
          if (this.content.author.length === 0) {
            return false
          }

          return this.content.author
        },
        authorId () {
          if (this.content.authorid.length === 0) {
            return false
          }

          return this.content.authorid
        },
        link () {
          if (this.content.link.length === 0) {
            return false
          }

          return this.content.link
        },
        context () {
          if (this.content.context.length === 0) {
            return false
          }

          return this.content.context
        }
      },
      template: `
            <div @click="open" class="tweet" >
                <div v-html="text" class="tweet__body"></div>
                <div class="tweet__meta"> — {{ author }} (@{{authorId}}) <a :href="link">{{ date }}</a></div>
                <small class="magazine__tweet-context" v-if="context"></small>
            </div> 
          `
    }
  }
})
