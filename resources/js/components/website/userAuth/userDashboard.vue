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

                                <h3><strong> Dashboard </strong></h3>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link style="color:red" to="/dashboard"> Profile </router-link>
                                            </th>
                                        </tr>
                                         <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link to="/userSetting"> Setting </router-link>
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
                                <h3><strong> Dashboard </strong></h3>
                                <form class="col-lg-5" @submit.prevent="updateProfile">
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input type="text" name="" v-model="form.name" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Email </label>
                                        <input type="email" name="" v-model="form.email" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="" v-model="form.phone" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="" class="form-control" v-model="form.address" id="" cols="10" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        <input type="text" name="" v-model="form.country" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" name="" v-model="form.state" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" name="" v-model="form.city" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Zeep Code</label>
                                        <input type="text" name="" v-model="form.zeep_code" id="" class="form-control"
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
                    name : "",
                    email : "",
                    phone : "",
                    address : "",
                    country : "",
                    state : "",
                    city : "",
                    zeep_code : "",
                    image : "",
                },

            }
        },
        methods:{
            updateProfile(){
                axios.post("/updateProfile",this.form).then((res)=>{
                    Toast.fire({
                            icon: 'success',
                            title: ' Profile Update success '
                        })
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
             axios.get("/getLogInUser").then((res)=>{
                 this.form = res.data.user

             })


        },


    }

</script>
