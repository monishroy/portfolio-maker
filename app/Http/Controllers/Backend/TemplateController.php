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
    public function __construct()
    {
        $this->middleware(['permission:view template'])->only('index');
        $this->middleware(['permission:add template'])->only('create');
        $this->middleware(['permission:edit template'])->only('edit');
    }

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
        $data['template'] = Template::find($id);
        $data['template_images'] = TemplateImage::where('template_id', $id)->get();

        return view('backend.template.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'temp_name' => "required",
            'temp_path' => "required",
            'description' => "required",
        ]);

        $template = Template::find($id)->update([
            'name' => $request->temp_name,
            'slug' => Str::slug($request->temp_name),
            'path' => $request->temp_path,
            'description' => $request->description,
        ]);

        $result = 1;

        if (!empty($request->images)) {
            foreach ($request->images as $index => $value) {

                $image = date('dmY') . time() . '-' . ++$index . "." . $value->getClientOriginalExtension();
                $value->storeAs('public/templates/orginal', $image);
                // Store marksheet and certificate files
                $compressedImage = Image::make($value)->resize(1080, 720)->encode(); // Encode the image in the desired format (e.g., JPEG)
                $compressedImage->save(storage_path('app/public/templates/' . $image));

                $result = TemplateImage::create([
                    'template_id' => $id,
                    'name' => $image,
                ]);
            };
        }

        if ($result) {
            return back()->with('success', 'Template Update Successfully!');
        } else {
            return back()->with('error', 'Something is Worng!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function image_delete($id)
    {
        $template_image = TemplateImage::find($id);

        $image = storage_path('app/public/templates/' . $template_image->name);
        if (is_file($image)) {
            unlink($image);
        }

        $image2 = storage_path('app/public/templates/orginal/' . $template_image->name);
        if (is_file($image2)) {
            unlink($image2);
        }

        $template_image->delete();

        return back()->with('success', 'Template image delete successfully');
    }
}
