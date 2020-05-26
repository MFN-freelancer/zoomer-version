<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\VideoList;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }
    public function manageUser(){
        $users = User::with('join_video')->get();
        return view('admin.manage', compact('users'));
    }
    public function deleteUser($id){
        User::whereId($id)->delete();
        Session::flash('message','Successful Deleted!');
        return back();
    }
    public function updateUser(Request $request, $id){
        $data = array(
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        );
        User::whereId($id)->update($data);
        Session::flash('message','Successful Updated!');
        return back();
    }
}
