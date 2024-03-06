<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        try {
            // Create the category
            Category::create([
                'categoryName' => $validatedData['categoryName'],
                'type' => $validatedData['type'],
            ]);

            // Return a response with the created category data
            return Redirect::route('setting.index')->with('message', 'Category Successfully to Create!');
        } catch (\Exception $e) {
            return Redirect::route('setting.index')->with('message', 'Category Failed to Create!', 'error: ' . $e->getMessage());
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        try {
            $category = Category::findOrFail($category->id);

            $category->update([
                'categoryName' => $validatedData['categoryName'],
                'type' => $validatedData['type'],
            ]);

            return Redirect::route('setting.index')->with('message', 'Category Successfully to Update!');

        } catch (\Exception $e) {
            return Redirect::route('setting.index')->with('message', 'Category Failed to Update!', 'error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category = Category::findOrfail($category->id);
            $category->delete();

            return Redirect::route('setting.index')->with('message', 'Category Successfully to Delete!');
        } catch (\Exception $e) {
            return Redirect::route('setting.index')->with('message', 'Category Failed to Delete!', 'error: ' . $e->getMessage());
        }
    
    }
}
