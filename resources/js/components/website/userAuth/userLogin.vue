<template>
    <div>
        <section class="pages login-page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="main-input padding60">
                            <div class="log-title">
                                   <h3><strong>  {{$route.name}}  </strong></h3>
                            </div>
                            <div class="login-text">
                                <div class="custom-input">
                                    <p>If you have an account with us, Please log in!</p>
                                    <form  method="post" @submit.prevent="userLogin" >
                                        <input type="text" v-model="form.email" name="email" placeholder="Email">
                                    <div style="color:red"> {{errors['email']?errors['email'][0]:''}} </div>
                                        <input type="password" v-model="form.password" name="password" placeholder="Password">
                                               <div style="color:red"> {{errors['password']?errors['password'][0]:''}} </div> <br>
                                        <a class="forget" href="#">Forget your password?</a>
                                        <div class="submit-text">
                                            <button type="submit">login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Form from "vform"
import axios from 'axios'
    export default {
        data(){
            return{
                form:{
                    email:"",
                    password:"",

                },
                errors :[],
            }
        },
        mounted(){
              let user  = sessionStorage.getItem("user");
            if(user){
                this.$router.push("/dashboard");
            }
        },
        methods:{
            userLogin(){
                let data = new FormData();
                data.append("email",this.form.email)
                data.append("password",this.form.password)

                axios.post("/userLogin",data).then((res)=>{

                    if(res.data.user !=false){
                        //  localStorage.setItem("user",res.data.user.email);
                            sessionStorage.setItem("user",res.data.user.email)
                            this.$store.dispatch("logInUser")
                         this.$router.push("/dashboard");
                        Toast.fire({
                            icon: 'success',
                            title: ' User login success '
                        })
                    }else{
                        this.$router.push("/login")
                         Toast.fire({
                            icon: 'success',
                            title: ' login fail '
                        })
                    }



                }).catch((error)=>{

                     this.errors = error.response.data.errors
                })
            }
        }

    }
</script>
