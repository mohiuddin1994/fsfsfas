<template>
    <div>
        <section class="pages login-page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="main-input padding60 new-customer">
                            <div class="log-title">
                                <h3><strong>  {{$route.name}}  </strong></h3>

                            </div>
                            <div class="custom-input">
                                <form method="post" @submit.prevent="userRegister" role="form">
                                    <input type="text" name="name" v-model="form.name" placeholder="Name here..">
                                     <div style="color:red" v-if="errors['name']"> {{errors['name'][0]}}  </div>
                                    <input type="email" name="email" v-model="form.email" placeholder="Email Address..">
                                    <div style="color:red" v-if="errors['email']"> {{errors['email'][0]}}  </div>
                                    <input type="password" name="password" v-model="form.password" placeholder="Password">
                                    <div style="color:red" v-if="errors['password']"> {{errors['password'][0]}}  </div>

                                    <input type="password" name="confirm_password" v-model="form.confirm_password" placeholder="Confirm Password">
                                        <div style="color:red" v-if="errors['confirm_password']"> {{errors['confirm_password'][0]}}  </div>
                                          <div style="color:red"> {{ passwordError?passwordError:"" }}  </div>

                                    <div class="submit-text coupon">
                                        <button type="submit">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Form from 'vform'
import axios from 'axios'
    export default {
        data(){
            return{
                form: {
                    name:"",
                    email:"",
                    password:"",
                    confirm_password:"",
                },
                errors : [],
                passwordError:""

            }
        },


          mounted(){

              let user  = sessionStorage.getItem("user");
            if(user){
                this.$router.push("/dashboard");
            }
        },
        methods:{
            userRegister(){
                let data = new FormData()
                data.append('name',this.form.name)
                data.append('email',this.form.email)
                data.append('password',this.form.password)
                data.append('confirm_password',this.form.confirm_password)

                axios.post("/userRegister/",data).then((res)=>{
                    this.$router.push("/login");

                }).catch((error)=>{

                    if(error.response.data.password){
                        this.errors = [],
                        this.passwordError = error.response.data.password
                    }else{
                        this.errors = error.response.data.errors
                        this.passwordError=""
                    }


                    })


            }
        }

    }
</script>
