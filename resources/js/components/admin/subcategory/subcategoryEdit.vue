<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="col-lg-6 m-auto">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title"> Subcategory Add </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" @submit.prevent="subcategoryUpdate">


                        <div class="card-body">

                            <div class="form-group">
                                <select name="category_id" v-model="form.category_id" id="" class="form-control">
                                    <option value="" selected> select category </option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{category.name}} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Subcategory Name </label>
                                <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter category name ">
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
    export default {
        data() {
            return {
                form: new Form({
                    name: "",
                    category_id: "",
                })
            }
        },
        methods: {
            // update function
            subcategoryUpdate() {
                this.form.post("/subcategoryUpdate/"+ this.$route.params.id).then((res) => {
                    Toast.fire({
                        icon: 'success',
                        title: ' category add success '
                    })
                    this.$router.push("/subcategoryList")

                })
            },
            // delete method

        },
        mounted() {
            // admin user
           let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }
            // get category
            this.$store.dispatch("getCategory")
            // get subcategory
            this.form.get("/subcategoryEdit/"+this.$route.params.id).then((res)=>{
                this.form.fill(res.data.subcategory)


            })
        },
        computed: {
            // category computed
            categories() {
                return this.$store.getters.getCategory
            }
        },
    }

</script>
