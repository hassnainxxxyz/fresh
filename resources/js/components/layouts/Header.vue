<template>
        <div class="col-12">
            <header class="row">
                <!-- Top Nav -->
                <div class="col-12 bg-dark py-2 d-md-block d-none">
                    <div class="row">
                        <div class="col-auto mr-auto">
                            <ul class="top-nav">
                                <li>
                                    <a href="/temp/tel:+123-456-7890" @click.prevent="true"><i class="fa fa-phone-square mr-2"></i>+92-3464605893</a>
                                </li>
                                <li>
                                    <a href="/temp/mailto:mail@ecom.com" @click.prevent="true"><i class="fa fa-envelope mr-2"></i>hassnainqureshixxxyzyzyz@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <ul class="top-nav">

                                <li v-if="!token">
                                    <router-link :to="{name: 'register'}"><i class="fas fa-user-edit mr-2"></i>Register</router-link>
                                </li>
                                <li v-if="!token">
                                    <router-link :to="{name: 'login'}"><i class="fas fa-sign-in-alt mr-2"></i>Login</router-link>
                                </li>

                                <li>
                                    <a href="/admin/dashboard" target="_blank" class="" v-if="isAdmin">
                                        <i class="fas fa-star-of-david"></i>

                                        Admin Dashboard
                                    </a>
                                </li>

                                <li v-if="token">
                                    <router-link :to="{name: 'logout'}"><i class="fas fa-sign-out-alt mr-2"></i>Logout</router-link>
                                </li>




                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Nav -->

                <!-- Header -->
                <div class="col-12 bg-white pt-4">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="site-logo text-center text-lg-left">
                                <router-link :to="{name: 'home'}">E-Commerce</router-link>
                            </div>
                        </div>
                        <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                            <form action="#" @submit.prevent="search($event)">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search"  class="form-control border-dark" placeholder="Search..." required>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-auto text-center text-lg-left header-item-holder">
                            <a href="/temp/#" class="header-item">
                                <!--<i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>-->
                            </a>
                            <router-link :to="{name: 'cart'}" class="header-item">
                                <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">{{theTotalQty}}</span>
                                <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">${{theTotalPrice}}</span>
                            </router-link>
                        </div>
                    </div>

                    <!-- Nav -->
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                            <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!--<div class="collapse navbar-collapse" id="mainNav">-->
                                <!--<ul class="navbar-nav mx-auto mt-2 mt-lg-0">-->
                                    <!--<li class="nav-item active">-->
                                        <!--<a class="nav-link" href="/temp/index.html">Home <span class="sr-only">(current)</span></a>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item dropdown">-->
                                        <!--<a class="nav-link dropdown-toggle" href="/temp/#" id="electronics" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronics</a>-->
                                        <!--<div class="dropdown-menu" aria-labelledby="electronics">-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Computers</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Mobile Phones</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Television Sets</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">DSLR Cameras</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Projectors</a>-->
                                        <!--</div>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item dropdown">-->
                                        <!--<a class="nav-link dropdown-toggle" href="/temp/#" id="fashion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion</a>-->
                                        <!--<div class="dropdown-menu" aria-labelledby="fashion">-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Men's</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Women's</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Children's</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Accessories</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Footwear</a>-->
                                        <!--</div>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item dropdown">-->
                                        <!--<a class="nav-link dropdown-toggle" href="/temp/#" id="books" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Books</a>-->
                                        <!--<div class="dropdown-menu" aria-labelledby="books">-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Adventure</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Horror</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Romantic</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Children's</a>-->
                                            <!--<a class="dropdown-item" href="/temp/category.html">Non-Fiction</a>-->
                                        <!--</div>-->
                                    <!--</li>-->
                                <!--</ul>-->
                            <!--</div>-->
                        </nav>
                    </div>
                    <!-- Nav -->

                </div>
                <!-- Header -->

            </header>
        </div>


</template>

<script>

    export default {
        data() {
          return {
             totalQty: JSON.parse(localStorage.getItem('cart')) ?
                 JSON.parse(localStorage.getItem('cart')).totalQty : 0,
              totalPrice: JSON.parse(localStorage.getItem('cart')) ?
                  JSON.parse(localStorage.getItem('cart')).totalPrice : 0,
          };
        },
        computed: {
            theTotalPrice() {
              return this.totalPrice;
            },
            theTotalQty() {
              return this.totalQty;
            },

          token() {
              return localStorage.getItem('token');
              // return this.$store.getters.getToken;
          },
            isAdmin() {
              if(localStorage.getItem('user')) {
                  return isAdmin(JSON.parse(localStorage.getItem('user')));

              }
              return false;
            }

        },
        created() {
          BUS.$on('addedToCart', ev => {
              this.totalQty = ev.totalQty;
              this.totalPrice = ev.totalPrice;


          });

            BUS.$on('removeItem', ev => {
                this.totalQty = ev.totalQty;
                this.totalPrice = ev.totalPrice;


            });


            BUS.$on('updateQty', ev => {
                this.totalQty = ev.totalQty;
                this.totalPrice = ev.totalPrice;


            });
        },
        mounted() {



        },
        methods: {
          search(ev) {

         BUS.$emit('findProduct', ev.target[0].value);
         this.$router.push({name: 'search', params: {query: ev.target[0].value}});




          },
        },
    }
</script>





