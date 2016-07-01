<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('title', 'asc')->get();

        return view('cms.menus.index', compact('menus'));
    }

    public function create()
	{
        return view('cms.menus.create');
    }

    public function store(Request $request)
	{
        $data = $request->all();

        if ($saved = Menu::create($data)) {
            $request->session()->flash('success', 'Menu saved');
            return redirect('menus');
        } else {
            $request->session()->flash('error', 'Error saving menu');
        }
    }

    public function edit($id)
	{
        $menu = Menu::findOrFail($id);

        return view('cms.menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
	{
        $menu = Menu::findOrFail($id);

        if ($content->update($data)) {
            $request->session()->flash('success', 'Menu saved');
            return redirect('menus');
        } else {
            $request->session()->flash('error', 'Error saving menu');
        }
    }

    public function destroy(Request $request, $id)
	{
        $menu = Menu::findOrFail($id);

        if ($menu->delete($id)) {
            $request->session()->flash('success', 'Menu deleted');
            return redirect('menus');
        } else {
            $request->session()->flash('error', 'Error deleting menu');
        }
    }

}
