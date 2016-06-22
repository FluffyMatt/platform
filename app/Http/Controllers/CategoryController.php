<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->orderBy('title', 'asc')->get();

        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {

        return view('categories.create');

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

        $category = Category::findOrFail($id);

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
