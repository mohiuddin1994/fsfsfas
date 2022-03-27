<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card">
                    <div class="card-header">
                            <h1> Brand List  </h1>
                            <div class="text-right">
                                 <router-link to="/brandAdd" class="btn btn-success">  Add  </router-link>
                            </div>

                    </div>

                <div class="card-body">
                 <form action="" class="col-lg-4">
                    <input type="text" name="brandSearch" class="form-control" placeholder="Search brand" @keyup="searchBrand" v-model="brand" id="">
                 </form>
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
                            <tr v-for="brand,index in brands" :key="brand.id">
                                <td> {{index + 1}} </td>
                                <td> {{brand.name}} </td>
                                <td>
                                    <a @click="brandStatu(brand.id)" class="btn btn-success" v-if="brand.statu =='1'"> active </a>
                                    <a @click="brandStatu(brand.id)"  class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/brandEdit/'+brand.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger" @click.prevent="brandDelete(brand.id)"> Delete</a>
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
                brand: '',
            }
        },
        mounted() {

             let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }

            this.$store.dispatch("getBrand")
        },
        computed: {
            brands() {
                return this.$store.getters.getBrand
            }
        },
        methods: {
            // delete method
         brandDelete($id){
                axios.get("/brandDelete/"+$id).then((res)=>{
                        this.$store.dispatch("getBrand")
                      Toast.fire({
                        icon: 'success',
                        title: ' Brand Delete Success '
                    })


                })
            },
            // statu change method
            brandStatu($id){
                axios.get("/brandStatu/"+$id).then((res)=>{
                     this.$store.dispatch("getBrand")
                      Toast.fire({
                        icon: 'success',
                        title: ' barnd Statu Change '
                    })
                })
            },
            searchBrand(){
                if(this.brand){
                   this.$store.dispatch("getSearchBrand",this.brand)
                }else{
                    this.$store.dispatch("getBrand")
                }


            }
        },

    }

</script>
