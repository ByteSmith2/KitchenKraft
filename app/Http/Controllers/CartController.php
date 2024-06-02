<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item)
            $totalPrice += $item['quantity'] * $item['price'];
        return view('cart', compact('cart', 'totalPrice'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = $request->session()->get('cart', []);
        if ($request->hasFile('image')) {
            $fileName = $request->file("image")->getClientOriginalName();
            $path = $request->file("image")->storeAs("public/products/", $fileName);
            $product->image = str_replace('public/', '', $path);
            $product->save();
        }
        $cart[$id] = [
            'product_id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => ($cart[$id]['quantity'] ?? 0) + $request->quantity,
        ];

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function update(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật');
        }

        return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
    }

    public function delete(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
            // return redirect()->back()->with('success', 'Thành công');
            return response()->json(['success' => 'Thành công']);
        }

        return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
    }
}
