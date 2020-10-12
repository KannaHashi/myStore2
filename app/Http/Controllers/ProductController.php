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

        $edit = true;

        return view('action', compact('data', 'edit'));
    }

    public function update(Request $request)
    {
        $multi = true;
        $title = $request->title;
        $slug = $request->slug;
        $price = $request->price;
        if($request->file('img')){
            $img = $request->file('img');
            $imgn = $img->getClientOriginalName();
            $img->storeAs('public/img', $imgn);
            Product::where('id', $request->id)
            ->update([
                'product_title' => $title,
                'product_slug' => $slug,
                'product_image' => $imgn,
                'product_price' => $price
            ]);
        } else {
            Product::where('id', $request->id)
            ->update([
                'product_title' => $title,
                'product_slug' => $slug,
                'product_price' => $price
            ]);
        }

        return redirect('product');
    }
    
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/product');
    }

    public function addProduct(Request $request)
    {
        $multi = true;
        $title = $request->title;
        $slug = $request->slug;
        $price = $request->price;
        if($request->file('img')){
            $img = $request->file('img');
            $imgn = $img->getClientOriginalName();
            $img->storeAs('public/img', $imgn);
            Product::create([
                'product_title' => $title,
                'product_slug' => $slug,
                'product_image' => $imgn,
                'product_price' => $price
            ]);
        } else {
            Product::create([
                'product_title' => $title,
                'product_slug' => $slug,
                'product_price' => $price
            ]);
        }

        // $product = new Product;
        // $product->product_title = $request->title;
        // $product->product_slug = $request->slug;
        // $product->product_price = $request->price;
        // if($request->file('img') !== ''){
        //     $img = $request->file('img');
        //     $imgn = $img->getClientOriginalName();
        //     $img->storeAs('public/img', $imgn);
        //     $product->product_image = $imgn;
        //     $product->save();
        // } else {
        //     $product->save();
        // }
        
        return redirect('product');
    }

    public function showallProduct()
    {
        // mengambil sebuah dara menggunakan method get()
        // $data = Product::get();

        // menampilkan data dalam bentuk paginate, fungsinya mengatur jumlah data dalam tabel tanpa menghilangkan data yang lain
        // simplePaginate sama dengan paginate, hanya simplePaginate tidak menampilkan angka
        $data = Product::paginate(6);
        $multi = true;

        return view('product', compact('data', 'multi'));
    }

    public function show() {
        $data = Product::get();
        $multi = true;

        if(!$data){
            abort(404);
        }
        
        return view('product', compact('data', 'multi'));
    }
}
