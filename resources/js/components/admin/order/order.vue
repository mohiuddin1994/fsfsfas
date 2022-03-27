<template>
    <div>
        <div class="content-wrapper row">
            <!-- Content Header (Page header) -->

            <div class="">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Order List </h3>
                    </div>
                    <!-- /.card-header -->
                          <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">invoice No</th>
                                <th scope="col">Name </th>
                                <th scope="col">Address </th>
                                <th scope="col">Sub Total</th>
                                <th scope="col"> Discount  </th>
                                <th scope="col"> Total </th>
                                <th scope="col"> Payment Type </th>
                                <th scope="col"> Statu </th>
                                <th scope="col"> Order Date </th>
                                <th scope="col"> Action </th>

                            </tr>
                        </thead>

                        <tbody>
                         <tr v-for="order,index in orders" :key="index">
                                <td> {{index+1}} </td>
                                <td> {{ order.invoice_no }} </td>
                                <td> {{ order.user.name }} </td>
                                <td >   </td>
                                <td> {{ order.subtotal?order.subtotal:"" }}   </td>
                                <td> {{ order.discount?order.discount:"" }}   </td>
                                <td> {{ order.total?order.total:"" }}   </td>
                                <td> {{ order.paymentType }}   </td>
                                <td> {{ order.orderDate}}   </td>

                                <td>
                                    <select name="" id="" @change="orderStatu(order)" v-model="form.statu">
                                    <option :value="form.statu"> {{order.statu}} </option>
                                    <option>  Accept </option>
                                    <option> delivery </option>
                                    <option> Success </option>
                                    </select>
                                 </td>

                                <td > <router-link :to='"/orderView/"+order.id' class="btn btn-success"> view </router-link> </td>
                            </tr>




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
            form:{

            },
        }
    },
    methods:{
        orderStatu(order){
            let data= {
                order: order,
                statu: this.form,
            }
            axios.post("/orderStatu",data).then((res)=>{
                this.$store.dispatch("order")
                if(res.data.orderLog){
                    Toast.fire({
                            icon: 'success',
                            title: "Order " + res.data.orderLog
                        })
                }
            })
        }
    },
    computed:{
        orders(){
            return this.$store.getters.order
        }
    },
    mounted(){
         this.$store.dispatch("order")
    },
}
</script>
