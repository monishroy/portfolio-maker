<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplateImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.template.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'temp_name' => "required",
            'temp_path' => "required",
            'images.*' => "required",
            'description' => "required",
        ]);

        $template = Template::create([
            'name' => $request->temp_name,
            'slug' => Str::slug($request->temp_name),
            'path' => $request->temp_path,
            'description' => $request->description,
        ]);

        foreach ($request->images as $index => $value) {

            $image = date('dmY') . time() . '-' . ++$index . "." . $value->getClientOriginalExtension();
            $value->storeAs('public/templates/orginal', $image);
            // Store marksheet and certificate files
            $compressedImage = Image::make($value)->resize(1080, 720)->encode(); // Encode the image in the desired format (e.g., JPEG)
            $compressedImage->save(storage_path('app/public/templates/' . $image));

            $result = TemplateImage::create([
                'template_id' => $template->id,
                'name' => $image,
            ]);
        };

        if ($result) {
            return back()->with('success', 'Template Create Successfully!');
        } else {
            return back()->with('error', 'Something is Worng!');
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
        return view('backend.template.edit');
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
