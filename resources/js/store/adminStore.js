import axios from "axios"


export const storeData = {


    // state ///////////////////////////// state /////////////// state ////////////
    state:{
        category:[],
        subCategory:[],
        brand :[],
        size :[],
        color :[],
        product: [],
        coupon: [],
        order: {},
        orderCencel: {},

    },

    /// getters ///////////////////// getteres //////////////////////////////////////////////////
    getters:{
        // category
        getCategory(state){
            return state.category
        },
        // subCategory
        getSubCategory(state){
            return state.subCategory
        },
        // barnd
        getBrand(state){
            return state.brand
        },
        // size
        getSize(state){
            return state.size
        },
        // color
        getColor(state){
            return state.color
        },
        cat_idWiseSubcategory(state) {
            return state.catWiseSub
        },

        // product
        getProduct(state) {
            return state.product
        },
        coupon(state) {
            return state.coupon
        },
        order(state) {
            return state.order
        },
        orderCencel(state) {
            return state.orderCencel
        },
    },



 // actiion  /////////////////////////////////// aciton /////////////////// action //////////////////////////////////////////
    actions:{
        // amdin user logout
        adminLogOut(){
            axios.get("/adminLogOut").then((res)=>{

            })
        },
        // admin user get
        getAdminUser(){
            axios.get("/adminUserGet").then((res)=>{

            })
        },

        // get category
        getCategory(context){
            axios.get("/allCategory/").then((res)=>{
                context.commit("categoryGet",res.data.category)
            });
        },
        //category search
        searchCategory(context,payload){
            axios.get("/getCategorySearch/" + payload).then((res) => {
                context.commit("categoryGet",res.data.category)

            })

        },
            // get subcategory

        getSubCategory(context){
            axios.get("/allSubcategory").then((res)=>{
                context.commit("subCategoryGet",res.data.subCategory)
            })
        },
        getSearchSubcategory(context,payload) {
            axios.get("/searchSubcategory/" + payload).then((res) => {
                console.log(res.data.subCategory);
                context.commit("subCategoryGet", res.data.subCategory);
            })
        },
        subcategoryNameGet(context,payload) {
            axios.get("/categoryWiseSubcategory/" + payload).then((res) => {

                 context.commit("subCategoryGet", res.data.subCategory)
            })
        },
        //  get brand
        getBrand(context){
            axios.get("/getBrand").then((res)=>{
                 context.commit("brandGet",res.data.brand)
            })
        },

        // search brand
        getSearchBrand(context, payload) {
            axios.get("/searchBrand/" + payload).then((res) => {

               context.commit("brandGet",res.data.brand)
            })
        },
        // get size
        getSize(context){
            axios.get("/getSize").then((res)=>{

                 context.commit("sizeGet",res.data.size)
            })
        },
        // get Color
        getColor(context){
            axios.get("/getColor").then((res)=>{
                // console.log(res.data)
                 context.commit("colorGet",res.data.color)
            })
        },



        getProductList(context) {
            axios.get("/getProduct").then((res) => {

                context.commit("allProduct",res.data.product)
            })
        },
        edtiSubcategory(context, payload) {
           axios.get("/editGetSubcategory/"+payload).then((res) => {
            context.commit("subCategoryGet",res.data.subcategory)

            })
        },

         getCoupon(context) {
            axios.get("/couponList").then((res) => {
                context.commit("coupon",res.data.coupon)
            })
        },order(context) {
            axios.get("/allOrder").then((res) => {
                context.commit("order",res.data.order)
            })

         },
        order(context) {
            axios.get("/allOrder").then((res) => {
                context.commit("order",res.data.order)
            })

        },
        orderCencel(context) {
            axios.get("/allOrderCencel").then((res) => {
                console.log(res.data.orderCencel);
                context.commit("orderCencel",res.data.orderCencel)
            })

         }


    },







//// mutation   //////////////////////  mutation   /////////////////////////////////////////
    mutations:{
        // category
        categoryGet(state,data){
            return state.category = data;
        },
        // subcategory
        subCategoryGet(state,data){
            return state.subCategory = data;
        },
        //brand
        brandGet(state,data){
            return state.brand=data
        },
        //size
        sizeGet(state,data){
            return state.size=data
        },
        // color
        colorGet(state,data){
            return state.color=data
        },

        allProduct(state, data) {
            return state.product = data
        },
        coupon(state, data) {
            return state.coupon = data
        },
        order(state, data) {
            return state.order = data
        },

        orderCencel(state, data) {
            return state.orderCencel = data
        }


    }



}

