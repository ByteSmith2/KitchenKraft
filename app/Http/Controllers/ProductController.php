<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    // Phương thức để hiển thị danh sách sản phẩm

    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    // Phương thức để hiển thị form tạo mới sản phẩm
    public function addproduct()
    {
        $products = Product::all();
        return view('addproduct', compact('products'));
    }

    //Phương thức để lưu sản phẩm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {

        // Xử lý lưu sản phẩm vào cơ sở dữ liệu ở đây
        $product = Product::create(request()->all());
        if ($request->hasFile('image')) {
            $fileName = $request->file("image")->getClientOriginalName();
            $path = $request->file("image")->storeAs("public/products/", $fileName);
            $product->image = str_replace('public/', '', $path);
            $product->save();
        }
        if ($product->save()) {
            return redirect()->back()->with("Ngon", "Thêm sản phẩm mới thành công");
        }
        return redirect()->back()->with("2222", "Thêm sản phẩm mới thất bại");
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        if (request()->hasFile("image")) {
            $fileName = $request->file("image")->getClientOriginalName();
            $path = $request->file("image")->storeAs("public/products", $fileName);
            $product->image = str_replace('public/', '', $path);
            $product->save();
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        // $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        if ($product->save()) {
            return back()->with('success', 'Thành công');
        }

        return back()->with('false', 'Thất bại');
    }

    // Phương thức để xóa sản phẩm
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['success' => 'Thành công']);
    }

    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")
                           ->orWhere('description', 'LIKE', "%$query%")
                           ->paginate(10);

        return view('home', compact('products'));
    }
    

}
