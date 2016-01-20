<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductCondition as Condition;
use App\Repo\ProductRepo;
use App\Repo\ImageRepo;

class ProductController extends Controller
{
    protected $products;

    public function __construct(ProductRepo $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort           = \Input::get('sort', 'created_at');
        $direction      = \Input::get('direction', 'desc');
        $products       = Product::with(['user', 'categories', 'condition'])->orderBy($sort, $direction)->take(50)->paginate();

        return view('products.index', compact('products'));
    }

    /**
     * Show form for creating a product
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        $conditions = Condition::orderBy('id')->lists('name', 'id');
        $product    = new Product;
        return view('products.create', compact('product', 'categories', 'conditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->products->save(\Input::all());


        return redirect('/user/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  Product::with(['user', 'categories', 'condition'])->find($id);

        if (!$product) {
            return redirect('/');
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show Edit form for updating a product
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product =  Product::find($id);

        $categories = Category::lists('name', 'id');
        $conditions = Condition::orderBy('id')->lists('name', 'id');
        return \View::make('products.create', compact('product', 'categories', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        $product->update(\Input::all());

        return redirect('/user/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/user/products');
    }
}
