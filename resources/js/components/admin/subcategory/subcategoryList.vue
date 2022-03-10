<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="card">
                    <div class="card-header">
                            <h1> Subcategory List  </h1>
                            <div class="text-right">
                                 <router-link to="/subcategoryAdd" class="btn btn-success">  Add  </router-link>
                            </div>

                    </div>

                <div class="card-body">
                     <div class="col-lg-4">
                <form action="">
                    <input type="text" placeholder="search subcategory" class="form-control" v-model="subcategory" @keyup="searchSubcategory" name="" id="">
                 </form>
                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> <input type="checkbox" :disabled="emptySelect()" @click="selectAllSubcategory" v-model="select"  > </th>

                                <th scope="col">Category </th>
                                <th scope="col">SubCategory</th>
                                <th scope="col">Count</th>
                                <th scope="col">Statu</th>
                                <th scope="col"> Action  <button class="btn btn-danger" @click="deleteAll" :disabled="emptyDeleteBtn()" > Delete All </button> </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="subcategory,index in subCategories" :key="subcategory.id">
                                <td> {{index + 1}} </td>
                                <td>  <input type="checkbox" v-model="selectSubcategory" :value="subcategory.id" name="subcategory"  id=""> </td>
                                <td> {{subcategory.category_id ? subcategory.category.name :''}}</td>
                                <td> {{subcategory.name ?subcategory.name :"" }} </td>
                                <td> {{subcategory.count}} </td>

                                <td>
                                    <a @click="activeUnactive(subcategory.id)" class="btn btn-success" v-if="subcategory.statu =='1'"> active </a>
                                    <a @click="activeUnactive(subcategory.id)"  class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/subcategoryEdit/'+subcategory.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger" @click.prevent="subcategoryDelete(subcategory.id)"> Delete</a>
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
                subcategory:"",
                selectSubcategory:[],
                select : false,

            }
        },
        mounted() {

                 let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }
            this.$store.dispatch("getSubCategory")
        },
        computed: {
            subCategories() {
                return this.$store.getters.getSubCategory
            }
        },
        watch:{
            selectSubcategory(){
                this.select = (this.subCategories.length == this.selectSubcategory.length)
            }
        },
        methods: {
            deleteAll(){
                axios.post("/selectedSubcategoryDelete",this.selectSubcategory).then((res)=>{
                     Toast.fire({
                        icon: 'success',
                        title: ' Subcategory delete Success '
                    })
                    this.$store.dispatch("getSubCategory")
                    this.select = false
                    this.selectSubcategory = []
                })
            },
            emptySelect(){
               return this.subCategories.length<1
            },
              emptyDeleteBtn(){
                  return this.selectSubcategory.length <1
            },
            // all select subcategory
            selectAllSubcategory(event){
                if(event.target.checked == false){
                    this.selectSubcategory = []
                }else{
                    this.subCategories.forEach((subcategory)=>{
                        this.selectSubcategory.push(subcategory.id)
                    })
                }
            },

            // subcateogry delete method
            subcategoryDelete($id){
                axios.get("/subcategoryDelete/"+$id).then((res)=>{
                        this.$store.dispatch("getSubCategory")
                      Toast.fire({
                        icon: 'success',
                        title: ' Category Update Success '
                    })

                    if(this.selectSubcategory.length<1){
                        this.selectSubcategory = []
                        this.select = false
                    }

                })
            },

            // active inactive methods

            activeUnactive($id){
                axios.get("/changeStatu/"+$id).then((res)=>{
                     this.$store.dispatch("getSubCategory")
                        Toast.fire({
                        icon: 'success',
                        title: ' statu change Success '
                    })
                })
            },
            searchSubcategory(){
                if(this.subcategory){
                  this.$store.dispatch("getSearchSubcategory",this.subcategory)
                }else{
                    this.$store.dispatch("getSubCategory")
                }


            }

        },

    }

</script>
