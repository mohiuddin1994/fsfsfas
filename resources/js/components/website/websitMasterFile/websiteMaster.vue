<template>

    <div id="app">

        <websiteHeader>  </websiteHeader>

       <router-view> </router-view>

        <websiteFooter/>

    </div>






</template>
<script>
import websiteHeader from "./websiteHeader.vue"

import websiteFooter from "./websiteFooter.vue"
export default {
    data(){
        return{

        }
    },
    components:{
        websiteHeader,

    websiteFooter
    }
}
</script>
