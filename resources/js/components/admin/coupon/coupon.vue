<template>
    <div>
        <div class="content-wrapper row">
            <!-- Content Header (Page header) -->

            <div class="col-lg-7">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title"> Coupon List </h3>
                    </div>
                    <!-- /.card-header -->
                          <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Exp Date </th>
                                <th scope="col">Discount </th>
                                <th scope="col"> Statu </th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                         <tr v-for="coupon,index in coupons" :key="index">
                                <td> {{index+1}} </td>
                                <td> {{coupon.name}} </td>
                                <td> {{coupon.expDate}} </td>
                                <td> {{coupon.discount }} %</td>
                                <td>
                                    <a @click="CouponStatu(coupon.id)" class="btn btn-success" v-if="coupon.statu =='1'"> active </a>
                                    <a @click="CouponStatu(coupon.id)" class="btn btn-danger" v-else> unactive</a>
                                </td>
                                <td>
                                    <router-link :to="'/couponEdit/'+coupon.id" class="btn btn-success"> Edit </router-link>
                                    <a class="btn btn-danger"> Delete</a>
                                </td>

                            </tr>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- form start -->

                </div>
            </div>

            <div class="col-lg-5">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Coupon Add </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" @submit.prevent="couponAdd">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Color Name </label>
                                <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1"
                                 placeholder="Enter Coupon name ">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1"> Expired Date </label>
                                <input type="date" v-model="form.expDate" class="form-control" id="exampleInputEmail1"
                                 placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount </label>
                                <input type="text" v-model="form.discount" class="form-control" id="exampleInputEmail1"
                                 placeholder=" Enter discount ">
                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.content -->
        </div>
    </div>
</template>
<script>
    import Form from 'vform'
import axios from 'axios'
    export default {
        data() {
            return {
                form: {
                    name: "",
                    expDate: "",
                    discount: "",
                }
            }
        },
        methods: {
            couponAdd() {

                    let data = new FormData
                    data.append("name",this.form.name)
                    data.append("expDate",this.form.expDate)
                    data.append("discount",this.form.discount)
                axios.post("/couponAdd",data).then((res) => {
                    this.$store.dispatch('getCoupon')
                    Toast.fire({
                        icon: 'success',
                        title: ' Coupon  add success '
                    })
                })
            },

            CouponStatu(id){
                axios.get("/couponStatu/"+id).then((res)=>{
                    this.$store.dispatch('getCoupon')
                   if(res.data.unActive){
                       Toast.fire({
                        icon: 'success',
                        title: ' Coupon  Unactive '
                    })
                   }else if(res.data.active){
                       Toast.fire({
                        icon: 'success',
                        title: ' Coupon  Active'
                    })
                   }
                })
            }
        },
        computed:{
            coupons(){
                return this.$store.getters.coupon
            }
        },
        mounted() {
            let user = localStorage.getItem("adminUser");
            if (!user) {
                this.$router.push("/admin").catch(() => {});
            }

            this.$store.dispatch('getCoupon')



        }
    }

</script>
