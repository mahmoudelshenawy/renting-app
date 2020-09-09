<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rentant;
use Yajra\DataTables\Facades\DataTables;

class Rentants extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $rentants = Rentant::all();
            return DataTables::of($rentants)
                ->addColumn('checkbox', 'admin.rentants.btn.checkbox')
                ->addColumn('actions', 'admin.rentants.btn.btn')
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        return view('admin.rentants.index');
    }
    public function create()
    {
        return view('admin.rentants.create');
    }


    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'age' => 'required',
            'activity' => 'required',
        ]);

        Rentant::create($data);
        session()->flash('success_add', trans('rent.rentant_added'));
        return redirect(aurl('rentants'));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = Rentant::find($id);
        return view('admin.rentants.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'age' => 'required',
            'activity' => 'required',
        ]);

        Rentant::where('id', $id)->update($data);
        session()->flash('success_edit', trans('rent.rentant_edited'));
        return redirect(aurl('rentants'));
    }

    public function destroy($id)
    {
        $item = Rentant::find($id);
        $item->delete();
        session()->flash('success_delete', trans('rent.rentant_deleted'));
        return back();
    }
    public function multi_delete()
    {
        $items = request('item');
        $rentants = Rentant::findOrFail($items);
        $rentants->each(function ($admin) {
            $admin->delete();
        });
        session()->flash('success_delete', trans('rent.rentant_deleted'));
        return back();
    }
}
