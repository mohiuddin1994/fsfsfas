<template>
   <div>

            <template v-if="$route.name !== 'adminLogin' && $route.name  !== 'adminRegister'">


                    <adminHeader> </adminHeader>
                    <adminSidebar> </adminSidebar>
            </template>

           <router-view>   </router-view>

      <template v-if="$route.name !== 'adminLogin' && $route.name  !== 'adminRegister'">
                    <adminFooter> </adminFooter>

         </template>




   </div>
</template>

<script>
  import adminHeader from "./adminHeader.vue"
  import adminFooter from "./adminFooter.vue"
  import adminSidebar from './adminSidebar.vue'
import axios from 'axios'
    export default {
        data(){
            return{

            }
        },
        components:{
            adminHeader,
            adminSidebar,
            adminFooter

        },
        mounted(){
                let admin = localStorage.getItem("adminUser")
                    if(!admin && admin == null){
                        this.$router.push("/admin");
                    }
 
        }

    }
</script>
