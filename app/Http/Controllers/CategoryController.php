<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(15);

        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {
        return view('categories.add');
    }

    public function store(Request $request) {

        $data = $request->all();

        if ($saved = Category::create($data)) {
            $request->session()->flash('success', 'Category saved');
            return redirect('categories');
        }
        else {
            $request->session()->flash('error', 'Error saving category');
        }

    }

    public function edit($id) {

        $category = Category::with('users')->findOrFail($id);

        return view('categories.edit', ['category' => $category]);

    }

    public function update(Request $request, $id) {

        $category = Category::findOrFail($id);

        if ($content->update($data)) {
            $request->session()->flash('success', 'Category saved');
            return redirect('categories');
        }
        else {
            $request->session()->flash('error', 'Error saving category');
        }

    }

    public function destroy(Request $request, $id) {

        $category = Category::findOrFail($id);

        if ($category->delete($id)) {
            $request->session()->flash('success', 'Category deleted');
            return redirect('categories');
        }
        else {
            $request->session()->flash('error', 'Error deleting category');
        }

    }

}
