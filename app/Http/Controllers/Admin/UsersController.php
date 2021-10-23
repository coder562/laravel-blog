<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $role=Role::all();
        $users=User::all();
        return view('admin/users/index',compact('users','role'));
    }

    public function update(Request $request , $id){
        // echo "<pre>";
        // print_r($request->all());
        // echo $id;
        // die;
        $users=User::findOrFail($id);
        if(Auth::User()->id==$id){
            Toastr::warning('admin cannot change role !!');
            return redirect()->back();
        }
        // else{
        //     $users->role_id = $request->role_id;
        //     $users->save();
        //     Toastr::success('Role changed successfully :)');
        //     return redirect()->back();
        //     }
        $users->role_id=$request->role;
        $users->save();
        // Toa::success('role changed successfully :)');
        Toastr::success('role changed successfully :)');
        return redirect()->back();



    }

    public function delete($id){

        // echo $id;
        $users=User::findOrFail($id);
        $users->delete();
        Toastr::success('record deleted successfully :)');
        return redirect()->back();


    }


}
