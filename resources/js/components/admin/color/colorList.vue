<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card">
                    <div class="card-header">
                            <h1> Color List  </h1>
                            <div class="text-right">
                                 <router-link to="/colorAdd" class="btn btn-success">  Add  </router-link>
                            </div>

                    </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="color,index in colors" :key="color.id">
                                <td> {{index+1}} </td>
                                <td> {{color.name}} </td>
                                <td>
                                    <a  @click="colorStatu(color.id)" class="btn btn-success" v-if="color.statu =='1'"> active </a>
                                    <a @click="colorStatu(color.id)"  class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/colorEdit/'+color.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger" @click.prevent="colorDelete(color.id)"> Delete</a>
                                </td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        data() {
            return {

            }
        },
        mounted() {

            let user = localStorage.getItem("adminUser");
            if(!user){
                 this.$router.push("/admin").catch(()=>{});
            }

            this.$store.dispatch("getAdminUser");
            
            this.$store.dispatch("getColor")
        },
        computed: {
            colors() {
                return this.$store.getters.getColor
            }
        },
        methods: {
            // delete method
         colorDelete($id){
                axios.get("/colorDelete/"+$id).then((res)=>{
                        this.$store.dispatch("getColor")
                      Toast.fire({
                        icon: 'success',
                        title: ' Brand Delete Success '
                    })


                })
            },
            // statu change method
            colorStatu($id){
                axios.get("/colorStatu/"+$id).then((res)=>{
                     this.$store.dispatch("getColor")
                      Toast.fire({
                        icon: 'success',
                        title: ' barnd Statu Change '
                    })
                })
            }
        },

    }

</script>
