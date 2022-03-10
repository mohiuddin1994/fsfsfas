<template>
    <div>
        <div class="content-wrapper row">
            <!-- Content Header (Page header) -->
             <div class="col-lg-6" >
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Order Log  </h3>
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
                            </tr>
                        </thead>
                            <tr>
                            <td> {{ orders.invoice_no }} </td>
                             <td> {{ orders.subtotal }}  </td>
                             <td> {{ orders.discount ? orders.discount :"" }}  </td>
                             <td> {{ orders.total }}  </td>
                             <td> {{ orders.paymentType }}  </td>
                             <td> {{ orders.orderDate }}  </td>
                            </tr>
                        <tbody>

                        </tbody>
                    </table>
                    <!-- form start -->

                </div>
            </div>


            <div class="col-lg-6" >
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Order Log  </h3>
                    </div>
                    <!-- /.card-header -->
                          <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order Date </th>
                                <th scope="col"> Statu Date </th>
                                <th scope="col"> Statu</th>


                            </tr>
                        </thead>
                            <tr>
                            <td> {{ orders.order_log != null?orders.order_log.order_date:"" }} </td>
                             <td> {{ orders.order_log != null?orders.order_log.statu_date:"" }}  </td>
                             <td> {{ orders.order_log != null?orders.order_log.statu:"" }}  </td>

                            </tr>
                        <tbody>

                        </tbody>
                    </table>
                    <!-- form start -->

                </div>
            </div>

            <div class=" col-lg-6" >
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Order Item  </h3>
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
                             <td>  <img width="100px" :src="'image/'+orderItem.product.image" alt=""> </td>
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

            <!-- /.content -->
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return{
             orders: {}
        }
    },
    methods:{

    },
    computed:{

    },
    mounted(){

       axios.get("/orderDetails/"+this.$route.params.id).then((res)=>{
           this.orders = res.data.order
       })

    },
}
</script>
