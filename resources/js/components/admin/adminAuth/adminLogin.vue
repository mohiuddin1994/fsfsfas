<template>
    <div>
         <div>

            <div class="login-box m-auto mt-5">
                <div class="login-logo">
                    <a ><b>Admin</b>LTE</a>
                </div>
                <!-- /.login-logo -->
                <div class="card  ">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Sign in to start your session   </p>

                        <form @submit.prevent="adminLogin" method="post">
                            <div class="form-group">

                              <input type="email" name="email" id="" v-model="form.email" class="form-control" placeholder="Email" aria-describedby="helpId">
                                  <div style="color:red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" /><br>
                            </div>

                             <div class="form-group">

                              <input type="password" name="password" v-model="form.password" id="" class="form-control" placeholder=" Password " aria-describedby="helpId">
                                  <div style="color:red" v-if="form.errors.has('password')" v-html="form.errors.get('password')" /><br>
                            </div>
                            <input type="submit" class="btn btn-success" name="" value="Sing Up" id="">


                        </form>


                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
         </div>
    </div>
</template>
<script>
import Form from 'vform'
export default {
    data(){
        return{
            form:new Form({
                email:"",
                password:"",
            })
        }
    },
    methods:{
        adminLogin(){
            this.form.get("/adminLogin").then((res)=>{
                if(res.data.adminUser){
                    localStorage.setItem("adminUser",res.data.adminUser)
                    this.$router.push("/admin/dashboard")

                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })
                }else{
                    this.$router.push("/admin")
                    Toast.fire({
                        icon: 'success',
                        title: 'Faile to Login '
                    })
                }


            })
        }
    },
     mounted(){
                let admin = localStorage.getItem("adminUser")
                    if(admin && admin !== null){
                        this.$router.push("/admin/dashboard");
                    }

        }

}
</script>
