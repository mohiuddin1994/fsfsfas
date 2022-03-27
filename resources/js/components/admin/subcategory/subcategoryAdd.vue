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
                    <form role="form" @submit.prevent="subCategoryAdd">


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
                            <button type="submit" class="btn btn-primary">Submit</button>
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
            subCategoryAdd() {

                this.form.post("/subcategoryAdd").then((res) => {
                    console.log(res.data)

                    Toast.fire({
                        icon: 'success',
                        title: ' category add success '
                    })

                    this.$router.push("/subcategoryList")


                })
            }
        },
        mounted() {
           let admin = localStorage.getItem("adminUser")
                 if(!admin && admin == null){
                    this.$router.push("/admin");
                }
            this.$store.dispatch("getCategory")
        },
        computed: {
            categories() {
                return this.$store.getters.getCategory
            }
        },
    }

</script>
