<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_customer()
    {
        $data = User::where('role', 3)->get();
        return view('admin.user.customer.index', compact('data'));    
    }

    public function customer_detail($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.user.customer.detail', compact('data'));    
    }

    public function update_customer(Request $request, $id)
    {
         User::where('id',$id)->update([
            'name'=>$request->fullname, 'gender'=>$request->gender, 
            'birthday'=>$request->datebirth, 'address'=>$request->address, 
            'phone'=>$request->phone
        ]);
        \Session::flash('flash_message', 'Cập Nhật Tài Khoản Thành Công.'); 
        return redirect()->route('show_customer');
    }

    public function show_employee()
    {
        $data = User::where('role', 2)->get();
        return view('admin.user.employee.index', compact('data'));
    }

    public function new_employee()
    {
        return view('admin.user.employee.add');
    }

    public function store_employee(Request $request)
    {
        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthday' => $request->datebirth,
            'role' => 2
        ]);

        \Session::flash('flash_message', 'Tạo Thành Công.');
        return redirect()->route('show_employee');
        /*return view('admin.user.employee.add');*/
    }

    public function employee_detail($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.user.employee.detail', compact('data'));    
    }

    public function update_employee(Request $request, $id)
    {
        User::where('id',$id)->update([
            'name'=>$request->fullname, 'gender'=>$request->gender, 
            'birthday'=>$request->datebirth, 'address'=>$request->address, 
            'phone'=>$request->phone
        ]);
        \Session::flash('flash_message', 'Cập Nhật Tài Khoản Thành Công.'); 
        return redirect()->route('show_employee');
    }
}
