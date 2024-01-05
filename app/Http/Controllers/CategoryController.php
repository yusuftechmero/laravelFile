<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function getNestedCategories($parentId = null)
    {
        $nestedCategories = DB::select("
            WITH RECURSIVE category_recursive AS (
                SELECT id, name, parent_id
                FROM categories
                WHERE id = :parentId
                UNION ALL
                SELECT c.id, c.name, c.parent_id
                FROM categories c
                JOIN category_recursive cr ON cr.id = c.parent_id
            )
            SELECT * FROM category_recursive
        ", ['parentId' => $parentId]);

        return response()->json($nestedCategories);
    }
}

