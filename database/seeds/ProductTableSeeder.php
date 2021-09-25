<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        FEATURED PRODUCTS FACTORY

        $limit = 50;
        factory('App\Product', $limit)->create();


        foreach(Product::all() as $p) {
            $img = new ProductImage();
            $img->one = '1st.jpg';
            $img->two = '2nd.jpg';
            $img->three = '3rd.jpg';
            $p->images()->save($img);



            $p->categories()->attach(1);
        }




        $limit = 50;
        factory('App\Product', $limit)->create();


        foreach(Product::all() as $p) {
            $img = new ProductImage();
            $img->one = '1st.jpg';
            $img->two = '2nd.jpg';
            $img->three = '3rd.jpg';
            $p->images()->save($img);



            $p->categories()->attach(2);
        }



        $limit = 50;
        factory('App\Product', $limit)->create();


        foreach(Product::all() as $p) {
            $img = new ProductImage();
            $img->one = '1st.jpg';
            $img->two = '2nd.jpg';
            $img->three = '3rd.jpg';
            $p->images()->save($img);



            $p->categories()->attach(3);
        }






//        END FEATURED PRODUCTS FACTORY




//
//        $one = Product::create(['name' => 'HP Computer', 'description' => 'This is the hp computer',
//            'slug' => 'hp-computer',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//            ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $one->images()->save($img);
//        $one->categories()->attach([1]);
//
//
//
//        $two = Product::create(['name' => 'Red Jeans', 'description' => 'There are the jeans paints',
//            'slug' => 're-jeans',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $two->images()->save($img);
//        $two->categories()->attach([1]);
//
//
//
//
//
//
//
//        $three = Product::create(['name' => 'Blue T Shirt', 'description' => 'These are the blue t shirts',
//            'slug' => 'blue-t-shirt',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $three->images()->save($img);
//        $three->categories()->attach([1]);
//
//
//
//
//
//
//
//        $four = Product::create(['name' => 'Pink Nighty', 'description' => 'These are the pink nighties for ladies',
//            'slug' => 'pink-nighty',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $four->images()->save($img);
//        $four->categories()->attach([1]);
//
//
//
//
//
//
//        $five = Product::create(['name' => 'Dell Computer', 'description' => 'This is the dell computer',
//            'slug' => 'dell-computer',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $five->images()->save($img);
//        $five->categories()->attach([2]);
//
//
//
//
//
//
//        $six = Product::create(['name' => 'Blue jeans', 'description' => 'These are the blue jeans',
//            'slug' => 'blue-jeans',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $six->images()->save($img);
//        $six->categories()->attach([2]);
//
//
//
//
//
//        $seven = Product::create(['name' => 'Red Nighty', 'description' => 'These are the red nightiess for ladies',
//            'slug' => 'red-nighty',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $seven->images()->save($img);
//        $seven->categories()->attach([2]);
//
//
//
//
//
//        $eight = Product::create(['name' => 'Q Mobile', 'description' => 'these are the q mobiles',
//            'slug' => 'q-mobile',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $eight->images()->save($img);
//        $eight->categories()->attach([2]);
//
//
//
//
//
//        $nine = Product::create(['name' => 'Q Tab', 'description' => 'these are the q tabs',
//            'slug' => 'q-tab',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $nine->images()->save($img);
//        $nine->categories()->attach([3]);
//
//
//
//        $ten = Product::create(['name' => 'Aser Laptop', 'description' => 'these are the aser laptops',
//            'slug' => 'aser-laptop',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $ten->images()->save($img);
//        $ten->categories()->attach([3]);
//
//
//
//
//
//        $eleven = Product::create(['name' => 'Orange high hills', 'description' => 'these are the orange high hills for ladies',
//            'slug' => 'orange-high-hills',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $eleven->images()->save($img);
//        $eleven->categories()->attach([3]);
//
//
//
//
//
//        $twl = Product::create(['name' => 'Black Kameez', 'description' => 'these are the black kameez',
//            'slug' => 'black-kameez',
//            'price' => rand(1000, 10000),
//            'quantity' => 10,
//        ]);
//        $img = new ProductImage();
//        $img->main = 'main.jpg';
//        $img->one = '1st.jpg';
//        $img->two = '2nd.jpg';
//        $img->three = '3rd.jpg';
//        $twl->images()->save($img);
//        $twl->categories()->attach([2]);
//
//
































    }
}
