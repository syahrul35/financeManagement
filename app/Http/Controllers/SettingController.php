<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Setting/Setting', ['categories' => $categories]);
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

        // Create the category
        $category = Category::create([
            'categoryName' => $validatedData['categoryName'],
            'type' => $validatedData['type'],
        ]);

        // Return a response with the created category data
        return response()->json(['message', 'Data Berhasil Disimpan!']);
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
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        try {
            // Perbarui atribut kategori berdasarkan input yang diterima
            $category->update([
                'categoryName' => $validatedData['categoryName'],
                'type' => $validatedData['type'],
            ]);

            // Jika berhasil, kembalikan respons yang sesuai
            return redirect()->back()->with('success', 'Category updated successfully.');

        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Failed to update category. ' . $e->getMessage());
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Category::findOrfail($id);
        $post->delete();
    }
}
