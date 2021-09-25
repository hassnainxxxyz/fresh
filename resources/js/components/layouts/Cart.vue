<template>
    <div>
        <div class="container-fluid">

            <div class="row min-vh-100">
                <header-com></header-com>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3 text-center text-uppercase">
                            <h2>Shopping Cart</h2>
                        </div>
                    </div>


                    <main class="row">
                        <div class="col-12 bg-white py-3 mb-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                                    <form class="row">
                                        <div class="col-12">
                                            <table class="table table-striped table-hover table-sm">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="product in theItemObj.items">
                                                    <td>
                                                        <img :src="'/uploads/images/'+product.item.images.main" class="img-fluid">
                                                        {{product.item.name | shortName}}
                                                    </td>
                                                    <td>
                                                        ${{product.item.price}}
                                                    </td>
                                                    <td>
                                                        <input @change="updateQty($event, product.item.id)"
                                                               @keyup="updateQty($event, product.item.id)"
                                                               type="number" min="1" :value="product.qty">
                                                    </td>
                                                    <td>
                                                        ${{product.item.price * product.qty}}
                                                    </td>
                                                    <td>
                                                        <button  @click.prevent="removeItemFromCart(product.item.id)"
                                                                class="btn btn-link text-danger">
                                                            <i class="fas fa-times"></i></button>
                                                    </td>
                                                </tr>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-right">Total</th>
                                                    <th>${{theItemObj.totalPrice}}</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-12 text-right">
                                            <!--<button class="btn btn-outline-secondary mr-3" type="submit">Update</button>-->
                                            <router-link :to="{name: 'checkout'}" class="btn btn-outline-success">Checkout</router-link>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>





                    </main>
                    <!-- Main Content -->

                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "./Header";
    import Footer from "./Footer";
    export default {
        components: {
            headerCom: Header,
            footerCom: Footer,
        },
        data() {
          return {
            itemObj: {},
          };
        },
        computed: {
          theItemObj() {
              return this.itemObj;
          },
        },
        mounted() {
          this.itemObj = JSON.parse(localStorage.getItem('cart')) ?
              JSON.parse(localStorage.getItem('cart')): {};


          // console.log( JSON.parse(localStorage.getItem('cart')).items[1].item.images);
        },
        methods: {

            removeItemFromCart(id) {
                axios({
                    method: 'get',
                    url: APIURL+'/api/remove-from-cart/'+id,
                    headers: {
                        'authorization': "Bearer "+localStorage.getItem('token'),
                    }
                })
                    .then(res => {
                        if(res.data) {
                            this.itemObj = res.data;
                            BUS.$emit('removeItem', res.data);
                            localStorage.setItem('cart', JSON.stringify(res.data));
                        }
                    });

            },
            updateQty(ev, id) {
             if(ev.target.value) {
                 axios({
                     method: 'get',
                     url: APIURL + '/api/update-cart/' + id + '/' + ev.target.value,
                     headers: {
                         'authorization': "Bearer " + localStorage.getItem('token'),
                     },
                 })
                     .then(res => {
                         if(res.data) {
                           this.itemObj = res.data;
                             BUS.$emit('updateQty', res.data);
                           localStorage.setItem('cart', JSON.stringify(res.data));
                         }
                     });


             }

            },




        },
        filters: {
          shortName(val) {
              return val.substring(0, 10);
          }
        },


    }
</script>

