<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\Product as ProductResource;
use App\Product;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function indexPaginate()
    {
        return Category::paginate(2);
    }
    public function index()
    {
        return Category::all();
    }
    public function fetch (Product $product)
    {
        $arr = [];




            foreach(Category::all() as $category) {
               foreach($product->categories as $cat) {
                   if($cat->id === $category->id) {
                       $category->isSelected = 1;
                   }
               }


                array_push($arr, $category);



            }














        return $arr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(empty($request->name)) {
            $errors['name'] = 'Name field is required';
        } elseif(Category::where('name', $request->name)->first()) {
            $errors['name'] = 'Category name already exists';
        }
        if(empty($request->description)) {
            $errors['description'] = 'Description field is required';
        }

        if(count($errors) > 0) {
            return response()->json(['errors' => $errors]);
        }
        $c = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $errors = [];
        if(empty($request->name)) {
            $errors['name'] = 'Name field is required';
        } elseif(Category::where('name', $request->name)->first()) {
            $errors['name'] = 'Category name already exists';
        }
        if(empty($request->description)) {
            $errors['description'] = 'Description field is required';
        }

        if(count($errors) > 0) {
            return response()->json(['errors' => $errors]);
        }
        $category->update([
           'name' => $request->name,
           'description' => $request->description,
        ]);


        return 1;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category) {
            DB::delete("DELETE FROM category_product WHERE category_id = :id", ['id'  => $category->id]);
        }
        $category->delete();
        return 1;
    }
}
