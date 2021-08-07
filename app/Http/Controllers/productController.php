<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\item;

class productController extends Controller
{
    //

    function getProducts()
    {

        $data=  product::all();

        return view("product",["products"=>$data]);
    }
    function addProducts(Request $req)
    {
        $image = base64_encode(file_get_contents($req->file('picture')));
        $extension = $req->file('picture')->extension();

        $base64 = 'data:image/' . $extension . ';base64,' . $image;

        $product = new product;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->category = $req->category;
        $product->picture = $base64;

        $product->save();

        return redirect('/');

        //return $base64;
    }

    function addFiles(Request $req)
    {
        $fileName = $req->file('file')->getClientOriginalName();
        $destination_path = "public/images/";
        $path = $req->file('file')->storeAs($destination_path,$fileName);


        $item = new item;
        $item->name = $req->name;
        $item->price = $req->price;
        $item->category = $req->category;
        $item->file = $fileName;

        $item->save();

        return redirect('fileproduct');
    }

    function getFileProduct()
    {
        $data = item::all();
        return view('fileandproduct',["products"=>$data]);
    }
    //
}
