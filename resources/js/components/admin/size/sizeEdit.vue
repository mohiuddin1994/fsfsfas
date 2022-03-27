<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="col-lg-6 m-auto">
                 <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title"> Size Edit  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="sizeUpdate">
                    <div class="card-body">
                        <div class="form-group">

                            <label for="exampleInputEmail1"> Brand Name  </label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name ">
                        </div>


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
        sizeUpdate(){
           this.form.post("/sizeUpdate/"+this.$route.params.id).then((res)=>{

                 Toast.fire({
                        icon: 'success',
                        title: ' Size Update Success '
                    })

               this.$router.push("/sizeList")


           })
        },

    },
     mounted(){

          let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }


              this.form.get("/sizeEdit/"+this.$route.params.id).then((res)=>{
                this.form.fill(res.data.size);
            })

         },



}
</script>
