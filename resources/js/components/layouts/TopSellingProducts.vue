<template>
    <div class="col-12">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row">
                    <div class="col-12 text-center text-uppercase">
                        <h2><router-link style="color: #212529 !important;" :to="{name: 'top.selling.products.all'}"> Top Selling Products  </router-link></h2>
                    </div>
                </div>
                <div class="row">

                    <!-- Product -->
                    <div class="col-lg-3 col-sm-6 my-3" v-for="product in products" :key="product.id">
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

</template>


<script>

    export default {
        data() {
            return {
                products: [],
                limit: 4,
            }
        },
        mounted() {
            axios({
                method: 'get',
                url: APIURL+`/api/top-selling-products/get/${this.limit}`,
            })
                .then(res => {

                    if(res.data.data) {

                        this.products = res.data.data;


                    }

                })
                .catch(err => {
                    console.log(err);
                });
        },
        methods: {
            addToCart(s) {
                addToCart(s);
            },

        },
    }



</script>





