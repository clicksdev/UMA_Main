<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\CreateAdminRequest;
use App\Http\Requests\Admins\UpdateAdminRequest;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.modules.admins.index');
    }

    public function create()
    {
        return view('backend.modules.admins.create');
    }

    public function store(CreateAdminRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        Admin::create($data);
        Toastr::success('Admin created successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('backend.modules.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $admin->password;
        }
        $admin->update($data);
        Toastr::success('Admin updated successfully', 'Success', ["positionClass" => "toast-top-left"]);
        return redirect()->route('admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        Toastr::success('Admin deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admins.index');
    }

    public function dataTable()
    {
        $admins = Admin::all();
        return DataTables::of($admins)
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('admins.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit">
                            <i class="la la-edit icon-xl"></i>
                        </a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('admins.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete">
                            <i class="la la-trash icon-xl"></i>
                        </a>';
            })
            ->rawColumns(['actions'])->make(true);
    }
}
