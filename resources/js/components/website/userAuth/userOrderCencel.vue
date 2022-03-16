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
                                        <th> # </th>
                                        <th> Apllied Date  </th>
                                        <th>  Statu  </th>
                                        <th> Statu Data  </th>
                                        <th> Sub Total </th>
                                        <th> Discount  </th>
                                        <th> Total  </th>
                                        <th> Action  </th>


                                    </thead>
                                    <tbody>
                                         <tr v-for="item ,index in userOrderCencels" :key="index">
                                            <td> {{index+1}} </td>
                                            <td> {{item.apllie_date}} </td>
                                            <td> {{item.statu}} </td>
                                            <td> {{item.statu_date}} </td>
                                            <td> {{item.order?item.order.subtotal:""}} </td>
                                            <td> {{item.order?item.order.discount:""}} </td>
                                            <td> {{item.order?item.order.total:""}} </td>
                                            <td> <button v-if="item.statu !='Cencel Order'" class="btn btn-success" @click="reorder(item.id)"> Reorder </button> </td>
                                         </tr>
                                    </tbody>

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
import axios from 'axios'
    export default {
        data() {
            return {

            }
        },
        methods:{
            reorder(item){
                axios.get("web/reorder/"+item).then((res)=>{

                    this.$store.dispatch("userOrderCencel")
                    Toast.fire({
                        icon:"success",
                        title:"re order succcess",
                    })
                })
            }

        },
        computed:{
            user(){
                return this.$store.getters.loginUser
            },
             userOrderCencels(){
                return this.$store.getters.userOrderCencel
            }
        },
        mounted(){
            this.$store.dispatch("userOrderCencel")
             let user = sessionStorage.getItem("user")
             if(!user){
                 this.$router.push("/login")
             }
        },


    }

</script>
