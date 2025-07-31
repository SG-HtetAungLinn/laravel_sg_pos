<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        try {
            $res = Category::create([
                'name' => $request->name
            ]);
            if ($res) {
                return to_route('category.list')->with(['success' => 'Category Create Success']);
            }
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function delete($id)
    {
        if ($id) {
            $product_count = Product::where('category_id', $id)->count();
            if ($product_count > 0) {
                return back()->with(
                    ['error' => 'Category Delete Fail.Please delete first child data']
                );
            }
            $res = Category::where('id', $id)->delete();
            if ($res) {
                return back()->with(
                    ['success' => 'Category Delete Success']
                );
            }
        }
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryUpdateRequest $request, $id)
    {
        $res = Category::where('id', $id)->update([
            'name' => $request->name
        ]);
        if ($res) {
            return to_route('category.list')->with(['success' => 'Category Update Success']);
        }
    }
}
