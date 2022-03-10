<template>
    <div>
        <div class="content-wrapper row">
            <!-- Content Header (Page header) -->

            <div class="">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h1> Product List </h1>
                        <div class="text-right">
                            <router-link to="/productAdd" class="btn btn-success"> Add </router-link>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Category </th>
                                    <th scope="col">Subcategory</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">statu</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product,index in products" :key="product.id">
                                    <td> {{index+1}} </td>
                                    <td> {{product.created_at |formatDate}} </td>
                                    <td> {{product.name ? product.name : ""}} </td>
                                    <td> {{product.title ? product.title : ""}} </td>
                                    <td> {{product.sku ? product.sku : ""}} </td>
                                    <td> <img :src="showImge(product.image)" height="100px" alt=""> </td>
                                    <td> {{product.description ? product.description:"" | strShort(25,".....") }} </td>
                                    <td> {{product.price ? product.price : ""}} </td>
                                    <td> {{product.stock ? product.stock : ""}} </td>
                                    <td> {{product.discount ? product.discount: ""}} %</td>
                                    <td> {{product.category_id ? product.category.name :"" }} </td>
                                    <td> {{ product.subcategory_id ? product.subcategory.name : ""}} </td>
                                    <td> {{ product.brand_id ? product.brand.name : ""}} </td>
                                    <td>
                                        <button class="btn btn-success" v-if="product.statu == 1"
                                            @click.prevent="changeProductStatu(product.id)"> Active </button>
                                        <button @click.prevent="changeProductStatu(product.id)" class="btn btn-danger"
                                            v-else> Unactive </button>
                                    </td>
                                    <td>
                                        <router-link :to='"/productEdit/"+product.id' class="btn btn-success"> edit
                                        </router-link>
                                        <button class="btn btn-danger" @click.prevent="deleteProduct(product.id)">
                                            delete </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->

</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {

            }
        },
        mounted() {

            let admin = localStorage.getItem("adminUser")
            if (!admin && admin == null) {
                this.$router.push("/admin");
            }

            this.$store.dispatch("getColor")
            this.$store.dispatch("getProductList")

        },
        computed: {
            colors() {
                return this.$store.getters.getColor
            },
            products() {
                return this.$store.getters.getProduct
            }
        },
        methods: {

            changeProductStatu(id) {
                axios.get("/productStatu/" + id).then((res) => {
                    this.$store.dispatch("getProductList")
                    if (res.data.statu == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: ' Statu Active '
                        })
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: ' Statu Unactive '
                        })
                    }

                })
            },
            showImge($image) {
                if ($image) {
                    return "image/" + $image
                }

            },

            deleteProduct(id) {
                axios.get("/deleteProduct/" + id).then((res) => {
                    this.$store.dispatch("getProductList")
                    Toast.fire({
                        icon: 'success',
                        title: ' Product delete success '
                    })

                })
            }
        }

    }

</script>
