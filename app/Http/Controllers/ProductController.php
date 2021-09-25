<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeaturedProduct;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use DB;
class ProductController extends Controller
{

    public function __construct()
    {


    }

    public function restore($slug)
    {

        $product = Product::where('slug', $slug)->onlyTrashed()->first();

        if($product) {
            $product->restore();
            return 1;

        }

        return 0;
    }

    public function getTrashedProducts()
    {

        $r = request();
        if($r->search) {
            return  new ProductCollection(Product::where('name', 'like', "%".$r->search."%")->onlyTrashed()->paginate(request()->limit));


        }


        return  new ProductCollection(Product::onlyTrashed()->paginate(request()->limit));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = request();
        if($r->search) {
            return  new ProductCollection(Product::where('name', 'like', "%".$r->search."%")->paginate(request()->limit));


        }


          return  new ProductCollection(Product::paginate(request()->limit));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $errors = [];
        $r = request();
         if(empty($r->name)) {
             $errors['name'] = "Name field is required";
         } elseif(Product::where('name', $r->name)->first()) {
             $errors['name'] = "Product name already exists";


         }
         if(empty($r->price)) {
             $errors['price'] = "Price field is required";
         } elseif($r->price<0) {
             $errors['price'] = "Price field cant not be a nagetive number";
         }

        if(empty($r->quantity)) {
            $errors['quantity'] = "Quantity field is required";
        } elseif($r->quantity<=0) {
            $errors['quantity'] = "Quantity field should be a valid number";
        }

        if(empty($r->description)) {
             $errors['description'] = "Description field is required";
        }
        if(empty($r->categories)) {
             $errors['categories'] = "You must assign at least one category";
        }


        if(count($errors) >0) {
            return response()->json(['errors' => $errors]);
        }





        $pImage = new ProductImage();



        $p = Product::create([
            'name' => $r->name,
            'price' => $r->price,
            'description' => $r->description,
            'slug' => $r->slug,
            'quantity' => $r->quantity,
        ]);

//        $p->categories()->attach($r->categories);






//        UPLOAD PHOTOS
        $path = './uploads/images';

        $arr = [];
        if(request()->fileMain) {
            $name =  request()->fileMain->getClientOriginalName();
            $arr['main'] = time().md5($name).'.'.request()->fileMain->getClientOriginalExtension();
            request()->fileMain->move($path, $arr['main']);
            $pImage->main = $arr['main'];

        }


        if(request()->fileOne) {
            $name =  request()->fileOne->getClientOriginalName();
            $arr['one'] = time().md5($name).'.'.request()->fileOne->getClientOriginalExtension();
            request()->fileOne->move($path, $arr['one']);
            $pImage->one = $arr['one'];

        }


        if(request()->fileTwo) {
            $name =  request()->fileTwo->getClientOriginalName();
            $arr['two'] = time().md5($name).'.'.request()->fileTwo->getClientOriginalExtension();
            request()->fileTwo->move($path, $arr['two']);
            $pImage->two = $arr['two'];

        }

        if(request()->fileThree) {
            $name =  request()->fileThree->getClientOriginalName();
            $arr['three'] = time().md5($name).'.'.request()->fileThree->getClientOriginalExtension();
            request()->fileThree->move($path, $arr['three']);
            $pImage->three = $arr['three'];

        }

//        END UPLOAD PHOTOS


         if($r->categories) {
             $arr = explode(',', $r->categories);




             $p->categories()->attach($arr);


         }


            $p->images()->save($pImage);






        return $p;










    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getUpdated(Request $request, Product $product)
    {






        $r = request();



          $errors = [];

        if(empty($r->name)) {
            $errors['name'] = "Name field is required";
        }
        if(empty($r->price)) {
            $errors['price'] = "Price field is required";
        } elseif($r->price<0) {
            $errors['price'] = "Price field cant not be a nagetive number";
        }

        if(empty($r->quantity)) {
            $errors['quantity'] = "Quantity field is required";
        } elseif($r->quantity<=0) {
            $errors['quantity'] = "Quantity field should be a valid number";
        }

        if(empty($r->description)) {
            $errors['description'] = "Description field is required";
        }
        if(empty($r->categories)) {
            $errors['categories'] = "You must assign at least one category";
        }


        if(count($errors) >0) {
            return response()->json(['errors' => $errors]);
        }








         $p = $product->update([
            'name' => $r->name,
             'price' => $r->price,
             'slug' => $r->slug,
             'quantity' => $r->quantity,
             'description' => $r->description,
         ]);

        $currentIds = [];

        foreach($product->categories as $category) {
            array_push($currentIds, $category->id);

        }

        $product->categories()->detach($currentIds);








        $arr = explode(',', $r->categories);







        $product->categories()->attach($arr);

















//        UPLOAD PHOTOS
        $path = './uploads/images';

        $arr = [];
        if(request()->fileMain) {


            if($product->images->main !== 'main.jpg') {


                unlink($path."/".$product->images->main);


                $name =  request()->fileMain->getClientOriginalName();
                $arr['main'] = time().md5($name).'.'.request()->fileMain->getClientOriginalExtension();
                request()->fileMain->move($path, $arr['main']);




            } else {

                $name = request()->fileMain->getClientOriginalName();
                $arr['main'] = time() . md5($name) . '.' . request()->fileMain->getClientOriginalExtension();
                request()->fileMain->move($path, $arr['main']);



            }


        } else $arr['main'] = $product->images->main ? $product->images->main : 'main.jpg';













        if(request()->fileOne) {
            if($product->images->one !== '1st.jpg' && $product->images->one) {
                unlink($path . "/" . $product->images->one);

            }
            $name =  request()->fileOne->getClientOriginalName();
            $arr['one'] = time().md5($name).'.'.request()->fileOne->getClientOriginalExtension();
            request()->fileOne->move($path, $arr['one']);


        } else $arr['one'] = $product->images->one ? $product->images->one: null;




        if(request()->fileTwo) {
            if($product->images->two !== '2nd.jpg' && $product->images->two) {
                unlink($path . "/" . $product->images->two);

            }
            $name =  request()->fileTwo->getClientOriginalName();
            $arr['two'] = time().md5($name).'.'.request()->fileTwo->getClientOriginalExtension();
            request()->fileTwo->move($path, $arr['two']);


        } else $arr['two'] = $product->images->two ? $product->images->two : null;





        if(request()->fileThree) {
            if($product->images->three !== '3rd.jpg' && $product->images->three) {
                unlink($path . "/" . $product->images->three);

            }
            $name =  request()->fileThree->getClientOriginalName();
            $arr['three'] = time().md5($name).'.'.request()->fileThree->getClientOriginalExtension();
            request()->fileThree->move($path, $arr['three']);


        } else $arr['three'] = $product->images->three ? $product->images->three : null;








        $product->images->update([
            'main' => $arr['main'],
            'one' => $arr['one'],
            'two' => $arr['two'],
            'three' => $arr['three'],
        ]);


        return 1;





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product) {
             $product->delete();
             return 1;

        }

        return 0;

    }

    public function forceDelete($slug)
    {
        $product = Product::where('slug', $slug)->onlyTrashed()->first();

        if($product) {
            $product->forceDelete();
            return 1;

        }

        return 0;

    }
}
