
import adminLogin from "../components/admin/adminAuth/adminLogin"
import adminDashboard from "../components/admin/adminMasterFile/adminHome"
import categoryAdd from "../components/admin/category/categoryAdd"
import categoryEdit from "../components/admin/category/categoryEdit"
import categoryList from "../components/admin/category/categoryList"
import subcategoryAdd from "../components/admin/subcategory/subcategoryAdd"
import subcategoryEdit from "../components/admin/subcategory/subcategoryEdit"
import subcategoryList from "../components/admin/subcategory/subcategoryList"
import brandAdd from "../components/admin/brand/brandAdd"
import brandEdit from "../components/admin/brand/brandEdit"
import brandList from "../components/admin/brand/brandList"

import colorAdd from "../components/admin/color/colorAdd"
import colorEdit from "../components/admin/color/colorEdit"
import colorList from "../components/admin/color/colorList"

import sizeAdd from "../components/admin/size/sizeAdd"
import sizeEdit from "../components/admin/size/sizeEdit"
import sizeList from "../components/admin/size/sizeList"

import productAdd from "../components/admin/product/productAdd"
import productEdit from "../components/admin/product/productEdit"
import productList from "../components/admin/product/productList"

import coupon from "../components/admin/coupon/coupon"
import couponEdit from "../components/admin/coupon/couponEdit"

import order from "../components/admin/order/order"
import orderView from "../components/admin/order/orderView"
import orderCencel from "../components/admin/order/orderCencel"




export const routes = [

    //admin route

    {
        path:"/admin",
        component:adminLogin,
        name:"adminLogin",
    },

    {
        path:"/admin/dashboard",
        component:adminDashboard,
        name:"adminDashboard",
    },



    // category route
    {
        path:"/categoryAdd",
        component:categoryAdd,
        name:"categoryAdd"
    },
    {
        path:"/categoryEdit/:id",
        component:categoryEdit,
        name:"categoryEdit"
    },
    {
        path:"/categoryList",
        component:categoryList,
        name:"categoryList"
    },


    // subcategory route
    {
        path:"/subcategoryAdd",
        component:subcategoryAdd,
        name:"subcategoryAdd"
    },
    {
        path:"/subcategoryEdit/:id",
        component:subcategoryEdit,
        name:"subcategoryEdit"
    },
    {
        path:"/subcategoryList",
        component:subcategoryList,
        name:"subcategoryList"
    },
    // brand route
    {
        path:"/brandAdd",
        component:brandAdd,
        name:"brandAdd"
    },
    {
        path:"/brandEdit/:id",
        component:brandEdit,
        name:"brandEdit"
    },
    {
        path:"/brandList",
        component:brandList,
        name:"brandList"
    },
    // Size route
    {
        path:"/sizeAdd",
        component:sizeAdd,
        name:"sizeAdd"
    },
    {
        path:"/sizeEdit/:id",
        component:sizeEdit,
        name:"sizeEdit"
    },
    {
        path:"/sizeList",
        component:sizeList,
        name:"sizeList"
    },
    // color route
    {
        path:"/colorAdd",
        component:colorAdd,
        name:"colorAdd",
    },
    {
        path:"/colorEdit/:id",
        component:colorEdit,
        name:"colorEdit"
    },
    {
        path:"/colorList",
        component:colorList,
        name:"colorList"
    },
     {
        path:"/productAdd",
        component:productAdd,
        name:"productAdd",
    },
    {
        path:"/productEdit/:id",
        component:productEdit,
        name:"productEdit"
    },
    {
        path:"/productList",
        component:productList,
        name:"productList"
    },

    {
        path:"/coupon",
        component:coupon,
        name:"coupon"
    },
    {
        path:"/couponEdit/:id",
        component:couponEdit,
        name:"couponEdit"
    },
    {
        path:"/order",
        component:order,
        name:"order"
    },
    {
        path:"/orderView/:id",
        component:orderView,
        name:"orderView"
    },
    {
        path:"/orderCencel",
        component:orderCencel,
        name:"orderCencel"
    },

]
