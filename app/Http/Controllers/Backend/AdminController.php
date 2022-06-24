<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdminLogin()
    {
        return view('admin.admin_login');
    }
    public function adminLogin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        
        if(Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password
            ]))
        {
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back();
        }
      

    }
}