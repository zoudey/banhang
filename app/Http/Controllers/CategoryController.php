<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function danhmuc(){
        $category = Category::select('*')->get();
        return view('admin.category.list', ['category' => $category]);
    }
    public function tao_moi_danh_muc(){
        $category = Category::select('*')->get();
        return view('admin.category.create', ['category' => $category]);
    }
    public function store_danh_muc(Request $request){
        $category = new Category;

        $category->fill($request->all());
        // dd($category);
        $category->save();

        return redirect()->route('danhmuc.danhmuc')->with('thongbao','Thêm Danh Mục Thành Công');
    }
    public function xoa_danh_muc(Category $id)
    {
        if ($id->delete()) {
            session()->flash('success', 'Xóa sản phẩm thành công!');
            return redirect()->back();
        }
    }
}
