<template>
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
                    <div class="col-xl-2 col-lg-3 col-sm-6 my-3"  v-for="product in theLaravelData.data">
                        <div class="col-12 bg-white text-center h-100 product-item">
                            <div class="row h-100" >
                                <div class="col-12 p-0 mb-3">
                                    <a href="product.html">
                                        <img src="/temp/images/image-1.jpg" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-12 mb-3">
                                    <a href="product.html" class="product-name">{{product.name}}</a>
                                </div>
                                <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        $500
                                                    </span>
                                    <br>
                                    <span class="product-price">
                                                        $500
                                                    </span>
                                </div>
                                <div class="col-12 mb-3 align-self-end">
                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
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

</template>
<script>
    export default {
        data() {
          return {

              laravelData: {},
          };
        },
        computed: {
         theLaravelData() {
           return this.laravelData;
         },
        },
        mounted() {
            this.getResults();
            BUS.$on('findProduct', (ev) => {
                this.getResults();
               console.log(this.$route.params.query);
            });


        },
        created() {

            // axios({
            //     method: 'get',
            //     url: APIURL+'/api/search/'+this.$route.params.query,
            // })
            //     .then(res => {
            //         console.log(res.data.data);
            //         this.products = res.data.data;
            //     });










        },
        methods: {
            getResults(page = 1) {
                axios.get(APIURL+'/api/search/'+this.$route.params.query+'?page=' + page)
                    .then(response => {
                        if(response.data) {
                            this.laravelData = response.data;
                        }
                    });
            }
        },
    }
</script>


