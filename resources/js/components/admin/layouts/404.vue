<template>
    <div>
        <nav-com></nav-com>
        <slider></slider>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <div>
                `
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>404 Error Page</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                                    <li class="breadcrumb-item active">404 Error Page</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>




                <section class="content">
                    <div class="error-page">
                        <h2 class="headline text-warning"> 404</h2>

                        <div class="error-content">
                            <h3><i class="fa fa-warning text-warning"></i> Oops! Page not found.</h3>

                            <p>
                                We could not find the page you were looking for.
                                Meanwhile, you may <router-link :to="{name: 'home'}">return to dashboard</router-link> or try using the search form.
                            </p>

                            <!--<form class="search-form">-->
                                <!--<div class="input-group">-->
                                    <!--<input type="text" name="search" class="form-control" placeholder="Search">-->

                                    <!--<div class="input-group-append">-->
                                        <!--<button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-search"></i>-->
                                        <!--</button>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--&lt;!&ndash; /.input-group &ndash;&gt;-->
                            <!--</form>-->
                        </div>
                        <!-- /.error-content -->
                    </div>
                    <!-- /.error-page -->
                </section>


            </div>
            <!-- /.content -->
        </div>

        <footer-com></footer-com>



    </div>
</template>

<script>
    import Footer from "./Footer";
    import Nav from "./Nav";
    import Slider from "./Slider";


    export default {

        components: {
            footerCom: Footer,
            navCom: Nav,
            slider: Slider,



        },
        mounted() {
            // let el = this.$el.getElementsByClassName('main-footer')[0];
            // el.classList.add('disappear');
        },

    }

</script>



