<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\Products_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active = 3;
        $i = 0;
        $products = Products_model::orderBy('created_at', 'desc')->get();
        return view('backEnd.products.index', compact('menu_active', 'products', 'i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 3;
        $categories = Category_model::pluck('name', 'id')->all();
        $cate_levels = ['0' => 'Main Category'] + $categories;

        return view('backEnd.products.create', compact('menu_active', 'cate_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_name' => 'required|min:5',
            'p_code' => 'required',
            'p_color' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $fileName = time() . '-' . str_slug($formInput['p_name'], "-") . '.' . $image->getClientOriginalExtension();
                $large_image_path = public_path('products/large/' . $fileName);
                $medium_image_path = public_path('products/medium/' . $fileName);
                $small_image_path = public_path('products/small/' . $fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600, 600)->save($medium_image_path);
                Image::make($image)->resize(300, 300)->save($small_image_path);
                $formInput['image'] = $fileName;
            }
        }
        Products_model::create($formInput);
        return redirect()->route('product.create')->with('message', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active = 3;
        $categories = Category_model::pluck('name', 'id')->all();
        $cate_levels = ['0' => 'Main Category'] + $categories;
        $edit_product = Products_model::findOrFail($id);
        return view('backEnd.products.edit', compact('edit_product', 'menu_active', 'cate_levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_product = Products_model::findOrFail($id);
        $this->validate($request, [
            'p_name' => 'required|min:5',
            'p_code' => 'required',
            'p_color' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput = $request->all();
        if ($update_product['image'] == '') {
            if ($request->file('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $fileName = time() . '-' . str_slug($formInput['p_name'], "-") . '.' . $image->getClientOriginalExtension();
                    $large_image_path = public_path('products/large/' . $fileName);
                    $medium_image_path = public_path('products/medium/' . $fileName);
                    $small_image_path = public_path('products/small/' . $fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600, 600)->save($medium_image_path);
                    Image::make($image)->resize(300, 300)->save($small_image_path);
                    $formInput['image'] = $fileName;
                }
            }
        } else {
            $formInput['image'] = $update_product['image'];
        }
        $update_product->update($formInput);
        return redirect()->route('product.index')->with('message', 'Product updted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Products_model::findOrFail($id);
        $image_large = public_path() . '/products/large/' . $delete->image;
        $image_medium = public_path() . '/products/medium/' . $delete->image;
        $image_small = public_path() . '/products/small/' . $delete->image;
        if ($delete->delete()) {
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return redirect()->route('product.index')->with('message', 'Product deleted successfully!');
    }
    public function deleteImage($id)
    {
        //Products_model::where(['id'=>$id])->update(['image'=>'']);
        $delete_image = Products_model::findOrFail($id);
        $image_large = public_path() . '/products/large/' . $delete_image->image;
        $image_medium = public_path() . '/products/medium/' . $delete_image->image;
        $image_small = public_path() . '/products/small/' . $delete_image->image;
        if ($delete_image) {
            $delete_image->image = '';
            $delete_image->save();
            ////// delete image ///
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        $notification = [
            'message' => 'Image has been removed from product',
            'alert-type' => 'info'
        ];
        return back()->with($notification);
    }
}
