<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    public function index()
    {
        $products = Product::with('brand', 'category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories'));
    }

    // public function store(Request $request)
    // {
       
    //     dd($request->all());
       
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'brand_id' => 'required|exists:brands,id',
    //         'category_id' => 'required|exists:categories,id',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'stock_quantity' => 'required|integer',
    //     ]);

    //     // $photoPath = null;

    //     // if ($request->hasFile('photo')) {
    //     //     $photoPath = $request->file('photo')->store('photos', 'public');
    //     // } else {
    //     //     $photoPath = null;
    //     // }

    //     // $create = Product::create([
    //     //     'name' => $request->name,
    //     //     'description' => $request->description,
    //     //     'price' => $request->price,
    //     //     'brand_id' => $request->brand_id,
    //     //     'category_id' => $request->category_id,
    //     //     'photo' => $request->photo,
    //     //     'stock_quantity' => $request->stock_quantity,
    //     // ]);

    //     // $create = Product::create($request->all());


    //     // $create->save();

    //     // return redirect()->route('products.index')
    //     //                  ->with('success', 'Product created successfully.');

    //     // $product = new Product();

    //     // $product->name = $request->name;
    //     // $product->description = $request->description;
    //     // $product->brand_id = $request->brand_id;
    //     // $product->category_id = $request->category_id;
    //     // //$product->photo = $request->photo;
    //     // $product->stock_quantity = $request->stock_quantity;

    //     // if ($request->hasFile('photo')) {
    //     //     $image = $request->file('image');
    //     //     $imageName = time() . '.' . $image->getClientOriginalExtension();
    //     //     $image->move(public_path('images/products'), $imageName);
    //     //     $product->photo = $imageName;
    //     // }

    //     // //$product.Save();

    //     // return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');

    //     Product::create($request->all());

    //     return redirect()->route('products.index')
    //                      ->with('success', 'product created successfully.');
    // }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'stock_quanity' => 'required|integer',
    ]);

    // Handle the file upload
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }

    // Create the product
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'photo' => $photoPath,
        'stock_quanity' => $request->stock_quanity,
    ]);

    // Redirect back with a success message
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_quantity' => 'required|integer',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = $product->photo;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'photo' => $photoPath,
            'stock_quantity' => $request->stock_quantity,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete photo if exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
