<?php

namespace App\Http\Controllers;

use App\Category_model;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active = 0;
        $categories = Category_model::all();
        return view('backEnd.category.index', compact('menu_active', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 2;
        $plucked = Category_model::pluck('name', 'id');
        $cate_levels = ['0' => 'Main Category'] + $plucked->all();
        return view('backEnd.category.create', compact('menu_active', 'cate_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkCateName(Request $request)
    {
        $data = $request->all();
        $category_name = $data['name'];
        $ch_cate_name_atDB = Category_model::select('name')->where('name', $category_name)->first();
        if ($category_name == $ch_cate_name_atDB['name']) {
            echo "true";
            die();
        } else {
            echo "false";
            die();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name',
            'url' => 'required',
        ]);
        $data = $request->all();
        $status = $data['status'];
        if ($status) {
            $status = ['status' => 1];
        }
        $data = array_merge($data, $status);
        try {
            Category_model::create($data);
            $notification = array(
                'message' => 'You have successful added category',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
        } catch (\Exception $e) {
            Log::error($e);
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active = 0;
        $plucked = Category_model::where('parent_id', 0)->pluck('name', 'id');
        $cate_levels = ['0' => 'Main Category'] + $plucked->all();
        $edit_category = Category_model::findOrFail($id);
        return view('backEnd.category.edit', compact('edit_category', 'menu_active', 'cate_levels'));
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
        $notifications = [
            'message' => 'Category has been updated',
            'alert-type' => 'info'
        ];
        $update_categories = Category_model::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,' . $update_categories->id,
            'url' => 'required',
        ]);
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $status['status'] = 0;
        } else if ($input_data['status']) {
            $status['status'] = 1;
        }
        $input_data = array_merge($input_data, $status);
        $update_categories->update($input_data);
        return redirect()->route('category.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category_model::findOrFail($id);
        $delete->delete();
        return redirect()->route('category.index')->with('message', 'Delete Success!');
    }
}
