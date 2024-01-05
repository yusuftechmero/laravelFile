<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Handle main image upload
        $mainImage = $request->file('main_image');
        $mainImagePath = $mainImage->store('products', 'public');
        $product->main_image = $mainImagePath;

        // Handle additional images upload
        $additionalImages = [];
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $additionalImage) {
                $additionalImagePath = $additionalImage->store('products', 'public');
                $additionalImages[] = $additionalImagePath;
            }
        }
        $product->additional_images = $additionalImages;

        $product->save();

        return redirect()->route('products.create')->with('success', 'Product created successfully.');
    }

    public function showImages($productId)
{
    $product = Product::findOrFail($productId);

    $mainImage = Storage::url($product->main_image);
    $additionalImages = [];

    foreach ($product->additional_images as $additionalImage) {
        $additionalImages[] = Storage::url($additionalImage);
    }

    return view('products.show_images', compact('mainImage', 'additionalImages'));
}
}

