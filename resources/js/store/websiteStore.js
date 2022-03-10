import axios from "axios"

export const storeData = {

    state: {
        user: '',
        product: [],
        singleProduct: '',
        category: [],
        sizes: [],
        colors: [],
        brands: [],
        sideBarInfo: {},
        quickShop: {},
        wishList: {},
        cart: {},
        userOrder: {},

    },
    getters: {
        loginUser(state) {
            return state.user
        },
        productsAllIn(state) {
            return state.product
        },
        singleProduct(state) {
            return state.singleProduct
        },
        category(state) {
            return state.category
        },
        getSize(state) {
            return state.sizes
        },

        colors(state) {
            return state.colors
        },

        brands(state) {
            return state.brands
        },
        allSideBarInfo(state) {
          return state.sideBarInfo
        },
         quickShopProducts(state) {
          return state.quickShop
        },
        wishList(state) {
            return state.wishList
        },
        cart(state) {
            return state.cart
        },
        userOrder(state) {
            return state.userOrder
        }


    },
    actions:{

        userLogOUt(context){
            axios.get("/userLogOut").then((res) => {
                context.commit("logInUser",res.data.user)
            })
        },
        user(context){
            axios.get("/user").then((res) => {
                context.commit("user",res.data.user)
            })
        },

        logInUser(context){
            axios.get("/getUser").then((res) => {
                context.commit("logInUser",res.data.user)
            })
        },

        allProduct(context) {
            axios.get("/web/allProduct/").then((res) => {
                context.commit("getProductAll",res.data.products)
            })
        },
        singleProduct(context) {
            axios.get("/web/singleProduct").then((res) => {
                context.commit("singleProduct",res.data.product)
            })
        },
         category(context) {
            axios.get("/web/category").then((res) => {

                context.commit("category",res.data.category)
            })
        },
          quickView(context,payload) {
            axios.get("/web/quickView/"+payload).then((res) => {
              context.commit("singleProduct",res.data.product)
            })
        },

        allColor(context) {
            axios.get("/web/allColor/").then((res) => {
                  context.commit("color",res.data.colors)
              })
        },
        allSize(context) {
              axios.get("/web/allSize/").then((res) => {
                   context.commit("size",res.data.sizes)

              })
          },
           allBrand(context) {
               axios.get("/web/allBrand/").then((res) => {
                   context.commit("brand",res.data.brands)

              })
        },
        productFiler(context,payload) {
               axios.get("/web/productFiler/"+payload).then((res) => {
               context.commit("getProductAll",res.data.products)

              })
          },
        sideBarInfo(context) {
            axios.get("/web/sideBarInfo/").then((res) => {

                   context.commit("sideBarInfo",res.data)

              })
          },
           quickViewProduct(context,payload) {
            axios.get("/web/quickViewProduct/"+payload).then((res) => {
                context.commit("quickViewShop",res.data)


              })
          },
          // wishlist product
        wishList(context) {
            axios.get("web/wishListAll").then((res) => {
                console.log(res.data.wishList)
                context.commit("wishList", res.data.wishList)
               })
        },
        cart(context) {
            axios.get("web/cart").then((res) => {
                context.commit("cart",res.data)
                console.log(res.data);
            })
        },
        // user order get
        userOrder(context) {
            axios.get("/web/userOrder").then((res) => {
                context.commit("userOrder",res.data.order)
            })
        }


    },

    mutations:{
        logInUser(state,data){
            return state.user = data
        },
         user(state,data){
            return state.user = data
        },
        getProductAll(state,data) {
            return state.product = data
        },
         singleProduct(state,data) {
            return state.singleProduct = data
        },
        category(state,data) {
            return state.category = data
        },
         color(state,data) {
            return state.colors = data
        },
          size(state,data) {
            return state.sizes = data
        },
        brand(state,data) {
            return state.brands = data
        },
         sideBarInfo(state,data) {
            return state.sideBarInfo = data
        },
        quickViewShop(state,data) {
            return state.quickShop = data
        },
        wishList(state, data) {
            return state.wishList = data
        },
        cart(state, data) {
            return state.cart = data
        },
        userOrder(state, data) {
            return state.userOrder = data
        }
    }
}



