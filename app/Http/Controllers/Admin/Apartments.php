<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Yajra\DataTables\Facades\DataTables;

class Apartments extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $apartments = Apartment::all();
            return DataTables::of($apartments)
                ->addColumn('checkbox', 'admin.apartments.btn.checkbox')
                ->addColumn('actions', 'admin.apartments.btn.btn')
                ->rawColumns(['checkbox', 'edit', 'actions'])
                ->make(true);
        }
        return view('admin.apartments.index');
    }

    public function create()
    {
        return view('admin.apartments.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'apartment_area' => 'required',
            'floor_id' => 'required'
        ]);

        Apartment::create([
            'name' => $request->name,
            'code' => $request->code,
            'apartment_area' => $request->apartment_area,
            'floor_id' => $request->floor_id
        ]);

        session()->flash('success_add', trans('rent.apartment_added'));
        return redirect(aurl('apartments'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Apartment::find(1);
        return view('admin.apartments.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'apartment_area' => 'required',
            'floor_id' => 'required'
        ]);
        Apartment::where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'apartment_area' => $request->apartment_area,
            'floor_id' => $request->floor_id
        ]);

        session()->flash('success_edit', trans('rent.apartment_edited'));
        return redirect(aurl('apartments'));
    }

    public function destroy($id)
    {
        $item = Apartment::find($id);
        $item->delete();
        session('success_delete', 'your data is deleted successfully');
        return back();
    }

    public function multi_delete()
    {
        $items = request('item');
        $admins = Apartment::findOrFail($items);
        $admins->each(function ($admin) {
            $admin->delete();
        });
        session()->flash('success_delete', trans('rent.apartment_deleted'));
        return back();
    }
}
