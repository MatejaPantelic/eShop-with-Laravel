<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products=Product::all();
        return view('products.index')->with([
            'products'=>$products,
        ]);
    }
    public function show($product)
    {
        $product=Product::findOrFail($product);

        return view('products.show')->with([
            'product'=>$product,
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        // $product=Product::create([
        //     'title'=>request()->title,
        //     'description'=>request()->description,
        //     'price'=> request()->price,
        //     'stock'=>request()->stock,
        //     'status'=>request()->status,
        // ]);

        //validacija forme
        // $rules=[
        //     'title'=>['required','max:255'],
        //     'description'=>['required','max:1000'],
        //     'price'=>['required','min:1'],
        //     'stock'=>['required','min:0'],
        //     'status'=>['in:available,unavailable'],
        // ];
        //request()->validate($rules);


        $product=Product::create($request->all());

       // session()->flash('success', "New product with id {$product->id} was created");

        return redirect()
            ->route('products.index')
            ->withSuccess("New product with id {$product->id} was created");
            //->with(['success' => "New product with id {$product->id} was created"]);
    }
    public function edit($product)
    {
        return view('products.edit')->with([
            'product'=> Product::findOrFail($product),
        ]);
    }
    public function update(ProductRequest $request,Product $product)
    {
        //validacija forme
        // $rules=[
        //     'title'=>['required','max:255'],
        //     'description'=>['required','max:1000'],
        //     'price'=>['required','min:1'],
        //     'stock'=>['required','min:0'],
        //     'status'=>['in:available,unavailable'],
        // ];
        // request()->validate($rules);

        //$product = Product::findOrFail($product);
        $product->update($request->all());
        return redirect()
            ->route('products.index')
            ->withSuccess("Product with id {$product->id} was updated");

        //redirect()->action('ProductsController@index');
    }
    public function destroy(Product $product)
    {
        //$product = Product::findOrFail($product);
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was removed");
            ;
    }
}
