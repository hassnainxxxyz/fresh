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
                                            <h2><span>Latest Products </span></h2>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <!-- Product -->
                                        <div class="col-lg-3 col-sm-6 my-3" v-for="product in laravelData.data" :key="product.id">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <router-link :to="'/products/'+product.slug" class="product-name">
                                                            <img :src="'/uploads/images/'+product.images.main" class="img-fluid">
                                                        </router-link>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <router-link :to="'/products/'+product.slug" class="product-name">{{product.name}}</router-link>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        ${{product.price + (Math.round(product.price / 4))}}
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






                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <pagination :data="laravelData" @pagination-change-page="getResults">

                                </pagination>
                            </div>
                        </div>

                        <top-footer></top-footer>
                    </main>
                    <!-- Main Content -->

                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "../layouts/Header";
    import TopFooter from "../layouts/TopFooter";
    import Footer from "../layouts/Footer";
    export default {
        beforeCreate() {
            scroll(0, 0);




        },
        data() {
            return {

                laravelData: {},
            };
        },
        components: {
            headerCom: Header,
            topFooter: TopFooter,
            footerCom: Footer,
        },


        mounted() {
            this.getResults();


        },
        methods: {
            getResults(page = 1) {
                axios.get(APIURL+'/api/latest-products?page=' + page)
                    .then(response => {
                        this.laravelData = response.data;
                    });
            },
            addToCart(s) {
                addToCart(s);
            },
        },

    }
</script>










