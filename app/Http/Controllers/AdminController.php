<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;
class AdminController extends Controller
{
    // load Home's Section and products
    public function index(Request $request )
    {
        $categories = Category::all();
        $data = DB::table('settings')->get();
        $collection =[];
        foreach ($data as $key => $value) {
            if($value->value == "") continue;
            $collection[$value->option]= DB::select("select image,name,short_description AS description from products where id IN (".$value->value.")");
        }

        return view('welcome',compact('categories','collection'));
    }

    public function setHome(Request $request )
    {
        // load config of Home's Section
        $products = Product::where('image','!=',null)->get();
        $options = DB::table('settings')->get();
        return view('admin.admin',compact('options','products'));
    }

    public function updateHome(Request $request )
    {
        // ajax request for check products at Home's Section
        $data = $request->all();

        $options = DB::table('settings')->where('id',$data['id'])->update(
            ['value'=>$data['list']]
        );
        return json_encode(true);

    }
}
