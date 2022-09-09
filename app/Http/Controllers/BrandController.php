<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function thuonghieu(){
        $brand = Brand::select('*')->get();
        return view('admin.brand.list', ['brand' => $brand]);
    }
    public function tao_moi_thuong_hieu(){
        return view('admin.brand.create');
    }
    public function store_thuong_hieu(Request $request){
        $brand = new Brand();
        $brand->fill($request->all());
        $brand->save();
        return redirect()->route('thuonghieu.thuonghieu')->with('thongbao', 'Thêm Thương Hiệu Thành Công');
    }
    public function xoa_thuong_hieu(Brand $id)
    {
        if ($id->delete()) {
            session()->flash('success', 'Xóa sản phẩm thành công!');
            return redirect()->back();
        }
    }
    public function sua_thuong_hieu(Brand $id){
        return view('admin.brand.edit', ['brand' => $id]);
    }
    public function edit_thuong_hieu(Request $request){
        $brand = Brand::find($request->id);
        $brand->update([
            'name' => $request->name,
            'content' => $request->content,
            'status' => $request->status,
        ]);
        return redirect()->route('thuonghieu.thuonghieu')->with('thongbao', 'Sửa sản phẩm thành công');
    }
}
