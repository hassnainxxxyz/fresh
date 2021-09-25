import Home from "../components/admin/Home";
import Logout from "../components/layouts/Logout";
import MainContent from "../components/admin/layouts/Maincontent";
import AllProducts from "../components/admin/layouts/products/AllProducts";
import ProductEdit from "../components/admin/layouts/products/ProductEdit";
import ProductCreate from "../components/admin/layouts/products/ProductCreate";
import FourOfFour from "../components/admin/layouts/404";
import TrashedProducts from "../components/admin/layouts/products/TrashedProducts";

import Categories from "../components/admin/layouts/categories";
import CategoryEdit from "../components/admin/layouts/categories/Edit";
import CreateCategory from "../components/admin/layouts/categories/Create";

import Contact from "../components/admin/layouts/Contact";


const routes = [
    {path: '/admin/dashboard', component: Home, name: 'admin.home',
        children: [


            {path: "", component: MainContent, name: 'home'},
            {path: "products", component: AllProducts, name: 'all.products'},
            {path: "products/create", component: ProductCreate, name: 'product.create'},
            {path: "products/trashed", component: TrashedProducts, name: 'trashed.products'},
            {path: "products/:slug/edit", component: ProductEdit, name: 'product.edit'},


            {path: "categories", component: Categories, name: "categories.all"},
            {path: "categories/:id/edit", component: CategoryEdit, name: "category.edit"},
            {path: "categories/create", component: CreateCategory, name: "category.create"},





            {path: "contact", component: Contact, name: "contact"},




        ],


},

    {path: '/logout', component: Logout, name: 'admin.logout'},

    {path: '*', component: FourOfFour, name: '404'},







];

export default routes;



