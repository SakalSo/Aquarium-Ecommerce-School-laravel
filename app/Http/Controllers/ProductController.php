<?php

namespace App\Http\Controllers;

use App;
use App\Category;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File; 
use Throwable;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $categoryId)
    {
        try {
            $category = App\Category::findOrFail($categoryId);
        } catch (Exception $e) {
            return abort(404, 'Item not found.');
        } catch (Throwable $t) {
            return abort(404, 'Not Found');
        }

        $products = $category->products;

        return view('product.list')->with('products', $products->paginate(10));
    }

    /**
     * get New arrival products
     *
     * @return \Illuminate\Http\Response
     */
    public function newArrival(Request $request)
    {
        $pastWeek =  Carbon::now()->subDays(7);

        $sortedProducts =
            App\Product::where('created_at', '>', $pastWeek)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('product.list')
            ->with('products', $sortedProducts)
            ->with('attributes', new Collection());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.add')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->file('image')) {
            return redirect('dashboard/product')->withErrors(['msg', 'invalid image file']);
        }
        $image      = $request->file('image');
        $name       = $request->input('name');
        $cost       = $request->input('cost');
        $price      = $request->input('price');
        $categoryId = $request->input('category');

        $path     = $image->store('public/image/product');

        $category = Category::find($categoryId);

        $newProduct = new Product([
            'product_name' => $name,
            'cost' => $cost,
            'price' => $price,
            'image' => str_replace("public/", "storage/", $path),
        ]);

        $res = $category->products()->save($newProduct);
        session()->flash($res ? 'success' : 'error');

        return redirect('dashboard/product')->with('products', Product::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = App\Product::find($id);
        return view('product.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.edit')->with('product', $product)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $name       = $request->input('name');
        $sku        = $request->input('sku');
        $cost       = $request->input('cost');
        $price      = $request->input('price');
        $categoryId = $request->input('category');
        
        $product  = Product::find($id);
        $category = Category::find($categoryId);

        if ($name && $product->product_name && $product->product_name !== $name) {
            $product->product_name = $name;
        }
        if ($sku && $product->sku && $product->sku !== $sku) {
            $product->sku = $sku;
        }
        if ($cost && $product->cost && $product->cost !== $cost) {
            $product->cost = $cost;
        }
        if ($price && $product->price && $product->price !== $price) {
            $product->price = $price;
        }
        if($categoryId && $product->category_id && $product->category_id !== $categoryId) {
            $product->Category_id = $categoryId;
        }
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/image/product');
            $product->image =  str_replace("public/", "storage/", $path);
        }


        $result = $product->save();
        session()->flash($result ? 'success' : 'error');

        return view('dashboard.product.list')->with('products', Product::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete($product->image);
        $res = $product->delete();
        session()->flash($res ? 'success' : 'error');
        return back();
    }
}
