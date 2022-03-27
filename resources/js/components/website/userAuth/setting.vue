<template>
    <div>
        <section class="pages login-page section-padding">
            <div class="container">
                <div class="row">
                    <div>
                    </div>
                    <div class="col-lg-3">
                        <div class="main-input padding60">
                            <div class="log-title">

                                    <div class="form-group" style="position:relative;"  >
                                       <label for="file-input" style="position:absolute;top:0px;left:0" > Eidt </label>
                                        <input type="file"  style="position:absolute;top:0px;left:0;opacity:0"  name="image" :v-model="form.image" id="" @change="imageShow($event)">

                                    </div>
                                    <div>
                                         <img :src="userImge(form.image)" alt="" style="border-radius:50%" width="100px" height="100px">
                                    </div>

                                <h3><strong> Dashboard</strong></h3>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link to="/dashboard"> Profile </router-link>
                                            </th>
                                        </tr>
                                         <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link style="color:red" to="/userSetting"> Setting </router-link>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link to="/userOrder"> Order </router-link>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link to="/userOrderCencel"> Order cencel </router-link>
                                            </th>
                                        </tr>

                                    </thead>

                                </table>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="main-input padding60">
                            <div class="log-title">
                                <h3><strong> User Setting  </strong></h3>
                                <form class="col-lg-5" @submit.prevent="updatePassword">
                                    <div class="form-group">
                                        <label for=""> Old Password  </label>
                                        <input type="password" name="" v-model="form.oldPassword" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">  New Password </label>
                                        <input type="password" name="" v-model="form.newPassword" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password </label>
                                        <input type="password" name="" v-model="form.confirmPassword" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>

                                    <button type="submit" class="btn btn-success">Update </button>
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
import axios from 'axios'
    export default {
        data() {
            return {

                form:{
                    oldPassword : "",
                    newPassword : "",
                    confirmPassword : "",
                    image : "",
                },

            }
        },
        methods:{
            updatePassword(){
                axios.post("/updatePassword",this.form).then((res)=>{
                    if(res.data.password == true){
                        Toast.fire({
                            icon: 'success',
                            title: ' Password Update success '
                        })
                    }
                    else if( res.data.password == false){
                        Toast.fire({
                            icon: 'success',
                            title: ' Password Wrong '
                        })
                    }
                    else if(res.data.match == false){
                        Toast.fire({
                            icon: 'success',
                            title: ' Password Not Match'
                        })
                    }

                })

            },
            userImge($img){
                if($img.length>100){
                    return $img
                }else{
                    return "profile/"+$img;
                }

            },

            imageShow(event) {
              let file = event.target.files[0];
                 this.form.image = file
            let reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = (e)=> {
                 this.form.image = e.target.result
            };

              let data = new FormData()
              data.append("image",this.form.image)
              axios.post("/userImageUpload",data).then((res)=>{
                  console.log(res.data);
              })

            },
        },
        computed: {

        },
        mounted() {

            let user = sessionStorage.getItem("user")
            if (!user) {
                this.$router.push("/login")
            }


        },


    }

</script>
