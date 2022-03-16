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
							<h2> {{this.$route.name}} </h2>
							<ul class="text-left">
								<li><router-link to="/">Home </router-link> </li>
								<li><span> // </span> {{this.$route.name}}/{{this.$route.params.id}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- pages-title-end -->
        <!-- collection section start -->
	<!--	<section class="collection-area collection-area2 section-padding">
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
		</section> -->
		<!-- collection section end -->
		<!-- product-grid-view content section start -->

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
