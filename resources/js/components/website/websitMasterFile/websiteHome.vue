<template>
    <div>
        <div class="main-slider-one slider-area">
            <div id="wrapper">
                <div class="slider-wrapper">
                    <div id="mainSlider" class="nivoSlider">
                        <img src="img/slider/home1/1.jpg" alt="main slider" title="#htmlcaption" />
                        <img src="img/slider/home1/2.jpg" alt="main slider" title="#htmlcaption2" />
                    </div>
                    <div id="htmlcaption" class="nivo-html-caption slider-caption">
                        <div class="container">
                            <div class="slider-left slider-right">
                                <div class="slide-text animated bounceInRight">
                                    <h3 class="bounceInDown">new collection</h3>
                                    <h1>Men’s Fashion 2016</h1>
                                    <span>Starting at $65.00. Don’t miss out!</span>
                                </div>
                                <div class="one-p animated bounceInLeft">
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                                        those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
                                        Malorum".</p>
                                </div>
                                <div class="animated slider-btn fadeInUpBig">
                                    <a class="shop-btn" href="shop.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                        <div class="container">
                            <div class="slider-left slider-right">
                                <div class="slide-text animated bounceInRight">
                                    <h3>new collection</h3>
                                    <h1>Men’s Fashion 2016</h1>
                                    <span>Starting at $65.00. Don’t miss out!</span>
                                </div>
                                <div class="one-p animated bounceInLeft">
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                                        those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
                                        Malorum".</p>
                                </div>
                                <div class="animated slider-btn fadeInUpBig">
                                    <a class="shop-btn" href="shop.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider section end -->
        <!-- collection section start -->
        <section class="collection-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-colect banner collect-one">
                            <a href="#"><img src="img/collect/1.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colect-text ">
                            <h4><a href="#">Fashion Collection 2016</a></h4>
                            <h5>big sale of the men 2016 fashion <br /> Up To 23% Off!</h5>
                            <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                        <div class="collect-img banner margin single-colect">
                            <a href="#"><img src="img/collect/2.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="collect-img banner single-colect">
                            <a href="#"><img src="img/collect/3.jpg" alt="" /></a>
                            <h2>New Collection</h2>
                        </div>
                        <div class="colect-text ">
                            <h4><a href="#">Men’s Collection 2016</a></h4>
                            <p>There are many variations of passages of Lorem Ipsum avalabbut the majority have suffered
                                alteration in some form.</p>
                            <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- collection section end -->
        <!-- featured-products section start -->
        <section class="single-products section-padding extra-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Featured Products edit</h2>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="load-list load-list-one">
                        <span> </span>
                        <li>
                            <div class="row text-center">

                                <div class="col-xs-12 col-sm-6 col-md-3" v-for="product,index in products" :key="index">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="pro-type">
                                                <span> {{product.discount? product.discount+"%":'' }} </span>
                                            </div>
                                            <a href="#"><img :src="imageShow(product.image)" alt="Product Title" /></a>
                                            <div class="actions-btn">
                                                <a @click.prevent="addToCart(product)"><i class="mdi mdi-cart"></i></a>
                                                <a href="#" data-toggle="modal" @click="quickView(product.id)"
                                                    data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
                                                <a href="#"><i class="mdi mdi-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-dsc">
                                            <p><a href="#">{{product.name}}</a></p>
                                            <span>${{product.price}} </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </li>

                    </ul>
                    <button id="load-more-one">Load More</button>
                </div>
            </div>
        </section>
        <!-- featured-products section end -->
        <!-- coming product section start -->
        <section class="coming-product">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-2">
                        <div class="tab-menu nav nav-tabs padding"  v-if="singleProduct.product">
                            <ul>
                                <li class="active"><a href="#dress1" data-toggle="tab"
                                        data-target="#dress1, #text1"><img :src="singleImageShow(singleProduct.product.image)"
                                            alt="" /></a></li>
                                <li><a href="#dress2" data-toggle="tab" data-target="#dress2,#text2"><img
                                            :src="singleImageShow(singleProduct.product.image)" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-5">
                        <div class="text-center large-img tab-content " v-if="singleProduct.product">
                            <div class="tab-pane fade in active" id="dress1">
                                <img :src="singleImageShow(singleProduct.product.image)" alt="" height="500px" />
                            </div>
                            <div class="tab-pane fade" id="dress2">
                                <img :src="singleImageShow(singleProduct.product.image)" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="padding">
                            <div class="tab-content">
                                <div class="single-coming tab-pane fade in active" id="text1">
                                    <h4><a href="#">{{singleProduct.product?singleProduct.product.name:""}}</a></h4>
                                    <span><strong>${{singleProduct.product?singleProduct.product.price:""}}</strong> </span>
                                    <p class="come-p"> {{singleProduct.product?singleProduct.product.description:""  }} </p>
                                    <ul class="color-size">
                                        <li><span>Size</span><strong>:</strong> <a href="#"
                                                v-for="attribute,index in singleProduct.attributeSize" :key="index">
                                                {{attribute.size? attribute.size.name:""}} </a>
                                        </li>
                                        <li><span>Color</span><strong>:</strong> <a href="#"
                                                v-for="attribute,index in singleProduct.attributeColor" :key="index">
                                                {{attribute.color? attribute.color.name:""}} </a>
                                        </li>
                                        <li><span>Brand</span><strong>:</strong>
                                            {{singleProduct.product?singleProduct.product.brand.name:""}} </li>
                                        <li><span>category</span><strong>:</strong>
                                            {{singleProduct.product?singleProduct.product.category.name:""}} </li>
                                        <li><span>Subcategory</span><strong>:</strong>
                                            {{singleProduct.product?singleProduct.product.subcategory.name:""}}</li>
                                    </ul>
                                    <div class="count-text clearfix">
                                        <ul id="countdown-1">
                                            <li>
                                                <p class="timeRefDays timedescription">days</p>
                                                <span class="days timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefHours timedescription">hrs</p>
                                                <span class="hours timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefMinutes timedescription">mins</p>
                                                <span class="minutes timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefSeconds timedescription">secs</p>
                                                <span class="seconds timenumbers">00</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-coming tab-pane fade" id="text2">
                                    <h4><a href="#">The Maker usc Dress</a></h4>
                                    <span><strong>$569.00</strong> <del>$669.00</del></span>
                                    <p class="come-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed does
                                        eiusmodes tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        venim, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Ut enim ad minim veniam.</p>
                                    <ul class="color-size">
                                        <li><span>Size</span><strong>:</strong> <a href="#">SL</a><a href="#">ML</a><a
                                                href="#">Xl</a></li>
                                        <li><span>color</span><strong>:</strong> <a href="#">Red</a><a
                                                href="#">Grean</a><a href="#">Blue</a></li>
                                        <li><span>Brand</span><strong>:</strong>Crazy Fashion</li>
                                        <li><span>category</span><strong>:</strong>Fashion Mens</li>
                                    </ul>
                                    <div class="count-text clearfix">
                                        <ul id="countdown-2">
                                            <li>
                                                <p class="timeRefDays timedescription">days</p>
                                                <span class="days timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefHours timedescription">hrs</p>
                                                <span class="hours timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefMinutes timedescription">mins</p>
                                                <span class="minutes timenumbers">00</span>
                                            </li>
                                            <li>
                                                <p class="timeRefSeconds timedescription">secs</p>
                                                <span class="seconds timenumbers">00</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coming product section end -->
        <!-- tab-products section start -->
        <div class="tab-products single-products section-padding extra-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <div class="product-tab nav nav-tabs">
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#arrival">New Arrival
                                            <span>/</span></a></li>
                                    <li><a data-toggle="tab" href="#popular">Popular Product <span>/</span></a></li>
                                    <li><a data-toggle="tab" href="#best">Best Seller</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center tab-content">
                    <div class="tab-pane  fade in active" id="arrival">
                        <div class="wrapper">
                            <ul class="load-list load-list-two">
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3" v-for="product,index in products"
                                            :key="index">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span> {{product.discount? product.discount+"%":'' }} </span>
                                                    </div>
                                                    <a href="#"><img :src="imageShow(product.image)"
                                                            alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">{{product.name}}</a></p>
                                                    <span>${{product.price}} </span>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- single product end -->
                                    </div>
                                </li>

                            </ul>
                            <button id="load-more-two">Load More</button>
                        </div>
                    </div>
                    <!-- arrival product end -->
                    <div class="tab-pane fade" id="popular">
                        <div class="wrapper">
                            <ul class="load-list load-list-three">
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/6.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/7.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Grey t-shirt</a></p>
                                                    <span>$67.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/8.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Blue t-shirt</a></p>
                                                    <span>$77.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/4.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Blue t-shirt</a></p>
                                                    <span>$77.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/8.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$65.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type sell">
                                                        <span>sell</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/9.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00 <del>$62.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/10.jpg"
                                                            alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$56.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/11.jpg"
                                                            alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$96.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span>new</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/5.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s White t-shirt</a></p>
                                                    <span>$165.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/6.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/7.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Grey t-shirt</a></p>
                                                    <span>$67.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/8.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Blue t-shirt</a></p>
                                                    <span>$77.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                            </ul>
                            <button id="load-more-three">Load More</button>
                        </div>
                    </div>
                    <!-- popular product end -->
                    <div class="tab-pane fade" id="best">
                        <div class="wrapper">
                            <ul class="load-list load-list-four">
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span>new</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/5.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s White t-shirt</a></p>
                                                    <span>$165.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/6.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span>-15%</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/7.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Grey t-shirt</a></p>
                                                    <span>$67.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/4.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Blue t-shirt</a></p>
                                                    <span>$77.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/8.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$65.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type sell">
                                                        <span>sell</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/9.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00 <del>$62.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/10.jpg"
                                                            alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$56.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/11.jpg"
                                                            alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$96.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                                <li>
                                    <div class="row text-center">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span>new</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/5.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s White t-shirt</a></p>
                                                    <span>$165.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <div class="pro-type">
                                                        <span>new</span>
                                                    </div>
                                                    <a href="#"><img src="img/products/5.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s White t-shirt</a></p>
                                                    <span>$165.20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/6.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Black t-shirt</a></p>
                                                    <span>$57.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/products/8.jpg" alt="Product Title" /></a>
                                                    <div class="actions-btn">
                                                        <a href="#"><i class="mdi mdi-cart"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#quick-view"><i
                                                                class="mdi mdi-eye"></i></a>
                                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-dsc">
                                                    <p><a href="#">men’s Blue t-shirt</a></p>
                                                    <span>$77.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    </div>
                                </li>
                            </ul>
                            <button id="load-more-four">Load More</button>
                        </div>
                    </div>
                    <!-- popular product end -->
                </div>
            </div>
        </div>
        <!-- tab-products section end -->
        <!-- service section start -->
        <section class="service-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Our Service</h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-4">
                        <div class="service-text">
                            <i class="mdi mdi-truck"></i>
                            <h4>home delivery</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service-text">
                            <i class="mdi mdi-lock"></i>
                            <h4>PAYMENT SECURED</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="service-text">
                            <i class="mdi mdi-rotate-left"></i>
                            <h4>30 days money back</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service section end -->
        <!-- blog section start -->
        <section class="latest-blog section-padding extra-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Latest Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <ul class="load-list load-list-blog">
                        <li>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/1.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/2.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/3.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/3.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/1.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="l-blog-text">
                                        <div class="banner"><a href="single-blog.html"><img src="img/blog/2.jpg"
                                                    alt="" /></a></div>
                                        <div class="s-blog-text">
                                            <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                            <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69
                                                    Comments</a></span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour....
                                            </p>
                                        </div>
                                        <div class="date-read clearfix">
                                            <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                            <a href="single-blog.html">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button id="load-more-blog">Load More</button>
                </div>
            </div>
        </section>
        <!-- blog section end -->
        <!-- quick view start -->
        <div class="product-details quick-view modal animated zoomInUp" id="quick-view">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="d-table">
                            <div class="d-tablecell">
                                <div class="modal-dialog">
                                    <div class="main-view modal-content">
                                        <div class="modal-footer" data-dismiss="modal" @click="priceNull()" >
                                            <span>x</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-4">

                                                <div class="quick-image">
                                                    <div class="single-quick-image text-center">
                                                        <div class="list-img">
                                                            <div class="product-img tab-content" v-if="quickViews.product">
                                                                <div class="simpleLens-container tab-pane fade in"
                                                                    id="sin-1">
                                                                    <div class="pro-type">
                                                                        <span>new</span>
                                                                    </div>
                                                                    <a class="simpleLens-image"
                                                                        :data-lens-image="imageShow(quickViews.product.image)"
                                                                        href="#"><img
                                                                            :src="imageShow(quickViews.product.image)" alt=""
                                                                            class="simpleLens-big-image"></a>
                                                                </div>
                                                                <div class="simpleLens-container tab-pane active fade in"
                                                                    id="sin-2">
                                                                    <div class="pro-type sell">
                                                                        <span>sell</span>
                                                                    </div>
                                                                    <a class="simpleLens-image"
                                                                        :data-lens-image="imageShow(quickViews.product.image)"
                                                                        href="#"><img
                                                                            :src="imageShow(quickViews.product.image)" alt=""
                                                                            class="simpleLens-big-image"></a>
                                                                </div>
                                                                <div class="simpleLens-container tab-pane fade in"
                                                                    id="sin-3">
                                                                    <div class="pro-type">
                                                                        <span>-15%</span>
                                                                    </div>
                                                                    <a class="simpleLens-image"
                                                                        :data-lens-image="imageShow(quickViews.product.image)"
                                                                        href="#"><img
                                                                            :src="imageShow(quickViews.product.image)" alt=""
                                                                            class="simpleLens-big-image"></a>
                                                                </div>
                                                                <div class="simpleLens-container tab-pane fade in"
                                                                    id="sin-4">
                                                                    <div class="pro-type">
                                                                        <span>new</span>
                                                                    </div>
                                                                    <a class="simpleLens-image"
                                                                        data-lens-image="imageShow(quickViews.image)"
                                                                        href="#"><img
                                                                            :src="imageShow(quickViews.product.image)" alt=""
                                                                            class="simpleLens-big-image"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quick-thumb">
                                                        <ul class="product-slider" v-if="quickViews.product">

                                                            <li><a data-toggle="tab" href="#sin-1"> <img
                                                                        :src="imageShow(quickViews.product.image)"
                                                                        alt="quick view" /> </a></li>

                                                            <li class="active"><a data-toggle="tab" href="#sin-2"> <img
                                                                        :src="imageShow(quickViews.product.image)"
                                                                        alt="small image" /> </a></li>

                                                            <li><a data-toggle="tab" href="#sin-3"> <img
                                                                        :src="imageShow(quickViews.product.image)"
                                                                        alt="small image" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-3"> <img
                                                                        :src="imageShow(quickViews.product.image)"
                                                                        alt="small image" /> </a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7 col-md-8">
                                                <div class="quick-right">
                                                    <div class="list-text">
                                                        <h3>{{quickViews.product?quickViews.product.title:''}} </h3>
                                                        <span> {{quickViews.product?quickViews.product.name:""}} </span>
                                                        <div class="ratting floatright">
                                                            <p>( 27 Rating )</p>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star-half"></i>
                                                            <i class="mdi mdi-star-outline"></i>
                                                        </div>

                                                        <h5 v-if="justPrice"> {{quickViews.product?quickViews.product.price:""}} </h5>
                                                        <h5 v-if="sPrice"> {{sizePrice.price}}</h5>
                                                        <p>{{quickViews.product?quickViews.product.description:""}} </p>
                                                        <div class="all-choose">
                                                            <div v-if="quickViews.attribute != 0">
                                                                <div class="s-shoose">
                                                                    <h5> Color </h5>
                                                                    <div class="color-select clearfix">
                                                                        <li class="mr-2"
                                                                            style="list-style: none;float: left; margin-right:10px;cursor:pointer"
                                                                            v-for="item,index in quickViews.attribute"
                                                                            :key="index"> <button
                                                                                @click.prevent="getSize(item.color.id,quickViews.product.id)">
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
                                                                                    :key="index"><a
                                                                                        style="cursor:pointer"
                                                                                        @click.prevent="sizeWisePrice(size.id, size.size.id ,quickViews.product.id)">
                                                                                        {{size.size.name}} </a>

                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="s-shoose">
                                                                <h5>qty</h5>
                                                                <form action="#" method="POST">
                                                                    <div class="plus-minus">
                                                                        <input type="text" value="" name="qtybutton"
                                                                            v-model="cart.quanty" class="form-control">
                                                                    </div>

                                                                    <div class="list-btn">
                                                                        <a href="#" @click.prevent="addToCart(quickViews)">add to
                                                                            cart</a>
                                                                        <a href="#">wishlist</a>
                                                                        <a href="#">zoom</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                        <div class="share-tag clearfix">
                                                            <ul class="blog-share floatleft">
                                                                <li>
                                                                    <h5>share </h5>
                                                                </li>
                                                                <li><a href="#"><i class="mdi mdi-facebook"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                                                <li><a href="#"><i class="mdi mdi-linkedin"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
                                                                <li><a href="#"><i class="mdi mdi-dribbble"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="mdi mdi-instagram"></i></a>
                                                                </li>
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
    </div>
</template>



<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                sizes: [],
                quickViews: {},
                sizePrice: "",
                justPrice: true,
                sPrice: false,
                price: "0",
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
        computed: {
            products() {
                return this.$store.getters.productsAllIn
            },
            singleProduct() {
                return this.$store.getters.singleProduct
            },


        },
        mounted() {
            this.$store.dispatch("allProduct")
            this.$store.dispatch("singleProduct")



        },
        methods: {
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

            imageShow(img) {
                return "image/" + img
            },
            singleImageShow(img) {
                return "image/" + img
            },
            quickView(id) {

                 axios.get("/web/quickView/"+id).then((res) => {
                      this.quickViews = res.data
                 })
            },
            getSize(color_id, product_id) {
                axios.get("/web/colroWiseSize/" + color_id + '/' + product_id).then((res) => {
                    console.log(res.data.attribute);
                    this.sizes = res.data.attribute
                })
            },
            sizeWisePrice(attribute_id, size_id, product_id) {
                axios.get("/web/sizeWisePrice/" + attribute_id + "/" + size_id + "/" + product_id).then((res) => {
                    this.sizePrice = res.data.attribute
                    if (this.sizePrice != null) {
                        this.cart.color_id = res.data.attribute.color_id
                        this.cart.size_id = res.data.attribute.size_id
                        this.justPrice = false
                        this.sPrice = true
                    } else {
                        this.justPrice = true
                        this.sPrice = false
                    }
                })
            },


        }
    }

</script>
