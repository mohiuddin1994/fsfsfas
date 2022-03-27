<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="col-lg-6 m-auto">
                 <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title"> Category Add  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="categoryUpdate">
                    <div class="card-body">
                        <div class="form-group">

                            <label for="exampleInputEmail1"> Category Name  </label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter category name ">
                        </div>
                         <div style="color:red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            </div>

            <!-- /.content -->
        </div>
    </div>
</template>
<script>
import Form from 'vform'
export default {
    data(){
        return{
            form:new Form({
                name:"",
            })
        }
    },
    methods:{
        categoryUpdate(){
           this.form.post("/categoryUpdate/"+this.$route.params.id).then((res)=>{

                 Toast.fire({
                        icon: 'success',
                        title: ' Category Update Success '
                    })

               this.$router.push("/categoryList")


           })
        },

    },
     mounted(){

          let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }

              this.form.get("/categoryEdit/"+this.$route.params.id).then((res)=>{

                this.form.fill(res.data.category);
            })

         },



}
</script>
