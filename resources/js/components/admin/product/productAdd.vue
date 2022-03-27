<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="card card-primary m-auto ">
                <div class="card-header">
                    <h3 class="card-title"> Product Add </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->


                <form role="form" @submit.prevent="productSave" enctype="multipart/form-data">
                    <div class="card-body ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Category Name </label>
                                <select name="category_id" @change.prevent="subcategoryNameGet" class="form-control"
                                    v-model="form.category_id" id="">
                                    <option value="" selected disabled> select category </option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{category.name}} </option>
                                </select>
                            <div class="text-danger" v-if="errors['category_id']"> {{errors['category_id'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Subategory Name </label>
                                <select name="subcategory_id" class="form-control" v-model="form.subcategory_id" id="">
                                    <option value="" selected disabled> select subcategory </option>
                                    <option v-for="subcategory in subcategories" :key="subcategory.id"
                                        :value="subcategory.id"> {{subcategory.name}} </option>
                                </select>
                                <div class="text-danger" v-if="errors['subcategory_id']"> {{errors['subcategory_id'][0]}} </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Brand Name </label>
                                <select name="brand_id" class="form-control" v-model="form.brand_id" id="">
                                    <option value="" selected disabled> select brand </option>
                                    <option v-for="brand in brands" :key="brand.id" :value="brand.id"> {{brand.name}}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="errors['brand_id']"> {{errors['brand_id'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Name </label>
                                <input type="text" class="form-control" name="name" placeholder="name"
                                    v-model="form.name" id="">
                                    <div class="text-danger" v-if="errors['name']"> {{errors['name'][0]}} </div>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Title </label>
                                <input type="text" class="form-control" name="title" placeholder="title"
                                    v-model="form.title" id="">
                                    <div class="text-danger" v-if="errors['title']"> {{errors['title'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Sku </label>
                                <input type="text" class="form-control" name="sku" placeholder="sku" v-model="form.sku"
                                    id="">
                                    <div class="text-danger" v-if="errors['sku']"> {{errors['sku'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Image </label>
                                <input type="file" @change.prevent="imageShow($event)" class="form-control" name="image"
                                    :v-model="form.image" id="">
                                <div class="text-danger" v-if="errors['image']"> {{errors['image'][0]}} </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Description </label>
                                <textarea name="description" id="" class="form-control" v-model="form.description"
                                    cols="" rows=""> </textarea>
                                    <div class="text-danger" v-if="errors['description']"> {{errors['description'][0]}} </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Price </label>
                                <input type="text" class="form-control" placeholder="" name="price" v-model="form.price"
                                    id="">
                                    <div class="text-danger" v-if="errors['price']"> {{errors['price'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount </label>
                                <input type="text" class="form-control" placeholder="discount" name="discount"
                                    v-model="form.discount" id="">
                                    <div class="text-danger" v-if="errors['discount']"> {{errors['discount'][0]}} </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Stock </label>
                                <input type="text" class="form-control" name="stock" v-model="form.stock" id="">
                                <div class="text-danger" v-if="errors['stock']"> {{errors['stock'][0]}} </div>
                            </div>
                        </div>

                        <!-- Product attribute  -->
                   <div class="col-lg-6">

                            <div v-if="addAttribute">

                                <h3> Product attribute </h3>

                                <div v-for="(item,index) in form.items" :key="index" class="row mt-4">

                                    <div class="col-lg-4 ">
                                        <label for=""> Color </label>
                                        <select name="color_id" class="form-control" v-model="item.color_id" id="">
                                            <option value="" selected disabled> select color </option>
                                            <option v-for="color in colors" :key="color.id" :value="color.id">
                                                {{color.name}} </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for=""> Size </label>
                                        <select name="size_id" class="form-control" v-model="item.size_id" id="">
                                            <option value="" selected disabled> select size </option>
                                            <option v-for="size in sizes" :key="size.id" :value="size.id">
                                                {{size.name}} </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for=""> Stock </label>
                                        <input type="text" class="form-control" name="stock" v-model="item.stock" id="">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for=""> Price </label>
                                        <input type="text" class="form-control" name="price" v-model="item.price" id="">
                                    </div>


                                    <div class="col-lg-4" style="margin-top:30px ">
                                        <button class="btn btn-danger" v-if="deleteBtn"
                                            @click.prevent="deleteItem(index)"> deleteItem
                                        </button>
                                    </div>
                                </div>

                                <div style="margin-top:30px">
                                    <button class="btn btn-danger" @click.prevent="addItem"> addItem </button>
                                </div>

                            </div>

                        </div>

                        <div style="margin-top:30px">
                            <button @click.prevent="attributeShow" class="btn btn-success"> Attribute </button>
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

</template>

<script>
    import axios from 'axios'
    import Form from 'vform'
    export default {
        data() {
            return {

                addAttribute:false,
                deleteBtn:false,

                errors: [],
                form: {

                    category_id: "",
                    subcategory_id: "",
                    brand_id: "",
                    name: "",
                    title: "",
                    sku: "",
                    image: "",
                    description: "",
                    price: "",
                    stock: "",
                    discount: "",
                    items :[

                    ]

                }

            }
        },
        mounted() {
            let admin = localStorage.getItem("adminUser")
            if (!admin && admin == null) {
                this.$router.push("/admin");
            }


            this.$store.dispatch("getSize")
            this.$store.dispatch("getColor")
            this.$store.dispatch("getCategory")
            this.$store.dispatch("getBrand")


        },
        computed: {

            categories() {
                return this.$store.getters.getCategory
            },
            brands() {
                return this.$store.getters.getBrand
            },
            subcategories() {
                return this.$store.getters.getSubCategory
            },
            colors (){
                return this.$store.getters.getColor
            },
             sizes (){
                return this.$store.getters.getSize
            },


        },

        methods: {

            deleteItem(index){
                this.form.items.splice(index,1)
                // if(this.form.items.length<2){
                //     this.deleteBtn = false
                // }
            },
            addItem(){
                let item = {
                    color_id:"",
                    size_id :"",
                    price:"",
                    stock:"",
                }
                this.form.items.push(item);
                this.deleteBtn = true
                // if(this.form.items.length>1){
                //     this.deleteBtn = true
                // }
            },
            attributeShow(){
                this.addAttribute =! this.addAttribute
            },

            subcategoryNameGet() {
                this.$store.dispatch("subcategoryNameGet", this.form.category_id)
            },


            imageShow(event) {
              this.form.image = event.target.files[0]

            },


            productSave() {
                 const data = new FormData();
                 data.append("title",this.form.title)
                 data.append("image",this.form.image)
                 data.append("name",this.form.name)
                 data.append("category_id",this.form.category_id)
                 data.append("subcategory_id",this.form.subcategory_id)
                 data.append("sku",this.form.sku)
                 data.append("description",this.form.description)
                 data.append("price",this.form.price)
                 data.append("discount",this.form.discount)
                 data.append("stock",this.form.stock)
                 data.append("brand_id",this.form.brand_id)
                 data.append("items",JSON.stringify(this.form.items))

                axios.post("/productSave", data).then((res) => {
                        this.$router.push("/productList");
                        Toast.fire({
                            icon: 'success',
                            title: ' Product add success '
                        })


                }).catch((e)=> {
                     this.errors = e.response.data.errors
                })
            },







        },



    }

</script>
