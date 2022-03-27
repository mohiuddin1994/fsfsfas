
import home from "../components/website/websitMasterFile/websiteHome"
import login from "../components/website/userAuth/userLogin"
import register from "../components/website/userAuth/userRegister"
import dashboard from "../components/website/userAuth/userDashboard"
import userSetting from "../components/website/userAuth/setting"
import userOrder from "../components/website/userAuth/userOrder"
import userOrderView from "../components/website/userAuth/userOrderView"
import userOrderCencel from "../components/website/userAuth/userOrderCencel"
import shop from "../components/website/page/shopPage"
import wishList from "../components/website/page/wishList"
import cart from "../components/website/page/cart"
import checkout from "../components/website/page/checkout"
import category from "../components/website/page/category"
import subcategory from "../components/website/page/subcategory"


export const routes = [


    {
        path:"/",
        component:home,
        name:"home"
    },
    {
        path:"/login",
        component:login,
        name:"login",
    },
    {
        path:"/register",
        component:register,
        name:"register"
    },
    {
        path:"/dashboard",
        component:dashboard,
        name:"dashboard",

    },

     {
        path:"/shop",
        component:shop,
        name:"shop",

    },
      {
        path:"/wishList",
        component:wishList,
        name:"wishList",

    },
       {
        path:"/cart",
        component:cart,
        name:"cart",

    },
     {
        path:"/checkout",
        component:checkout,
        name:"checkout",

    },
    {
        path:"/userOrder",
        component:userOrder,
        name:"userOrder",

    },
    {
        path:"/userOrderCencel",
        component:userOrderCencel,
        name:"userOrderCencel",

    },
     {
        path:"/userSetting",
        component:userSetting,
        name:"userSetting",

    },
    {
        path:"/userOrderView/:id",
        component:userOrderView,
        name:"userOrderView",

    },
    {
        path:"/category/:id",
        component:category,
        name:"category",

    },
    {
        path:"/subcategory/:id",
        component:subcategory,
        name:"subcategory",

    },




]
