panel.plugin('bgp/bodytext', {
    blocks: {
        bodytext: {
        template: `
            <div @click="open"> 
                <div class="magazine-container">
                    <div class="magazine__text">{{ content.text }}</div>
                </div>
            </div>
            `
        }
    }    
})