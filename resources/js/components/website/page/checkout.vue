<template>
    <div>
        <!-- Checkout content section start -->
        <section class="pages checkout section-padding">
            <div class="container">
                <form method="post" @submit.prevent="orderComplet">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="main-input single-cart-form padding60">
                                <div class="log-title">
                                    <h3><strong>billing details</strong></h3>
                                </div>
                                <div class="custom-input">

                                    <input type="text" name="subject" v-model="form.name" placeholder="Your name" />
                                    <input type="text" name="subject" v-model="form.email"
                                        placeholder="Enter your email" />
                                    <input type="text" name="subject" v-model="form.phone" placeholder="Phone here" />
                                     <div class="custom-mess">
                                        <textarea rows="2" v-model="form.address" placeholder="Your address here"
                                            name="message">   </textarea>
                                    </div>

                                    <div class="custom-select">
                                        <select class="form-control" v-model="form.country">
                                            <option :value="county"> Country</option>
                                            <option > Bangladesh </option>
                                            <option > United States </option>
                                            <option > United Kingdom </option>

                                        </select>
                                    </div>
                                    <div class="custom-select">
                                        <select class="form-control" v-model="form.state">
                                            <option :value="state"> State</option>
                                            <option > Aberdeen </option>
                                            <option > Bedfordshire </option>
                                            <option > Caerphilly </option>
                                            <option > Denbighshire </option>

                                        </select>
                                    </div>
                                    <div class="custom-select">
                                        <select class="form-control" v-model="form.city">
                                            <option :value="city"> Town / City</option>
                                            <option > Denbighshire </option>
                                            <option > Bedfordshire </option>
                                            <option > Caerphilly </option>
                                            <option > Aberdeen </option>

                                        </select>
                                    </div>
                                    <div class="custom-mess">
                                        <textarea rows="2" v-model="form.message" placeholder="Your address here"
                                            name="message">   </textarea>
                                    </div>


                                </div>
                            </div>
                            <label for="" style="margin-right: 10px;">Deferent Address </label>
                            <input type="checkbox" @click="derferentAddressCheck" name="" id="" placeholder=""
                                aria-describedby="helpId">
                        </div>

                        <div class="col-sm-6" v-if="deferentAddreee">
                            <div class="main-input single-cart-form padding60">
                                <div class="log-title">
                                    <h3><strong>ship to different address</strong></h3>
                                </div>
                                <div class="custom-input">

                                        <input type="text" name="subject" placeholder="Your name" />
                                        <input type="text" name="subject" placeholder="Enter your email" />
                                        <input type="text" name="subject" placeholder="Phone here" />
                                        <div class="custom-select">
                                            <select class="form-control">
                                                <option> Country</option>
                                                <option> Bangladesh </option>
                                                <option> United States </option>
                                                <option> United Kingdom </option>
                                                <option> Canada </option>
                                                <option> Malaysia </option>
                                                <option> United Arab Emirates </option>
                                            </select>
                                        </div>
                                        <div class="custom-select">
                                            <select class="form-control">
                                                <option> State</option>
                                                <option> Aberdeen </option>
                                                <option> Bedfordshire </option>
                                                <option> Caerphilly </option>
                                                <option> Denbighshire </option>
                                                <option> East Ayrshire </option>
                                                <option> Falkirk </option>
                                            </select>
                                        </div>
                                        <div class="custom-select">
                                            <select class="form-control">
                                                <option> Town / City</option>
                                                <option> Aberdeen </option>
                                                <option> Bedfordshire </option>
                                                <option> Caerphilly </option>
                                                <option> Denbighshire </option>
                                                <option> East Ayrshire </option>
                                                <option> Falkirk </option>
                                            </select>
                                        </div>
                                        <div class="custom-mess">

                                            <textarea rows="2" placeholder="Your address here"
                                                name="message">  </textarea>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-sm-6">
                            <div class="single-cart-form padding60">
                                <div class="log-title">
                                    <h3><strong>payment details</strong></h3>
                                </div>
                                <div class="cart-form-text pay-details table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Cart Subtotal</th>
                                                <td>$ {{carts.price}}</td>
                                            </tr>
                                            <tr v-if="couponData != null">
                                                <th> Coupon ({{couponData != null? couponData.name: ""}}) </th>
                                                <td>$ {{couponData != null? couponData.discount: ""}} % </td>

                                            </tr>
                                            <tr v-if="couponData != null">
                                                <th> Discount </th>
                                                <td> $ {{carts.price * couponData.discount/100 }} </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr v-if="couponData != null">
                                                <th class="tfoot-padd">Order total</th>
                                                <td  class="tfoot-padd">
                                                    $ {{ carts.price - (carts.price * couponData.discount/100) }} </td>
                                            </tr>
                                            <tr v-else>
                                                <th class="tfoot-padd"> Order total</th>
                                                <td class="tfoot-padd"> $ {{ carts.price }} </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="padding60">
                                <div class="log-title">
                                    <h3><strong>Payment method</strong></h3>

                                </div>
                                <div class="categories">
                                    <ul id="accordion" class="panel-group clearfix">

                                        <li class="panel">
                                            <div data-toggle="collapse" data-parent="#accordion"
                                                data-target="#collapse3">
                                                <div class="medium-a">
                                                    paypal
                                                </div>
                                            </div>
                                            <div class="paypal-dsc panel-collapse collapse" id="collapse3">
                                        <div class="custom-select">
                                            <select class="form-control" v-model="paymentType">
                                                <option :value="paymentType"> Payment </option>
                                                <option> Cash On Delivery </option>
                                                <option> Paypal </option>

                                            </select>
                                        </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="submit-text">
                                        <button type="submit">place order</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout content section end -->
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                coupon: "",
                couponData: null,
                curency: $,
                deferentAddreee: false,
                form: {

                },
                paymentType:"",
                cart:{
                    subtotal:"",
                    discount:"",
                    total:"",
                }

            }
        },
        methods: {
            derferentAddressCheck() {
                this.deferentAddreee = !this.deferentAddreee
            },
            orderComplet(){
                this.cart.subtotal = this.carts.price
                    if(this.couponData != null){
                        this.cart.discount = this.couponData.discount * this.carts.price /100
                        this.cart.total = this.carts.price - this.cart.discount
                    }

                let data = {
                    user: this.form,
                    cart: this.cart,
                    paymentType: this.paymentType,
                }

                axios.post("web/orderComplet/",data).then((res)=>{
                     this.$store.dispatch("cart")
                    localStorage.removeItem("coupon")
                     if(res.data.order == true){
                          Toast.fire({
                            icon: 'success',
                            title: ' Order complet'
                        })
                     }
                })

            }


        },
        computed: {
            carts() {
                return this.$store.getters.cart
            },

            user() {
                return this.$store.getters.loginUser
            }

        },
        mounted() {
            this.$store.dispatch("cart")
            this.$store.dispatch("logInUser")
            let couponData = localStorage.getItem("coupon")
            this.couponData = JSON.parse(couponData);

            let user = sessionStorage.getItem("user");
            this.users = user
            if (!user) {
                this.$router.push("/login")
            }





        }
    }

</script>
