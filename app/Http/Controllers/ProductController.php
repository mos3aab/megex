<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Storage; // or use Illuminate\Support\Facades\Storage;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all products
        $products = Product::all();

        // return a view with products data
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        // return a view with a form to create a new product
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the input data
        $request->validate([
            'barcode' => 'required|unique:products',
            'name' => 'required|max:255',
            'short_description' => 'nullable|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        // Create a new product instance
        $product = new Product();

        // Fill the product attributes with the input data
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = 1;

        // If there is an image file, store it in the public folder and save the path in the image attribute
        // Move the file to a public folder
        if ($request->file('image')) {
            $file = $request->file('image');
            $imageName = time().'_'.basename($file->getClientOriginalName());
            $file->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;
        }
        $category = Category::find($request->category_id);
        if ($category) {
            $product->category()->associate($category);
        }

        // Save the product in the database
        if ($product->save()) {
            // Redirect to the product show page with a success message
            return redirect()->route('products.show', ['product' => $product]);
        }

    // redirect to the product show page with a success message
    return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // return a view with a form to edit the product
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
    // Validate the input data
    $request->validate([
        'barcode' => 'required|string|unique:products,barcode,' . $product->id,
        'name' => 'required|string|max:255',
        'short_description' => 'nullable|string|max:255',
        'long_description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    // Update the product attributes
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        // If a new image is uploaded, delete the old one and store the new one
        if ($request->hasFile('image')) {
            if ($product->image) {
                if(file_exists(public_path($product->image)) && $product->image )
                    unlink(public_path($product->image));
            }
            $file = $request->file('image');
            $imageName = time().'_'.basename($file->getClientOriginalName());
            $file->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;

        }
        // Associate the product with the selected category
        $product->category()->associate($request->category_id);

        // Save the product changes to the database
        if ($product->save()) {
            return redirect()->route('products.show', [$product]);
        } else {
            return back()->withInput()->with('error', "Something went wrong. Please try again.");
        }

     // redirect to the product show page with a success message
     return redirect()->route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // delete the product from the database
        $product->delete();

        // redirect to the product index page with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
