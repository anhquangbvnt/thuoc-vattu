<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $cats = Category::where('deleted', 0)->get();

        return view('admin.pages.list_category', ['cats' => $cats]);
    }

    public function add(Request $request)
    {
        try {
            $name = $request->input('cat-name');
            $type = $request->input('cat-loai');
            $cat = new Category();

            if ($name) {
                $cat->name = $name;
                $cat->deleted = 0;
                $cat->type = $type;
                $cat->created_by = 'System';
                $cat->updated_by = 'System';
                $cat->save();
            }
        }catch (\Exception $exception){
            echo $exception->getMessage(); die;
        }
     return redirect()->route('admin.list_category');

    }
    public function update(Request $request, $id = null)
    {
        if ($request->method() == 'POST') {
            $catId = $request->input('cat-id');
            $cat = Category::find($catId);

            if ($cat) {
                $cat->name = $request->input('cat-name');
                $cat->save();
            }

            return redirect()->route('admin.list_category');
        }

        $cats = Category::all();
        $updateCat = Category::find($id);

        return view('admin.pages.update_category', [
            'cats' => $cats,
            'updateCat' => $updateCat
        ]);
    }
    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->deleted = 1;
        $cat->save();

        return redirect()->route('admin.list_category');
    }
}
