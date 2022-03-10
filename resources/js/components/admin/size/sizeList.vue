<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card">
                    <div class="card-header">
                            <h1> size List  </h1>
                            <div class="text-right">
                                 <router-link to="/sizeAdd" class="btn btn-success">  Add  </router-link>
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
                            <tr v-for="size,index in sizes" :key="size.id">
                                <td> {{index + 1}} </td>
                                <td> {{size.name}} </td>
                                <td>
                                    <a  @click="sizeStatu(size.id)" class="btn btn-success" v-if="size.statu =='1'"> active </a>
                                    <a @click="sizeStatu(size.id)"  class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/sizeEdit/'+size.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger" @click.prevent="sizeDelete(size.id)"> Delete</a>
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
                 let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }
            this.$store.dispatch("getSize")
        },
        computed: {
            sizes() {
                return this.$store.getters.getSize
            }
        },
        methods: {
            // delete method
         sizeDelete($id){
                axios.get("/sizeDelete/"+$id).then((res)=>{
                        this.$store.dispatch("getSize")
                      Toast.fire({
                        icon: 'success',
                        title: ' size Delete Success '
                    })


                })
            },
            // statu change method
            sizeStatu($id){
                axios.get("/sizeStatu/"+$id).then((res)=>{
                     this.$store.dispatch("getSize")
                      Toast.fire({
                        icon: 'success',
                        title: ' size Statu Change '
                    })
                })
            }
        },

    }

</script>
