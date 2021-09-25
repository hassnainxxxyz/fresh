<template>
    <div>
        <div class="container-fluid">

            <div class="row min-vh-100">
                <header-com></header-com>
                <div class="col-12">

                    <main class="row">

                     <categories></categories>
                    </main>


                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "./Header";
    import Categories from "./CategoriesComponent";
    import Footer from "./Footer";
    export default {
        components: {
            headerCom: Header,
            footerCom: Footer,
            categories: Categories,
        },

    }
</script>

