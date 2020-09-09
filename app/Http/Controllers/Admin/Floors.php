<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Floor;

class Floors extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Floor::create($data);
        session('success_add', 'your data is added successfully');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Floor::where('id', $id)->update($data);
        session('success_update', 'your data is updated successfully');
        return back();
    }

    public function destroy($id)
    {
        $item = Floor::find($id);
        $item->delete();
        session('success_delete', 'your data is deleted successfully');
        return back();
    }
}
