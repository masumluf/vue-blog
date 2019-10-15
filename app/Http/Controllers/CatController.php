<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function addcat(Request $request)
    {
        $this->validate(
            $request,
            [
                'cat_name' => "required|min:5"
            ]
        );
        $catagory = new Catagory;
        $catagory->cat_name = $request->cat_name;
        $catagory->save();
        return;
    }
    public function get_all_catagory()
    {
        $catagories = Catagory::all();
        return response()->json([
            'catagories' => $catagories
        ], 200);
    }
    public function deleteCatagory($id)
    {
        Catagory::find($id)->delete();
        return "item removed";
    }

    public function editcat(Request $request, $id)
    {
        $category = Catagory::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
    public function all_category()
    {
        $categories = Catagory::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
}
