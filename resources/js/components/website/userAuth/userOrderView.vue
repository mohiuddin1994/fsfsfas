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

                    <div class="col-lg-9" style="margin-bottom: 50px;">
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title">Order  </h3>
                            </div>
                            <!-- /.card-header -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"> Invoce No </th>
                                        <th scope="col">Sub Total </th>
                                        <th scope="col"> Discount </th>
                                        <th scope="col"> total </th>
                                        <th scope="col"> Payment Type </th>
                                        <th scope="col"> Order Date </th>
                                        <th scope="col"> Statu </th>
                                        <th scope="col"> statu Date </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td> {{ orders.invoice_no }} </td>
                                    <td> {{ orders.subtotal }} </td>
                                    <td> {{ orders.discount ? orders.discount :"" }} </td>
                                    <td> {{ orders.total }} </td>
                                    <td> {{ orders.paymentType }} </td>
                                    <td> {{ orders.orderDate }} </td>
                                    <td> {{ orders.statu }} </td>
                                    <td> {{ orders.order_log != null?orders.order_log.statu_date:"" }}  </td>
                                </tr>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- form start -->

                        </div>
                    </div>

                    <div class=" col-lg-6">
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title">Order Item </h3>
                            </div>
                            <!-- /.card-header -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image </th>
                                        <th scope="col">Product Name </th>
                                        <th scope="col"> Quanty </th>
                                        <th scope="col"> Price </th>

                                    </tr>
                                </thead>
                                <tr v-for="orderItem,index in orders.order_item" :key="index">
                                    <td> {{index+1}} </td>
                                    <td> <img width="100px" :src="'image/'+orderItem.product.image" alt=""> </td>
                                    <td> {{orderItem.product.name}} </td>
                                    <td> {{orderItem.quanty}} </td>
                                    <td> {{orderItem.price}} </td>
                                </tr>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- form start -->

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
                orders: {}
            }
        },
        methods: {

        },
        computed: {

        },
        mounted() {

            axios.get("/web/userOrderDetails/" + this.$route.params.id).then((res) => {
                this.orders = res.data.order
            })

        },
    }

</script>
