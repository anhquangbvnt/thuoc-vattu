<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Validator;
use DB;

class SanphamController extends Controller
{
    public function index()
    {
        $products = Product::where('deleted', 0)->get();

        return view('admin.pages.list_sp', ['products' => $products]);
    }

    public function add(Request $request)
    {
        $cats = Category::where('deleted', 0)->get();

        if ($request->method() == 'POST') {
            $rule = [
                'name' => 'required',
                'price_in' => 'required',
                'price_out' => 'required',
                'price_sell' => 'required',
                'category' => 'required',
                'stock' => 'required',
                'brand-name' => 'required',
                'exp_date' => 'required',
                'feature-image' => 'required',
                'photos' => 'required',
                'description' => 'required',
            ];

            $validator = Validator::make($request->all(), $rule);

            if ($validator->fails()) {
                $error = $validator->errors();
                $request->flash();

                return view('admin.pages.add_sp', [
                    'cats' => $cats,
                    'errors' => $error
                ]);
            }

            $product = new Product();
            $product->name = $request->input('name');
            $product->price_in = $request->input('price_in');
            $product->price_out = $request->input('price_out');
            $product->price_sell = $request->input('price_sell');
            $product->category_id = $request->input('category');
            $product->tag_id = 0;
            $product->stock = $request->input('stock');
            $product->brand_name = $request->input('brand-name');
            $product->description = $request->input('description');
            $product->exp_date = $request->input('exp_date');
            $product->deleted = 0;
            $product->created_by = 'System';
            $product->updated_by = 'System';

            // Insert feature image
            $img = $request->file('feature-image');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move('upload/product/', $name);
            $product->image = $name;
            $product->save();

            // Insert image to image table
            $id = $product->id;
            $files = $request->file('photos');

            foreach ($files as $key => $file) {
                $link = $file->storeAs('products/' . $id, $file->getClientOriginalName());
                $productImg = new ProductImage();
                $productImg->product_id = $id;
                $productImg->image = $link;
                $productImg->deleted = 0;
                $productImg->created_by = 'System';
                $productImg->updated_by = 'System';
                $productImg->save();
            }

            return redirect()->route('admin.list_sp');
        }

            return view('admin.pages.add_sp', [
                'cats' => $cats
            ]);


    }
    public function update(Request $request, $id = null)
    {

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->deleted = 1;
        $product->save();

        return redirect()->route('admin.list_sp');
    }
}
