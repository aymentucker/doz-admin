<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriesPodcast;
use Illuminate\Http\Request;

class CategoriesPodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all categories
        return response()->json(CategoriesPodcast::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create new category
        $category = CategoriesPodcast::create($request->all());

        return response()->json($category, 201); // Created status
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find category by ID
        $category = CategoriesPodcast::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find category by ID
        $category = CategoriesPodcast::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Validate incoming request
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'image' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update category
        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find category by ID
        $category = CategoriesPodcast::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Delete category
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
