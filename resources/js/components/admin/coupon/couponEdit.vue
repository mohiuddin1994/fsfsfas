<template>
    <div>
        <div class="content-wrapper row">
            <!-- Content Header (Page header) -->

            <div class="col-lg-5">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title"> Color Add </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" @submit.prevent="couponUpdate">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Color Name </label>
                                <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1"
                                 placeholder="Enter Color name ">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1"> Expired Date </label>
                                <input type="date" v-model="form.expDate" class="form-control" id="exampleInputEmail1"
                                 placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount </label>
                                <input type="text" v-model="form.discount" class="form-control" id="exampleInputEmail1"
                                 placeholder=" ">
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
            couponUpdate() {

                    let data = new FormData
                    data.append("name",this.form.name)
                    data.append("expDate",this.form.expDate)
                    data.append("discount",this.form.discount)
                axios.post("/couponUpdate/"+this.$route.params.id, data).then((res) => {

                    Toast.fire({
                        icon: 'success',
                        title: ' Coupon Update success '
                    })

                    this.$router.push("/coupon")


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

            axios.get("/couponEdit/"+this.$route.params.id).then((res)=>{
                console.log(res.data.coupon)
                let data = res.data.coupon
                this.form.name = data.name;
                this.form.expDate = data.expDate;
                this.form.discount = data.discount;

            })



        }
    }

</script>

