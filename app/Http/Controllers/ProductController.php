<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function san_pham()
    {
        $product = Product::select('*')->ORDERBY('id', 'desc')->paginate(10)->load('brand')->load('category');
        return view('admin.product.list', ['product' => $product]);
    }
    public function tao_moi_san_pham(Request $request)
    {
        $brand = Brand::select('*')->get();
        $category = Category::select('*')->get();

        return view('admin.product.create', ['brand' => $brand, 'category' => $category]);
    }

    public function store_san_pham(Request $request)
    {
        $product = new Product();
        $product->sold = 0;
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->username . '_' . $imageName;
            $product->image = $image->storeAs('images/product', $imageName);
        } else {
            $product->image = '';
        }
        $product->save();
        // dd($product);
        return redirect()->route('sanpham.san_pham')->with('thongbao', 'Thêm Mới Thành Công');
    }
    public function xoa_san_pham(Product $id)
    {
        if ($id->delete()) {
            session()->flash('success', 'Xóa sản phẩm thành công!');
            return redirect()->back();
        }
    }
    public function sua_san_pham(Product $id)
    {
        $category = Category::select('*')->get();
        $brand = Brand::select('*')->get();
        return view('admin.product.edit', [
            'product' => $id,
            'category' => $category,
            'brand' => $brand,
        ]);
    }
    public function edit_san_pham(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->hasFile('image_upload')) {
            $image = $request->image_upload;
            $imageName = $image->hashName();
            $imageName = $request->username . '_' . $imageName;
            $image_upload = $image->storeAs('images/product', $imageName);
        } else {
            $image_upload = $request->image;
        }

        $product->update([
            'name' => $request->name,
            'image' => $image_upload,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'status' => $request->status,
            'content' => $request->content,
            'cate_id' => $request->cate_id,
            'brand_id' => $request->brand_id,
            'quantity' => $request->quantity,
        ]);
        // dd($product);
        return redirect()->route('sanpham.san_pham')->with('thongbao', 'Sửa sản phẩm thành công');
    }
}
