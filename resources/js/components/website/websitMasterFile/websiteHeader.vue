<template>
    <div>
        	<header class="header-one">
			<div class="container-fluid text-center">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="index.html"><img src="img/logo.png" alt="Sellshop" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-middel">
							<div class="middel-top clearfix">
								<div class="left floatleft">
									<p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
								</div>
								<div class="center floatleft">
									<form action="#" method="get">
										<button type="submit"><i class="mdi mdi-magnify"></i></button>
										<input type="text" placeholder="Search within these results..." />
									</form>
								</div>
								<div class="right floatleft">
									<ul class="clearfix">


                                        <li v-if="user" ><a href="#"><i class="mdi mdi-account"></i></a>
                                            <ul>
                                                     <li><router-link to="/dashboard"> Profile </router-link></li>
                                                    <li><button class="btn btn-danger" @click.prevent="userLogOut"> LogOut </button></li>

											</ul>
										</li>

                                        <li v-else> <a href="#"><i class="mdi mdi-account"></i></a>
                                            <ul>

                                                    <li><router-link to="/login"> Login </router-link></li>
                                                    <li><router-link to="/register"> Register  </router-link></li>
                                                     <li><button class="btn btn-danger" @click.prevent="userLogOut"> LogOut </button></li>

											</ul>
										</li>



										<li><a href="#"><i class="mdi mdi-settings"></i></a>
											<ul>
												<li style="cursor:pointer"><a href="my-account.html">My account</a></li>
												<li style="cursor:pointer"><router-link to="/cart">My cart</router-link></li>
												<li style="cursor:pointer"><a @click.prevent="wishListPage()" >My wishlist</a></li>
												<li style="cursor:pointer"><li><router-link to="/checkout">Check out</router-link></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							<div class="mainmenu">
								<nav>
									<ul>

										<li><router-link to="/">Home</router-link></li>


										<li><router-link to="/shop"> Shop </router-link>
											<ul class="magamenu">
												<li class="banner"><a href="shop.html"><img src="img/maga1.png" alt="" /></a></li>
												<li v-for="category,index in categories" :key="index"> <h5> {{category.name}} </h5>
													<ul>
														<li v-for="item ,index in category.subcategory" :key="index" ><a href="#"> {{item.name}} </a></li>

													</ul>
												</li>
                                                <li class="banner"><a href="shop.html"><img src="img/maga1.png" alt="" /></a></li>
											</ul>
										</li>
										<li><a href="#">Pages</a>
											<ul class="dropdown">
												<li><a href="wishlist.html">Wishlist</a></li>
												<li><router-link to="chekout">Checkout</router-link></li>
												<li><a href="cart.html">Cart</a></li>
												<li><a href="product-grid.html">Product Grid View</a></li>
												<li><a href="product-list.html">Product List View</a></li>
												<li><a href="single-product.html">Single Product</a></li>
												<li><a href="error-404.html">404 page</a></li>
											</ul>
										</li>
										<li><a href="blog.html">Blog</a>
											<ul class="dropdown">
												<li><a href="blog-style-1.html">Blog Style One</a></li>
												<li><a href="blog-style-2.html">Blog Style Two</a></li>
												<li><a href="single-blog.html">Single Blog</a></li>
											</ul>
										</li>
										<li><a href="about.html">About</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li><a href="index.html">Home</a>
												<ul class="dropdown">
													<li><a href="index.html">Home version one</a></li>
													<li><a href="index-2.html">Home version two</a></li>
												</ul>
											</li>
											<li><a href="shop.html">Shop</a>
												<ul>
													<li><h5>men’s wear</h5>
														<ul>
															<li><a href="#">Shirts & Top</a></li>
															<li><a href="#">Shoes</a></li>
															<li><a href="#">Dresses</a></li>
															<li><a href="#">Shemwear</a></li>
															<li><a href="#">Jeans</a></li>
															<li><a href="#">Sweaters</a></li>
															<li><a href="#">Jacket</a></li>
															<li><a href="#">Men Watch</a></li>
														</ul>
													</li>
													<li><h5>women’s wear</h5>
														<ul>
															<li><a href="#">Shirts & Tops</a></li>
															<li><a href="#">Shoes</a></li>
															<li><a href="#">Dresses</a></li>
															<li><a href="#">Shemwear</a></li>
															<li><a href="#">Jeans</a></li>
															<li><a href="#">Sweaters</a></li>
															<li><a href="#">Jacket</a></li>
															<li><a href="#">Women Watch</a></li>
														</ul>
													</li>
												</ul>
											</li>
											<li><a href="#">Pages</a>
												<ul>
													<li><a href="wishlist.html">Wishlist</a></li>
													<li><router-link to="chekout">Checkout</router-link></li>
													<li><a href="cart.html">Cart</a></li>
													<li><a href="product-grid.html">Product Grid View</a></li>
													<li><a href="product-list.html">Product List View</a></li>
													<li><a href="single-product.html">Single Product</a></li>
													<li><a href="error-404.html">404 page</a></li>
												</ul>
											</li>
											<li><a href="blog.html">Blog</a>
												<ul>
													<li><a href="blog-style-1.html">Blog Style One</a></li>
													<li><a href="blog-style-2.html">Blog Style Two</a></li>
													<li><a href="single-blog.html">Single Blog</a></li>
												</ul>
											</li>
											<li><a href="about.html">About</a></li>
											<li><a href="contact.html">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					  <div class="col-sm-2">
						<div class="cart-itmes">
							<a class="cart-itme-a" href="cart.html">
								<i class="mdi mdi-cart"> </i>
                                        
								{{carts.quanty}} items :  <strong> ${{carts.price}} </strong>
							</a>
							<div class="cartdrop">
								<div class="sin-itme clearfix" v-for="cart,index in carts.cart" :key="index">
									<i class="mdi mdi-close"  @click="cartRemove(cart.id)"></i>
									<a class="cart-img" href="cart.html"><img :src=" 'image/'+cart.product.image " alt=""></a>
									<div class="menu-cart-text">
										<a href="#"><h5> {{cart.product.name}} </h5></a>
										<div v-if="cart.attribute">
                                            <span>Color :  {{cart.attribute.color.name}} </span>
										    <span>Size :     {{cart.attribute.size.name}} </span>
                                        </div>
										<strong> {{cart.quanty * cart.price}} </strong>
									</div>
								</div>

								<div class="total">
									<span>total <strong>=  ${{carts.price}}  </strong></span>
								</div>
								<router-link to="/cart" class="goto" >go to cart</router-link>
								<a class="out-menu" href="checkout.html">Check out</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
    </div>
</template>
   <script>
import axios from 'axios'
    export default {
        data(){
            return{
                couponData:null,
                multiCategory:[],

            }
        },
       computed:{
            user(){
                return this.$store.getters.loginUser
            },
              carts(){
                     return this.$store.getters.cart
                 },

             categories(){
                return this.$store.getters.category
            }

            },
            mounted(){
                this.$store.dispatch("logInUser")
                this.$store.dispatch("category")
                this.$store.dispatch("cart");
                  let coupon = localStorage.getItem("coupon")
                  this.couponData = JSON.parse(coupon)


            },
            watch:{

                 manik:function(){
                      let coupon = localStorage.getItem("coupon")
                        this.couponData = JSON.parse(coupon)

                 }


         },


        methods:{
        cartRemove(id){
            axios.get("web/cartRemove/"+id).then((res)=>{
                this.$store.dispatch("cart")
                    Toast.fire({
                    icon:"success",
                    title:"Remove product form cart "
                })


            })
        },

        wishListPage(){
            if(this.user){
                this.$router.push("/wishList")
            }else{
                this.$router.push("/login")
            }
        },
        userLogOut(){
                this.$store.dispatch("userLogOUt").then((res)=>{
                    this.$store.dispatch("logInUser")
                    sessionStorage.removeItem("user");
                    this.$router.push("/login");
                })

            }
        }

    }
</script>

