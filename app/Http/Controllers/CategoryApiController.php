<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function get_data()
    {
        $data_category = Category::all();
        return response()->json([
            'message' => 'Berhasil Mengambil Data',
            'data'    => $data_category,
            'success' => true
        ]);
    }

    public function create_data(Request $request)
    {
        $data_category = new Category();
        $data_category->name = $request->name;
        $data_category->is_publish = $request->is_publish;
        $data_category->save();

        return "Data Berhasil Ditambahkan";
    }

    public function edit_data(Request $request, $id)
    {
        $data_category = Category::where('id',$id)->update([
            'name' => $request->name,
            'is_publish' => $request->is_publish,
        ]);

        return "Data Berhasil Diedit";
    }

    public function delete_data($id)
    {
        $data_category = Category::where('id',$id)->delete();

        return "Data Berhasil Dihapus";
    }
}
