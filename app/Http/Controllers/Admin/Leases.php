<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lease;
use Yajra\DataTables\Facades\DataTables;

class Leases extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $leases = Lease::with('apartment', 'rentant');
            return DataTables::of($leases)
                ->addColumn('checkbox', 'admin.leases.btn.checkbox')
                ->addColumn('actions', 'admin.leases.btn.btn')
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        return view('admin.leases.index');
    }

    public function create()
    {
        return view('admin.leases.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'rentant_id' => 'required|numeric',
            'apartment_id' => 'required|numeric',
            'agreed_money' => 'required|numeric',
            'duration' => 'required|numeric',
            'start_from' => 'required|date'
        ]);

        Lease::create($data);
        session()->flash('success_add', trans('rent.lease_added'));
        return redirect(aurl('leases'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Lease::find($id);
        return view('admin.leases.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'rentant_id' => 'required|numeric',
            'apartment_id' => 'required|numeric',
            'agreed_money' => 'required|numeric',
            'duration' => 'required|numeric',
            'start_from' => 'required|date'
        ]);

        Lease::where('id', $id)->update($data);
        session()->flash('success_edit', trans('rent.lease_edited'));
        return redirect(aurl('leases'));
    }

    public function destroy($id)
    {
        $item = Lease::find($id);
        $item->delete();

        session()->flash('success_delete', trans('rent.lease_deleted'));
        return back();
    }
    public function multi_delete()
    {
        $items = request('item');
        $admins = Lease::findOrFail($items);
        $admins->each(function ($admin) {
            $admin->delete();
        });
        session()->flash('success_delete', trans('rent.lease_deleted'));
        return back();
    }
}
