<template>
    <div>
        <section class="pages login-page section-padding" >
            <div class="container">
                <div class="row">
                <div>
                </div>
                    <div class="col-lg-3">
                        <div class="main-input padding60">
                            <div class="log-title">
                                <h3><strong> Dashboard </strong></h3>
                                <table class="table " >
                                    <thead>

                                        <tr>
                                            <th style="cursor:pointer" scope="col">
                                                <router-link to="/dashboard"> Profile </router-link>
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
                                                <router-link style="color:red" to="/userOrderCencel"> Order cencel </router-link>
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
                                <h3><strong> Order cencel </strong></h3>
                                <table class="table " >
                                    <thead>
                                        <form action="">
                                            <div class="form-group">
                                              <label for=""> Name </label>
                                              <input type="text" name="" id="" :value="user.name" class="form-control" placeholder="" aria-describedby="helpId">

                                            </div>
                                        </form>
                                    </thead>

                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        computed:{
            user(){
                return this.$store.getters.loginUser
            }
        },
        mounted(){

             let user = sessionStorage.getItem("user")
             if(!user){
                 this.$router.push("/login")
             }
        },


    }

</script>
