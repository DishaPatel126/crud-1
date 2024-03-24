<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WebhookUrl;
use Spatie\WebhookServer\WebhookCall;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at')->paginate(8); //displays 8 products per page
        // $products = Product::all(); //display all products
        return view('products.productsTable', ['products' => $products]); //add the path of the view file; not the name of file in route
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $newProduct = Product::create($data);
        
        $formUrl=WebhookUrl::all();
        foreach ($formUrl as $url){
            $crudUrl=$url->from_url;
            $result=array_merge(['crudUrl'=>$crudUrl],$data);
            WebhookCall::create()
            ->url($url->to_url.'/webhooks') //put url dynamically after fetching it from webhook from webapp
            ->payload([$result])
            ->useSecret('one')
            ->dispatch();

        }
     

        return redirect('products')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]); //validated data
        // $data = $request->all();  //unvalidated data

        $product->update($data);
        $updatedProduct = Product::find($product->id);
        $formUrl=WebhookUrl::all();
        foreach ($formUrl as $url){
            $crudUrl=$url->from_url;
            $result=array_merge(['crudUrl'=>$crudUrl],$data,['update'=>'1']);
            WebhookCall::create()
            ->url($url->to_url.'/webhooks') //put url dynamically after fetching it from webhook from webapp
            ->payload([$result])
            ->useSecret('one')
            ->dispatch();

        }

        // WebhookCall::create()
        //     ->url('http://127.0.0.1:8001/webhooks') //put url dynamically after fetching it from webhook from webapp
        //     ->payload([$updatedProduct])
        //     ->useSecret('one')
        //     ->dispatch();

        return redirect('products')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $formUrl=WebhookUrl::all();
        foreach ($formUrl as $url){
            $crudUrl=$url->from_url;
            $result=array_merge(['crudUrl'=>$crudUrl],["key"=>1],["code"=>$product->code]);
        WebhookCall::create()
            ->url($url->to_url.'/webhooks')
            ->payload([$result])
            ->useSecret('one')
            ->dispatch();
        }
        return redirect('products')->with('success', 'Product deleted successfully');
    }
}