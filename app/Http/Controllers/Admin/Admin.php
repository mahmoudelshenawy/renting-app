<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use DB;
use App\DataTables\AdminsDataTable;
use Yajra\DataTables\Facades\DataTables;

class Admin extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $admins = User::all();
            return DataTables::of($admins)
                ->addColumn('checkbox', 'admin.admins.btn.checkbox')
                ->addColumn('actions', 'admin.admins.btn.btn')
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        return view('admin.admins.index');
    }
    // public function index(AdminsDataTable $datatable)
    // {
    //     return $datatable->render('admin.admins.index2');
    // }
    public function create()
    {
        return view('admin.admins.create');
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7|confirmed',
            'password_confirmation' => 'required',
        ]);

        $admin =  new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        $admin->save();
        session()->flash('success_add', trans('admin.admin_added_successfully'));
        // return redirect(aurl('admins'));
        return redirect(aurl('admins'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admin.admins.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:7|confirmed',
            'password_confirmation' => 'required'
        ]);

        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        $admin->update();
        session()->flash('success_edit', trans('admin.admin_updated'));
        // return redirect(aurl('admins'));
        return redirect(aurl('admins'));
    }
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        session()->flash('success_delete', trans('admin.admin_deleted'));

        return redirect(aurl('admins'));
    }
    public function deleteAll()
    {
    }
    public function multi_delete()
    {
        $items = request('item');
        $admins = User::findOrFail($items);
        $admins->each(function ($admin) {
            $admin->delete();
        });
        session()->flash('success_delete', trans('admin.admin_deleted'));
        return back();
    }
    public function login()
    {


        return view('admin.Auth.login');
    }
    public function finishLogin(Request $request, User $admin)
    {
        $rememberMe = $request->rememberme == 1 ? true : false;
        if (admin()->attempt(['email' => $request->email, 'password' => $request->password], $rememberMe)) {

            return redirect(url('admin/admins'));
        } else {
            session()->flash('error', trans('admin.inccorrect_information_login'));
            return redirect('admin/login');
        }
    }
}
