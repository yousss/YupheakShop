<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Products_model::all();
        return view('frontEnd.index', compact('products'));
    }
    public function search(Request $request)
    {
        $search = $request->input('query');
        $byCate = "";
        $products = Products_model::where('p_name', 'like', "%" . $search . "%")->paginate();
        // dd($search);
        return view('frontEnd.products', compact('products', 'byCate'));
    }

    public function contactUs()
    {
        return view('frontEnd.contact_us');
    }

    public function suggestedSearch(Request  $request)
    {
        $data = [];
        $results = Products_model::where('p_name', 'LIKE', "%{$request->input('query')}%")->select('p_name')->get();
        if ($results) {
            foreach ($results as $result) {
                $data[] = $result->p_name;
            }
        }
        return response()->json($data);
    }


    public function shop()
    {
        $products = Products_model::paginate(8);
        $byCate = "";

        return view('frontEnd.products', compact('products', 'byCate'));
    }
    public function listByCat($id)
    {
        $byCate = Category_model::find($id);
        $products = $byCate->products()->paginate();
        return view('frontEnd.products', compact('byCate', 'products'));
    }
    public function detialpro($id)
    {
        $detail_product = Products_model::findOrFail($id);
        $totalStock = $detail_product->productAttributes->sum('stock');

        $relateProducts = Products_model::where([['id', '!=', $id], ['categories_id', $detail_product->categories_id]])->get();
        return view('frontEnd.product_details', compact('detail_product',  'totalStock', 'relateProducts'));
    }
    public function getAttrs(Request $request)
    {
        $all_attrs = $request->all();
        //print_r($all_attrs);die();
        $attr = explode('-', $all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select = ProductAtrr_model::where(['products_id' => $attr[0], 'size' => $attr[1]])->first();
        echo $result_select->price . "#" . $result_select->stock;
    }
}
