<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="col-lg-6 m-auto">
                 <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title"> Brand Add  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="brandAdd">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Brand Name  </label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter brand name ">
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
    brandAdd(){
           this.form.post("/brandAdd").then((res)=>{

                 Toast.fire({
                        icon: 'success',
                        title: ' brand  add success '
                    })

               this.$router.push("/brandList")


           })
        }
    },
     mounted(){
            let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }
     }
}
</script>
