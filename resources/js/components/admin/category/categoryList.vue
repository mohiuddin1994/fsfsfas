<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card">
                    <div class="card-header">
                            <h1> Category List  </h1>
                            <div class="text-right">
                                 <router-link to="/categoryAdd" class="btn btn-success">  Add  </router-link>
                            </div>

                    </div>

                <div class="card-body">
                <div class="col-lg-4">
                <form action="">
                    <input type="text" placeholder="search category" class="form-control" v-model="category_name" @keyup.prevent="searchCategory" name="" id="">
                 </form>
                </div>

                    <span > <button :disabled="disableFunction()" class="btn btn-danger mt-2" @click.prevent="deleteAll"> delete </button> </span>
                    <table class="table">

                        <thead>
                            <tr>


                                <th scope="col">#

                                </th>
                                <th scope="col">  <span class="mr-3"> <input :disabled="disableFunctionOne()"  type="checkbox" v-model="selectAll" name="" @click="multiCategorySelect"   id=""> </span>  Name</th>

                                <th scope="col">Count</th>
                                <th scope="col">Statu</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            <tr v-for="category,index in categories" :key="category.id">
                                <td> {{index + 1}} </td>
                                <td> <span class="mr-3"> <input type="checkbox" :value="category.id" v-model="multiCategory" id="">  </span> {{category.name}}  </td>
                                <td> {{category.count}} </td>
                                <td>
                                    <a  @click="categoryStatu(category.id)" class="btn btn-success" v-if="category.statu =='1'"> active </a>
                                    <a @click="categoryStatu(category.id)"  class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/categoryEdit/'+category.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger" @click.prevent="categoryDelete(category.id)"> Delete</a>
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
                category_name:null,
                multiCategory :[],
                selectAll:false,

            }
        },


        mounted() {
                 let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }

            this.$store.dispatch("getCategory")
        },
        computed: {
            categories() {
                return this.$store.getters.getCategory
            }
        },
         watch:{
             multiCategory: function(selected){
                 this.selectAll = (selected.length === this.categories.length);
             }

         },
        methods: {

            disableFunction(){
                return this.multiCategory.length<1
            },
             disableFunctionOne(){
                return this.categories.length<1
            },

            multiCategorySelect(event){
                 if(event.target.checked == false){
                    this.multiCategory = [];
                 }else{

                     this.categories.forEach((category)=>{
                         this.multiCategory.push(category.id)
                     })
                 }

            },
            categoryDelete($id){
                axios.get("/categoryDelete/"+$id).then((res)=>{
                        this.$store.dispatch("getCategory")
                      Toast.fire({
                        icon: 'success',
                        title: ' Category Update Success '
                    })

                    if(this.multiCategory.length<1){
                         this.selectAll = false
                         this.multiCategory = [];
                     }



                })
            },
            categoryStatu($id){
                axios.get("/categoryStatu/"+$id).then((res)=>{
                     this.$store.dispatch("getCategory")
                      Toast.fire({
                        icon: 'success',
                        title: ' Category Statu Success '
                    })
                })
            },
            searchCategory(){

                    if(this.category_name){
                        this.$store.dispatch("searchCategory",this.category_name)
                    }else{
                         this.$store.dispatch("getCategory")
                    }
            },

            deleteAll(){
                axios.post("checkAllDelete",this.multiCategory).then((res)=>{
                     this.$store.dispatch("getCategory")
                     Toast.fire({
                        icon: 'success',
                        title: ' Category Delete Success '
                    })

                    this.selectAll = false
                    this.multiCategory = [];
                })
            },



        },

    }

</script>
