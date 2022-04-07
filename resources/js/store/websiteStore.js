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
        userOrderCencel: {},
        categoryProduct: {},
        subcategoryProduct: {},

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
        },

        userOrderCencel(state) {
            return state.userOrderCencel
        },
        categoryProduct(state) {
            return state.categoryProduct
        },
    subcategoryProduct(state) {
                return state.subcategoryProduct
            },


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
                console.log(res.data)
                context.commit("singleProduct",res.data)
            })
        },
         category(context) {
            axios.get("/web/category").then((res) => {

                context.commit("category",res.data.category)
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
                context.commit("wishList", res.data.wishList)
               })
        },
        // cart store
        cart(context) {
            axios.get("web/cart").then((res) => {
                context.commit("cart",res.data)

            })
        },
        // user order get userOrderCencel
        userOrder(context) {
            axios.get("/web/userOrder").then((res) => {
                context.commit("userOrder",res.data.order)
            })
        },
        // order cencel
         userOrderCencel(context) {
            axios.get("/web/userOrderCencel").then((res) => {
                context.commit("userOrderCencel",res.data.userOrderCencel)
            })
        },

         // cateogory product
        categoryProduct(context,payload) {
            axios.get("web/categoryProduct/"+payload).then((res) => {

                context.commit('categoryProduct',res.data.categoryProduct)
             })
         },
        subcategoryProduct(context,payload) {
            axios.get("web/subcategoryProduct/"+payload).then((res) => {
                console.log(res.data)
                context.commit('subcategoryProduct',res.data.subcategoryProduct)
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
        // userOrderCencel
        userOrder(state, data) {
            return state.userOrder = data
        },
         userOrderCencel(state, data) {
            return state.userOrderCencel = data
         },

         // category product
         categoryProduct(state, data) {
             return state.categoryProduct = data
        },
        subcategoryProduct(state, data) {
             return state.subcategoryProduct = data
         }
    }
}



