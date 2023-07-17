<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dashboard;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.user.index',[
            'title' => 'Dashboard | User',
            'selisihmenit' => $dashboard->showMinute(),
            'users' => User::latest()->get()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        User::create($validatedData);

        return redirect('/dashboard/user')->with('success', 'Success Insert Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //\\retur
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns',
            // 'password' => 'min:3'
        ];
        
        $validatedData = $request->validate($rules);

        if($request->password == ''){
            $validatedData['password'] = $user->password;
        }else{
            // $rules['password'] = 'min:3';
            $validatedData['password'] = bcrypt($request->password);
        }
        User::where('id', $user->id)->update($validatedData);
     

        return redirect('/dashboard/user')->with('success', 'success Update User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
            User::destroy($user->id);
            return redirect('/dashboard/user')->with('success', 'Success Delete Data');
        
    }
}
