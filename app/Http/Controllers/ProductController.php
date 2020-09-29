<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showProduct($slug) {
        $data = Product::where('product_slug', $slug)
        ->firstOrFail();

        $multi = false;

        return view('product', compact('data', 'multi'));
    }
    
    public function editProduct($id) {
        $data = Product::where('id', $id)
        ->first();

        if(!$data){
            abort(404);
        }
        
        $multi = false;

        return view('action', compact('data', 'multi'));
    }

    public function update(Request $request)
    {
        $title = $request->title;
        $slug = $request->slug;
        if($request->file('img')){
            $img = $request->file('img');
            $imgn = $img->getClientOriginalName();
            $img->storeAs('public/img', $imgn);
            Product::where('id', $request->id)
            ->update([
                'product_title' => $title,
                'product_slug' => $slug,
                'product_image' =>$imgn
            ]);
        } else {
            Product::where('id', $request->id)
            ->update([
                'product_title' => $title,
                'product_slug' => $slug
            ]);
        }
        return "<script>window.history.go(-2)</script>";
    }

    public function delete(Request $request)
    {
        Product::where('id', $request->id)->delete();
        return "<script>window.history.go(-2)</script>";
    }

    public function showallProduct() {
        $data = Product::get();
        $multi = true;

        if(!$data){
            abort(404);
        }
        
        return view('product', compact('data', 'multi'));
    }
}
