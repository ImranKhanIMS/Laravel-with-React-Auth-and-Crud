<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $req)
    {
        $product = new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->file_path = $req->file('file')->store('products');
        $product->save();
        return $product;
    }

    function list()
    {
        return Product::all();
    }

    function delete($id)
    {
        $result = Product::where('id',$id)->delete();

        if($result)
        {
            return ["result"=>"Product Deleted Successfully!"];
        }
        else
        {
            return ["result"=>"Operation Failed!!"];
        }
    }

    function getProduct($id)
    {
       return Product::find($id);
    }

    function updateProduct(Request $req, $id)
    {
        $product = Product::find($id);

        if (!$req->input('name')){
            $name = $product->name;}
        else{
            $name = $req->name;}

        if (!$req->input('price')){
            $price = $product->price;}
        else{
            $price = $req->price;}

        if (!$req->input('description')){
            $description = $product->description;}
        else{
            $description = $req->description;}

        if (!$req->input('file_path')){
            $product->name = $name;
            $product->price = $price;
            $product->description = $description;
            $product->save();
            return $product;
        }
        else{
            $file_path = $req->file_path;
            $product->name = $name;
            $product->price = $price;
            $product->description = $description;
            $product->file_path = $req->file('file')->store('products');
            $product->save();
            return $product;
        }
    }
}
