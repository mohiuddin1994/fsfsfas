<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="col-lg-6 m-auto">
                 <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title"> Color Add  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="colorAdd">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Color Name  </label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter Color name ">
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
    colorAdd(){
           this.form.post("/colorAdd").then((res)=>{

                 Toast.fire({
                        icon: 'success',
                        title: ' color  add success '
                    })

               this.$router.push("/colorList")


           })
        }
    },
     mounted(){
            let user = localStorage.getItem("adminUser");
            if(!user){
                 this.$router.push("/admin").catch(()=>{});
            }

        

         }
}
</script>
