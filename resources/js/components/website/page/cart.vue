<template>
    <div>

        <div class="pages-title section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="pages-title-text text-center">
                            <h2>Cart</h2>
                            <ul class="text-left">
                                <li><a href="index.html">Home </a></li>
                                <li><span> // </span>Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="pages cart-page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive padding60">
                            <table class="wishlist-table text-center">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="cart,index in carts.cart" :key="index" >
                                        <td class="td-img text-left">
                                            <a href="#"><img :src="'image/'+cart.product.image" alt="Add Product"></a>
                                            <div class="items-dsc">
                                                <h5><a href="#" > {{cart.product.name}} </a></h5>
                                                <div v-if="cart.attribute">
                                                <p class="itemcolor">Color : <span>{{cart.attribute.color.name}}</span></p>
                                                <p class="itemcolor">Size : <span>{{cart.attribute.size.name}} </span></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{cart.price}} </td>
                                        <td>
                                            <form action="#" method="POST">
                                                <div class="plus-minus">
                                                    <a @click="qunatyDec(cart.id)" class="dec qtybutton">-</a>
                                                        <a> {{cart.quanty}} </a>
                                                    <a   @click="qunatyInc(cart.id)" class="inc qtybutton">+</a>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <strong>  {{cart.price * cart.quanty}} </strong>
                                        </td>
                                        <td @click.prevent="cartRemove(cart.id)"> <i  class="mdi mdi-close" title="Remove this product"></i> </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row margin-top" >
                    <div class="col-sm-6" v-if="couponData == null " >

                        <div class="single-cart-form padding60">
                            <div class="log-title">
                                <h3><strong>coupon discount</strong></h3>
                            </div>
                            <div class="cart-form-text custom-input">
                                <p>Enter your coupon code if you have one!</p>
                                <form  method="post" @submit.prevent="couponApply" >
                                    <input type="text" v-model="coupon" name="subject" placeholder="Enter your code here...">
                                    <div class="submit-text coupon">
                                        <button type="submit">apply coupon </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" >
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
                                            <th> Coupon ({{couponData != null? couponData.name: ""}})  </th>
                                            <td> {{couponData != null? couponData.discount: ""}} % <span @click="removeCoupon()" class="text-center ">  <i  class="mdi mdi-close"> </i>  </span> </td>
                                        </tr>
                                        <tr v-if="couponData != null">
                                            <th> Discount  </th>
                                            <td> $ {{carts.price * couponData.discount/100 }} </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr v-if="couponData != null">
                                            <th class="tfoot-padd">Order total</th>
                                            <td class="tfoot-padd"> {{ carts.price - (carts.price * couponData.discount/100) }} </td>
                                        </tr>
                                         <tr v-else>
                                            <th class="tfoot-padd">Order total</th>
                                            <td class="tfoot-padd"> {{ carts.price }} </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-top">
                    <div class="col-xs-12">
                        <div class="padding60">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="single-cart-form">
                                        <div class="log-title">
                                            <h3><strong>calculate shipping</strong></h3>
                                        </div>
                                        <div class="cart-form-text custom-input">
                                            <p>Enter your coupon code if you have one!</p>
                                            <form action="mail.php" method="post">
                                                <input type="text" name="country" placeholder="Country">
                                                <div class="submit-text">
                                                    <button type="submit">get a quote</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="single-cart-form">
                                        <div class="cart-form-text post-state custom-input">
                                            <form action="mail.php" method="post">
                                                <input type="text" name="state" placeholder="Region / State">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="single-cart-form">
                                        <div class="cart-form-text post-state custom-input">
                                            <form action="mail.php" method="post">
                                                <input type="text" name="subject" placeholder="Post Code">
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
    data(){
        return{
            coupon:"",
            couponData:null,

        }
    },
    methods:{
        removeCoupon(){
            localStorage.removeItem("coupon")
            this.couponData = null
        },
        couponApply(){
            let data = this.coupon
            axios.get("/web/couponApply/"+data).then((res)=>{
                if(res.data.coupon != null){
                     localStorage.setItem("coupon",JSON.stringify(res.data.coupon))
                    let  couponData = localStorage.getItem("coupon")
                    this.couponData = JSON.parse(couponData);
                     Toast.fire({
                    icon:"success",
                    title:" coupon applied success"
                 })
                }else{
                     Toast.fire({
                    icon:"success",
                    title:" coupon not match "
                })
                }


            })
        },
        cartRemove(id){
            axios.get("web/cartRemove/"+id).then((res)=>{
                this.$store.dispatch("cart")
                    Toast.fire({
                    icon:"success",
                    title:"Remove product form cart "
                })


            })
        },
        qunatyDec(id){
            axios.get("web/cartQuantyDec/"+id).then((res)=>{
                this.$store.dispatch("cart");
                 if(res.data.cart == true){
                   Toast.fire({
                        icon: 'success',
                        title: ' Quanty Decrement 1',
                    })
                }else{
                     Toast.fire({
                        icon: 'success',
                        title: ' please delete product form cart ',
                    })
                }

            })
        },
         qunatyInc(id){
            axios.get("web/cartQuantyInc/"+id).then((res)=>{
                this.$store.dispatch("cart");
                 if(res.data.cart == true){
                   Toast.fire({
                        icon: 'success',
                        title: ' Quanty Increment 1',
                    })
                }else{
                     Toast.fire({
                        icon: 'success',
                        title: ' Out of Stock ',
                    })
                }

            })
        }
    },
    computed:{
        carts(){
            return this.$store.getters.cart
        },

    },
    mounted(){
        this.$store.dispatch("cart")
         let  couponData = localStorage.getItem("coupon")
         this.couponData = JSON.parse(couponData);

    }
}
</script>

