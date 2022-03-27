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
                                <th scope="col"> User Name </th>
                                <th scope="col"> Invoice No </th>
                                <th scope="col"> Apllied Date </th>
                                <th scope="col"> Statu </th>
                                <th scope="col"> Statu Date</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="item,index in orderCencels" :key="index">
                                <td> {{index+1}} </td>
                                <td> {{item.user.name}} </td>
                                <td> {{item.order?item.order.invoice_no:""}} </td>
                                <td> {{item.apllie_date}} </td>
                                <td>
                                    <select name="statu" id="" v-model="form.statu" @change="orderStatu(item)">
                                    <option :value="form.statu"> {{item.statu}} </option>
                                    <option >  Accept </option>
                                    <option > Cencel Order </option>
                                    </select>
                                 </td>
                                <td> {{item.statu_date ? item.statu_date :""}} </td>

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
        orderStatu(item){

            let data= {
                orderCencel: item,
                statu: this.form,
            }
            axios.post("/orderCencelStatu",data).then((res)=>{
                this.$store.dispatch("orderCencel")
                if(res.data.orderCencel){
                    Toast.fire({
                            icon: 'success',
                            title: "Order Cencel" + res.data.orderLog
                        })
                }
            })
        }
    },
    computed:{
        orderCencels(){
            return this.$store.getters.orderCencel
        }
    },
    mounted(){
         this.$store.dispatch("orderCencel")
    },
}
</script>

