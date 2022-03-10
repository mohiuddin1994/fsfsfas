<template>
    <div>
        	<div class="pages-title section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pages-title-text text-center">
							<h2>Wishlist</h2>
							<ul class="text-left">
								<li><router-link to="/">Home </router-link></li>
								<li>  <router-link to="/wishlist"> <span> // </span>Wishlist </router-link> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="pages wishlist-page section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive padding60">
							<table class="wishlist-table text-center">
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Stock Status </th>
										<th>Add To Cart</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="wishList,index in wishLists" :key="index">
										<td class="td-img text-left">
											<a href="#"><img :src="imageShow(wishList.product.image)" alt="Add Product" /></a>
											<div class="items-dsc">
												<h5><a href="#">{{wishList.product.title}}</a></h5>
                                                <div v-if="wishList.attribute != null && wishList.attribute">
                                                	<p class="itemcolor">Color : <span> {{wishList.attribute.color.name}} </span></p>
												    <p class="itemcolor">Size   : <span> {{wishList.attribute.size.name}}  </span></p>

                                                </div>

											</div>
										</td>
										<td>{{wishList.attribute != null?wishList.attribute.price:wishList.product.price}} </td>
										<td v-if="wishList.attribute != null" > {{wishList.attribute.stock >0 ?  "In Stock" +'='+ wishList.attribute.stock : + "Out f Stock"+ "=" + wishList.attribute.stock }} </td>
										<td v-else > {{wishList.product.stock >0 ?  "In Stock" +'='+ wishList.product.stock : + "Out f Stock"+ "=" + wishList.product.stock }} </td>
										<td>
											<div class="submit-text">
												<a v-if="wishList.attribute != null" @click="addToCart(wishList.attribute)" >  Add to cart</a>
												<a v-else @click="addToCart(wishList.product)" >  Add to cart</a>
											</div>
										</td>
										<td><i class="mdi mdi-close" title="Remove this product" @click="wishListRemove(wishList.id)"></i></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>



    </div>



</template>

<script>
import axios from 'axios'
import colorListVue from '../../admin/color/colorList.vue'
  export default {
      data(){
          return{

          }
      },
      methods:{
          imageShow(img){
              return "image/"+img
          },
          wishListRemove(id){
              axios.get("web/wishListRemove/"+id).then((res)=>{
                  this.$store.dispatch("wishList")
                    Toast.fire({
                        icon: 'success',
                        title: ' Product remove from WishList'
                        })
              })
          },

          addToCart(product){

					if(product.color_id && product.size_id){
							let data ={
							attribute :product,
							quanty : 1,
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
							quanty : 1,
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
      },

      computed:{
          wishLists(){
              return this.$store.getters.wishList
          }
      },
      mounted(){
          this.$store.dispatch("wishList")
      }
  }
</script>

