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
                                <h3><strong> Dashboard </strong></h3>
                                <table class="table ">
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
                                                <router-link style="color:red" to="/userOrder"> Order </router-link>
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
                                <h3><strong> Order </strong></h3>
                                       <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">invoice No</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col"> Discount  </th>
                                <th scope="col"> Total </th>
                                <th scope="col"> Payment Type </th>
                                <th scope="col"> Order Date </th>
                                <th scope="col"> Action </th>

                            </tr>
                        </thead>

                        <tbody>
                         <tr v-for="order,index in userOrders" :key="index">
                                <td> {{index+1}} </td>
                                <td> {{ order.invoice_no }} </td>
                                <td> {{ order.subtotal?order.subtotal:"" }}   </td>
                                <td> {{ order.discount?order.discount:"" }}   </td>
                                <td> {{ order.total?order.total:"" }}   </td>
                                <td> {{ order.paymentType }}   </td>
                                <td> {{ order.orderDate}}   </td>
                                <td >

                                <router-link :to='"/userOrderView/"+order.id' class="btn btn-success"> view </router-link>
                                    <button class="btn btn-success" @click="orderCencel()" > Cencel Order </button>

                                 </td>
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
    export default {
        data() {
            return {

            }
        },
        computed: {
            user() {
                return this.$store.getters.loginUser
            },
            userOrders(){
                return this.$store.getters.userOrder
            }
        },
        mounted() {
            this.$store.dispatch("userOrder")
            let user = sessionStorage.getItem("user")
            if (!user) {
                this.$router.push("/login")
            }
        },


    }

</script>
