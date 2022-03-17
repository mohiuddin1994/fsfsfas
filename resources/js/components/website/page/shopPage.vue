<template>
    <div>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- header section start -->

        <!-- header section end -->
        <!-- pages-title-start -->
		<div class="pages-title section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pages-title-text text-center">
							<h2>Product Grid View</h2>
							<ul class="text-left">
								<li><a href="index.html">Home </a></li>
								<li><span> // </span>Shop</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- pages-title-end -->
        <!-- collection section start -->
		<section class="collection-area collection-area2 section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="single-colect banner collect-one">
							<a href="#"><img src="img/collect/4.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="colect-text ">
							<h4><a href="#">Fashion Collection 2016</a></h4>
							<h5>big sale of the men 2016 fashion <br /> Up To 23% Off!</h5>
							<a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
						</div>
						<div class="collect-img banner margin single-colect">
							<a href="#"><img src="img/collect/5.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="collect-img banner single-colect">
							<a href="#"><img src="img/collect/6.jpg" alt="" /></a>
						</div>
						<div class="colect-text ">
							<h4><a href="#">Men’s Collection 2016</a></h4>
							<p>There are many variations of passages of Lorem Ipsum avalabbut the majority have suffered alteration in some form.</p>
							<a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- collection section end -->
		<!-- product-grid-view content section start -->
		<section class="pages products-page section-padding-bottom">
			<div class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="sidebar left-sidebar">
							<div class="s-side-text">
								<div class="sidebar-title clearfix" @click.prevent="allProductShowClick">
									<h4 class="floatleft">Categories</h4>
									<h5 class="floatright"><a> All </a></h5>
								</div>
								<div class="categories left-right-p">
									<ul id="accordion" class="panel-group clearfix">
										<li class="panel"   v-for="category,index in categories" :key="index">
											<div data-toggle="collapse" data-parent="#accordion"  @click="showItem(category.id)" >
												<div class="medium-a" @click="productFilter(category.id,'category_id')" >
													{{category.name}}
												</div>
											</div>

											<div class="panel-collapse collapse in" v-if="statusShowItem">
												<div class="normal-a">
													<a v-for="item ,index in category.subcategory" :key="index" > <span style="cursor:pointer" @click="productFilter(item.id,'subcategory_id')" > {{item.name}} </span> </a>

												</div>
											</div>



										</li>

									</ul>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title">
									<h4>price</h4>
								</div>
								<div class="range-slider clearfix" v-if="sideBarInfo.price">
									<form action="#" method="get">
										<label><span>Price $ {{sideBarInfo.price.min}}  - $ {{sideBarInfo.price.max}}  ( $ {{price}})   </span> <br>

                                        <input @change.prevent="productFilter('','price', sideBarInfo.price.min,sideBarInfo.price.max)" :min="sideBarInfo.price.min" :max="sideBarInfo.price.max" value="0" class="form-controll" v-model="price" type="range" id="" style="width:229px"  /> </label>
 									</form>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix" @click="ShowSize">
									<h4 class="floatleft">size</h4>
									<h5 class="floatright"><a>All</a></h5>
								</div>
                                <div v-if="sizeToggle">
                                    <div class="size-select clearfix"  v-for="size,index in allSizes" :key="index">
                                        <a style="cursor:pointer" @click="productFilter(size.id,'size_id')" >{{size.name}} </a>

                                    </div>
                                </div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix" @click="colorShow">
									<h4 class="floatleft">color</h4>
									<h5 class="floatright" ><a>All</a></h5>
								</div>
                                <div v-if="colorToggle">
                                    <div class="color-select clearfix" v-for="color,index in allColors" :key="index" >
                                        <a @click="productFilter(color.id,'color_id')"> {{color.name}} </a>

                                    </div>
                                </div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix" @click="brandShow">
									<h4 class="floatleft">brands</h4>
									<h5 class="floatright"><a>All</a></h5>
								</div>
								<div class="brands-select clearfix" v-if="brandToggle">
									<ul>
										<li v-for="brand,index in allBrands" :key="index">
											<a @click="productFilter(brand.id,'brand_id')" >{{brand.name}}</a>
										</li>

									</ul>
								</div>
							</div>

						</div>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9">
						<div class="right-products">
							<div class="row">
								<div class="col-xs-12">
									<div class="section-title clearfix">
										<ul>
											<li>
												<ul class="nav-view">
													<li class="active"><a data-toggle="tab" href="#grid"> <i class="mdi mdi-view-module"></i> </a></li>
													<li><a data-toggle="tab" href="#list"> <i class="mdi mdi-view-list"></i> </a></li>
												</ul>
											</li>
											<li class="sort-by floatright">
												Showing 1-9 of 89 Results
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="tab-content grid-content">
									<div class="tab-pane fade in active text-center" id="grid">
										<div class="col-xs-12 col-sm-6 col-md-4" v-for="product,index in products" :key="index">
											<div class="single-product">
												<div class="product-img">
													<div class="pro-type">
														<span>new</span>
													</div>
													<a href="#"><img :src="shopImage(product.image)" alt="Product Title" /></a>
													<div class="actions-btn">
														<a @click.prevent="addToCart(product)"><i class="mdi mdi-cart"></i></a>
														<a @click.prevent="quickViewProduct(product.id)"  data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
														<a @click.prevent="wishListProduct(product)" ><i class="mdi mdi-heart"></i></a>
													</div>
												</div>
												<div class="product-dsc">
													<p><a href="#">{{product.title}}</a></p>
													<div class="ratting">
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star-half"></i>
														<i class="mdi mdi-star-outline"></i>
													</div>
													<span>${{product.price?product.price:''}}</span>
												</div>
											</div>
										</div>
										<!-- single product end -->

										<!-- single product end -->
									</div>
									<div class="tab-pane fade in" id="list">
										<div class="col-xs-12">
											<div class="single-list-view" v-for="product,index in products" :key="index">
												<div class="row">
													<div class="col-xs-12 col-md-4">
														<div class="list-img">
															<div class="product-img">
																<div class="pro-type sell">
																	<span> {{product.discount?product.discount+"%":""}} </span>
																</div>
																<a href="#"><img :src="shopImage(product.image)" alt="Product Title" /></a>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-md-8">
														<div class="list-text">
															<h3> {{product.title}} </h3>
															<span>{{product.name}} </span>
															<div class="ratting floatright">
																<p>( 27 Rating )</p>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star-half"></i>
																<i class="mdi mdi-star-outline"></i>
															</div>
															  <h3>${{product.price?product.price:''}}</h3>
															<p> {{product.description}} </p>
                                                             <div class="list-btn">
																<a @click.prevent="addToCart(product)">add to cart</a>
																<a @click.prevent="wishListProduct(product)" >wishlist</a>
																<a @click.prevent="quickViewProduct(product.id)"  data-toggle="modal" data-target="#quick-view">zoom</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- single product end -->

											<!-- single product end -->
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="pagnation-ul">
										<ul class="clearfix">
											<li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">...</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#"><i class="mdi mdi-menu-right"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<!-- product-grid-view content section end -->
        <!-- quick view start -->
		<div class="product-details quick-view modal animated zoomInUp" id="quick-view">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="d-table">
							<div class="d-tablecell">
								<div class="modal-dialog">
									<div class="main-view modal-content">
										<div class="modal-footer" data-dismiss="modal" @click.prevent="priceNull">
											<span> x </span>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4">
												<div class="quick-image">
													<div class="single-quick-image text-center">
														<div class="list-img">
															<div class="product-img tab-content">
																<div class="simpleLens-container tab-pane fade in" id="q-sin-1">
																	<div class="pro-type">
																		<span>new</span>
																	</div>
																	<a class="simpleLens-image" :data-lens-image="showImge(quickProduct.product?quickProduct.product.image:'')" href="#"><img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="" class="simpleLens-big-image"></a>
																</div>
																<div class="simpleLens-container tab-pane active fade in" id="q-sin-2">
																	<div class="pro-type sell">
																		<span>sell</span>
																	</div>
																	<a class="simpleLens-image" :data-lens-image="showImge(quickProduct.product?quickProduct.product.image:'')" href="#"><img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="" class="simpleLens-big-image"></a>
																</div>
																<div class="simpleLens-container tab-pane fade in" id="q-sin-3">
																	<div class="pro-type">
																		<span>-15%</span>
																	</div>
																	<a class="simpleLens-image" :data-lens-image="showImge(quickProduct.product?quickProduct.product.image:'')"  href="#"><img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="" class="simpleLens-big-image"></a>
																</div>
																<div class="simpleLens-container tab-pane fade in" id="q-sin-4">
																	<div class="pro-type">
																		<span>new</span>
																	</div>
																	<a class="simpleLens-image" :data-lens-image="showImge(quickProduct.product?quickProduct.product.image:'')"  href="#"><img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="" class="simpleLens-big-image"></a>
																</div>
															</div>
														</div>
													</div>
													<div class="quick-thumb">
														<ul class="product-slider">
															<li><a data-toggle="tab" href="#q-sin-1"> <img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="quick view" /> </a></li>
															<li class="active"><a data-toggle="tab" href="#q-sin-2"> <img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#q-sin-3"> <img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#q-sin-4"> <img :src="showImge(quickProduct.product?quickProduct.product.image:'')" alt="small image" /> </a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8">
												<div class="quick-right">
													<div class="list-text">
														<h3>{{quickProduct.product?quickProduct.product.title:""}} </h3>
														<span> {{quickProduct.product?quickProduct.product.name:""}} </span>
														<div class="ratting floatright">
															<p>( 27 Rating )</p>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star-half"></i>
															<i class="mdi mdi-star-outline"></i>
														</div>
														<h5 v-if="justPrice">{{quickProduct.product?quickProduct.product.price:""}}</h5>

                                                        <h5 v-if="sPrice">{{attribute ? attribute.price:""}}</h5>

														<p>{{quickProduct.product?quickProduct.product.description:""}}</p>

														<div class="all-choose">
                                                                 <div v-if="quickProduct.attribute != 0">
                                                                <div class="s-shoose">
                                                                    <h5> Color </h5>
                                                                    <div class="color-select clearfix">
                                                                        <li class="mr-2"
                                                                            style="list-style: none;float: left; margin-right:10px;cursor:pointer"
                                                                            v-for="item,index in quickProduct.attribute"
                                                                            :key="index"> <button   @click.prevent="getSizeShop(item.color.id,item.product_id)" >

                                                                                {{item.color.name}} </button> </li>

                                                                    </div>
                                                                </div>
                                                                <div class="s-shoose">
                                                                    <h5>size</h5>

                                                                    <div class="size-drop">
                                                                        <div class="btn-group">
                                                                            <button type="button"
                                                                                class="btn">size</button>
                                                                            <button type="button"
                                                                                class="btn dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <span class=""><i
                                                                                        class="mdi mdi-chevron-down"></i></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                 <li v-for="size , index in sizes"
                                                                                    :key="index"> <a
                                                                                        style="cursor:pointer"
                                                                                        @click.prevent="shopSizeWisePrice(size.id, size.size.id , size.product_id)" >
                                                                                         {{size.size.name}} </a>

                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

														</div>
                                                        <div class="s-shoose">
																<h5>qty</h5>
																<form action="#" method="POST">
																	<div class="plus-minus">
																		<a class="dec qtybutton">-</a>
																		<input type="text" value="01" name="qtybutton" v-model="cart.quanty" class="plus-minus-box">
																		<a class="inc qtybutton">+</a>
																	</div>
																</form>
															</div>
														<div class="list-btn">
															<a href="#" v-if="quickProduct.attribute != 0" @click="addToCart(quickProduct.product,quickProduct.attribute)"  >A add to cart </a>
															<a href="#" v-else @click="addToCart(quickProduct.product)"  >add to cart </a>

															<a href="#" v-if="quickProduct.attribute != 0" @click="wishListProduct(quickProduct.product,quickProduct.attribute)"  >  wishlist</a>
															<a href="#" v-else @click="wishListProduct(quickProduct.product)"  >wishlist</a>
															<a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
														</div>
														<div class="share-tag clearfix">
															<ul class="blog-share floatleft">
																<li><h5>share </h5></li>
																<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
																<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
																<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
																<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
																<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
																<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- quick view end -->
        <!-- footer section start -->
		<footer class="footer-two">
			<!-- brand logo area start -->
			<div class="brand-logo">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="barnd-bg">
								<a href="#"><img src="img/brand/1.png" alt="Brand Logo" /></a>
								<a href="#"><img src="img/brand/2.png" alt="Brand Logo" /></a>
								<a href="#"><img src="img/brand/3.png" alt="Brand Logo" /></a>
								<a href="#"><img src="img/brand/4.png" alt="Brand Logo" /></a>
								<a href="#"><img src="img/brand/5.png" alt="Brand Logo" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- brand logo section end -->
			<!-- social media section start -->
			<div class="social-media section-padding">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="newsletter newsletter2">
								<h3>newsletter</h3>
								<form action="mail.php" method="post">
									<input type="text" name="email" placeholder="Enter your email..."/>
									<input type="submit" value="subscribe"/>
								</form>
							</div>
							<div class="social-icons">
								<a href="#"><i class="mdi mdi-facebook"></i></a>
								<a href="#"><i class="mdi mdi-twitter"></i></a>
								<a href="#"><i class="mdi mdi-google-plus"></i></a>
								<a href="#"><i class="mdi mdi-dribbble"></i></a>
								<a href="#"><i class="mdi mdi-rss"></i></a>
							</div>
						</div>
						<div class="col-sm-6 col-md-offset-1 col-md-5">
							<div class="newsletter get-touch">
								<h3>get in touch</h3>
								<form action="mail.php" method="post">
									<input type="text" name="name" placeholder="Enter your Name..."/>
									<input type="text" name="email" placeholder="Enter your email..."/>
									<textarea name="message" rows="2" placeholder="Enter your message...."></textarea>
									<input type="submit" value="send your message"/>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- social media section end -->
			<!-- footer-top area start -->

			<!-- footer-top area end -->
			<!-- footer-bottom area start -->

			<!-- footer-bottom area end -->
		</footer>
        <!-- footer section end -->

    </div>
</template>


<script>
import axios from 'axios'

    export default {
        data(){
            return{

                sizes:[],
                attribute : "",
                price : "0",
                justPrice : true,
                sPrice : false,
				statusShowItem: false,
				sizeToggle: false,
				colorToggle: false,
				brandToggle: false,
                filter:{
                    name:'',
                    id: ''
                },
				cart:{
					color_id:'',
					size_id:'',
					quanty :"",

				},
                whishList:{
                    user_id:'',
                    product_id:'',
                    attribute:'',
                }
            }
        },
        computed:{
             user(){
                return this.$store.getters.loginUser
            },

             quickProduct(){
                return this.$store.getters.quickShopProducts
            },
            allProductShowClick(){
                this.$store.dispatch("allProduct")
            },
            products(){
                return this.$store.getters.productsAllIn
            },
              singleProduct(){
                return this.$store.getters.singleProduct
            },
             categories(){
                return this.$store.getters.category
            },
             allSizes(){
                return this.$store.getters.getSize
            },
             allColors(){
                return this.$store.getters.colors
            },
            allBrands(){
                return this.$store.getters.brands
            },
             sideBarInfo(){
                return this.$store.getters.allSideBarInfo
            }

        },
        mounted(){
            this.$store.dispatch("allProduct")
            this.$store.dispatch("singleProduct")
            this.$store.dispatch("category")
            this.$store.dispatch("allColor")
            this.$store.dispatch("allSize")
            this.$store.dispatch("allBrand")
            this.$store.dispatch("sideBarInfo")
        },


        methods:{
				addToCart(product){
					if(this.cart.color_id && this.cart.size_id){
							let data ={
							attribute : this.attribute,
							quanty : this.cart.quanty,
						}
						axios.post("web/addToCart",data).then((res)=>{
                            this.$store.dispatch("cart")
							if(res.data.product){
                                  Toast.fire({
                                    icon: 'success',
                                    title: ' product Add To Cart '
                                })
                            }else if(res.data.quanty){
                                  Toast.fire({
                                    icon: 'success',
                                    title: 'Quanty Update '
                                    })
                            }else if(res.data.stock){
                                  Toast.fire({
                                    icon: 'success',
                                    title: ' Out of Stock '
                                    })
                            }
						})

					}else{
						let data ={
							product : product,
							quanty : this.cart.quanty,
						}
						axios.post("web/addToCart",data).then((res)=>{
                            this.$store.dispatch("cart")
							if(res.data.product){
                                  Toast.fire({
                                    icon: 'success',
                                    title: ' product Add To Cart '
                                })
                            }else if(res.data.quanty){
                                  Toast.fire({
                                    icon: 'success',
                                    title: 'Quanty Update '
                                    })
                            }else if(res.data.stock){
                                  Toast.fire({
                                    icon: 'success',
                                    title: ' Out of Stock '
                                    })
                            }
						})
					}



				},
            wishListProduct(product,attribute){
            if(this.user){
                    if(attribute){
                     this.whishList.user_id = this.user.id
                      this.whishList.product_id = product.id
                      this.whishList.attribute = attribute
                    }else{
                      this.whishList.user_id = this.user.id
                      this.whishList.product_id = product.id
                    }

                    axios.post('web/whshList',this.whishList).then((res)=>{
                        if(res.data.success == true && res.data.wishList !=0){
                            Toast.fire({
                            icon: 'success',
                            title: ' Wisht List Product add '
                         })
                        }else{
                              Toast.fire({
                            icon: 'success',
                            title: ' Already Product add WishList '
                             })
                        }


                    })

                }else{
                    this.$router.push("/login")
                }

            },
            priceNull(){
                 this.justPrice = true
                this.sPrice = false
                this.sizePrice = ""
                this.whishList={
                     user_id:'',
                    product_id:'',
                    attribute:'',
                },
				this.cart={
					color_id:'',
					size_id:''

				}

            },

             getSizeShop(color_id, product_id) {
                axios.get("/web/colroWiseSizeShop/" + color_id + '/' + product_id).then((res) => {
					this.cart.color_id = color_id
                    this.sizes = res.data.attribute
                    
                })
            },

            showImge(img){
                return "image/"+img
            },
            quickViewProduct(id){

                this.$store.dispatch("quickViewProduct",id)
            },

            productFilter(id,field_name,minPrice){

					if(field_name == "price"){

						let data ={
                            minPrice : minPrice,
							price :this.price,
							field_name :field_name,
						}
							this.$store.dispatch("productFiler",JSON.stringify(data))
					}else{
						let data = {
							field_name:field_name,
							id :id
                    	}
						this.$store.dispatch("productFiler",JSON.stringify(data))
					}



            },

            brandShow(){
                this.brandToggle =! this.brandToggle
            },
            ShowSize(){
                this.sizeToggle =! this.sizeToggle
            },

            colorShow(){
                this.colorToggle =! this.colorToggle
            },

			showItem(id){

				this.statusShowItem =! this.statusShowItem

			},


            shopImage(img){
                return "image/"+img
            },
            singleImageShow(img){
                return "image/"+img
            },
            // quickView(id){
            //     this.$store.dispatch('quickView',id)
            // },

            shopSizeWisePrice(attribute_id,size_id,product_id){
              axios.get("/web/shopSizeWisePrice/"+attribute_id+"/"+size_id+"/"+product_id).then((res)=>{
                  this.cart.size_id = size_id;
                  this.attribute = res.data.attribute
                  if(this.attribute != null){
                      this.justPrice = false
                      this.sPrice = true
                  }else{
                      this.justPrice = true
                      this.sPrice = false
                  }
              })
            },

        },
        watch:{
            $route(to,from){
                this.quickViewProduct
            },

        }
    }
</script>


