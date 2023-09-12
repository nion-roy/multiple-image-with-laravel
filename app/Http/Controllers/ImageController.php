<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
		// return $request;

 

		$images = $request->file('images');

		if ($images) {
			foreach ($images as $image) {
				// Validate and store each image
				$imageName = time() . '-' . $image->getClientOriginalName();
				$image->move(public_path('uploads'), $imageName);
				// You can also store the file paths in your database if needed.
				$newImage = new Image();
				$newImage->images = $imageName;

				$newImage->save();
			}
			return redirect()->back()->with('success', 'Images uploaded successfully.');
		} else {
			return redirect()->back()->with('error', 'No images selected for upload.');
		}

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
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
