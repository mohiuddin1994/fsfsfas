<template>
    <div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href=" " class="brand-link">

                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                        <li class="nav-item">
                            <router-link to="/admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Category
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/categoryList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>category List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="/categoryAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>category Add </p>
                                    </router-link>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Subcategory
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/subcategoryList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>subcategory List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="subcategoryAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>subcategory Add </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Brand
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/brandList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="/brandAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand Add </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Size
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/sizeList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Size List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="sizeAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Size Add </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Color
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>


                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/colorList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Color List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="colorAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Color Add </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                         <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>

                                   Product
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/productList" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product List </p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link style="cursor:pointer" to="/productAdd" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Add </p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>  Coupon
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/coupon" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coupon </p>
                                    </router-link>
                                </li>

                            </ul>
                        </li>
                         <li class="nav-item">
                            <a style="cursor:pointer" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>  Order
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul  class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/order" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Order </p>
                                    </router-link>
                                </li>

                                 <li class="nav-item">
                                    <router-link to="/orderCencel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Order Cencel</p>
                                    </router-link>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a style="cursor:pointer" @click.prevent="amdinLogOut" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    LogOut

                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    methods:{
        amdinLogOut(){
            this.$store.dispatch("adminLogOut").then((res)=>{
                 Toast.fire({
                        icon: 'success',
                        title: 'logOUt success '
                    })
                 localStorage.removeItem("adminUser")
                 sessionStorage.removeItem("user")
                this.$router.push("/admin");
            })
        }
    }
}
</script>
