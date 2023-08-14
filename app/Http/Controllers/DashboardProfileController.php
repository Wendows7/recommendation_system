<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {

        
        return view('dashboard.profile.index',[
            'title' => 'Dashboard | Profile',
            'selisihmenit' => $dashboard->showMinute()
            
        ]);
    }

    public function update(Request $request, User $user)
    {

        $rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns',
            'age' => 'required',
            'gender' => 'required',
            'level' => 'required',
            // 'password' => 'min:3'
        ];
        
        $validatedData = $request->validate($rules);

        if($request->password == ''){
            $validatedData['password'] = auth()->user()->password;
        }else{
            // $rules['password'] = 'min:3';
            $validatedData['password'] = bcrypt($request->password);
        }
        User::where('id', auth()->user()->id)->update($validatedData);
     

        return redirect('/dashboard/profile')->with('success', 'success Update Profile');
    }
}
