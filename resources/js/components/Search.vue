<template>
    <div>
        <div class="container-fluid">

            <div class="row min-vh-100">
                <header-com></header-com>
                <div class="col-12">

                    <main class="row">


                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 py-3">
                                    <div class="row">
                                        <div class="col-12 text-center text-uppercase">
                                            <h2>You Searched for <u> <b> {{$route.params.query}} </b></u></h2>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <!-- Product -->
                                        <div class="col-xl-2 col-lg-3 col-sm-6 my-3"  v-for="product in laravelData.data">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100" >
                                                    <div class="col-12 p-0 mb-3">
                                                        <router-link :to="{name: 'show.product', params: {slug: product.slug}}">
                                                            <img :src="'/uploads/images/'+product.images.main" class="img-fluid">
                                                        </router-link>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <router-link  :to="{name: 'show.product', params: {slug: product.slug}}" class="product-name">{{product.name}}</router-link>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        ${{product.price+500}}
                                                    </span>
                                                        <br>
                                                        <span class="product-price">
                                                        ${{product.price}}
                                                    </span>
                                                    </div>
                                                    <div class="col-12 mb-3 align-self-end">
                                                        <button @click="addToCart(product.slug)" class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product -->

                                        <!-- Product -->






                                    </div>
                                </div>
                            </div>



                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <pagination :data="laravelData" @pagination-change-page="getResults">

                                    </pagination>
                                </div>
                            </div>
                        </div>





                    </main>


                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "./layouts/Header";
    import Categories from "./layouts/CategoriesComponent";
    import Footer from "./layouts/Footer";
    export default {
        components: {
            headerCom: Header,
            footerCom: Footer,
            categories: Categories,
        },
        data() {
          return {
           laravelData: {},
              query: this.$route.params.query,
          };
        },
        computed: {
            theQuery() {
                return this.query;
            },
            theLaravelData() {
                return this.laravelData;
            },

        },


        mounted() {
            this.getResults();
         BUS.$on('findProduct', ev => {
             this.query = ev;
             this.getResults();

         });



        },
        methods: {
            getResults(page = 1) {
                axios.get(APIURL+'/api/search/'+this.theQuery+'?page=' + page)
                    .then(response => {

                        if(response.data) {

                            this.laravelData = response.data;
                        } else {
                            this.laravelData = {};
                        }
                    });
            },
            addToCart(s) {
              addToCart(s);
            },
        },







    }
</script>

