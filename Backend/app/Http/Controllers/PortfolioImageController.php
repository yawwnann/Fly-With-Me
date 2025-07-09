<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use Illuminate\Http\Response;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PortfolioImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = PortfolioImage::all();
        return response()->json($images);
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
        $validated = $request->validate([
            'portfolio_id' => 'required|integer|exists:portfolios,id',
            'image' => 'required|file|image|max:5120', // max 5MB
        ]);

        // Upload ke Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

        $image = PortfolioImage::create([
            'portfolio_id' => $validated['portfolio_id'],
            'image_url' => $uploadedFileUrl,
        ]);
        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = PortfolioImage::findOrFail($id);
        return response()->json($image);
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
    public function update(Request $request, $id)
    {
        $image = PortfolioImage::findOrFail($id);
        $validated = $request->validate([
            'portfolio_id' => 'sometimes|required|integer|exists:portfolios,id',
            'image_url' => 'sometimes|required|string',
        ]);
        $image->update($validated);
        return response()->json($image);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = PortfolioImage::findOrFail($id);
        $image->delete();
        return response()->json(['message' => 'Portfolio image deleted successfully.']);
    }
}
