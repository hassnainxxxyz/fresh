<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;


class AddToCartController extends Controller
{
    public function addToCart(Product $product)
    {
       if(isset($_SESSION['cart'])) {
           $oldCart = $_SESSION['cart'];
       } else {
           $oldCart = null;
       }

       $oldC = castToClass(Cart::class, $oldCart);
       $c = new Cart($oldC);
       $c->images = $product->images;
       $c->add($product, $product->id);

       $_SESSION['cart'] = $c;


       return json_encode($c);



    }
    public function removeFromCart($id)
    {
        $product = Product::find($id);




        if(isset($_SESSION['cart'])) {
            $oldCart = $_SESSION['cart'];
        } else {
            $oldCart = null;
        }



        $oldC = castToClass(Cart::class, $oldCart);
        $c = new Cart($oldC);
        $c->removeItem($product->id);

        $_SESSION['cart'] = $c;


        return json_encode($c);
    }

    public function updateCart($id, $qty)
    {

        $p = Product::find($id);





       if((int) $qty > 0) {


        if(isset($_SESSION['cart'])) {
            $oldCart = $_SESSION['cart'];
        } else {
            $oldCart = null;
        }



        $oldC = castToClass(Cart::class, $oldCart);
        $c = new Cart($oldC);
       $c->updateQty($id, $qty);

        $_SESSION['cart'] = $c;


        return json_encode($c);


         }





    }


}
