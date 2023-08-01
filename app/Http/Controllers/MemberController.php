<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Dashboard;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {
        $title = 'Delete Member!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.members.index',[
            'title' => 'Dashboard | Members',
            'selisihmenit' => $dashboard->showMinute(),
            'members' => Member::latest()->get()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'age' => 'required:integer',
            'gender' => 'required',
            'password' => 'required|min:3',
        ]);

        Member::create($validatedData);

        return redirect('/dashboard/members')->with('success', 'Success Insert Data');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|email:dns',
            'age' => 'required:integer',
            'gender' => 'required',
            // 'password' => 'required|min:3',
        ];
        
        $validatedData = $request->validate($rules);

        if($request->password == ''){
            $validatedData['password'] = $member->password;
        }else{
            // $rules['password'] = 'min:3';
            $validatedData['password'] = bcrypt($request->password);
        }
        
        Member::where('id', $member->id)->update($validatedData);
     

        return redirect('/dashboard/members')->with('success', 'success Update Member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        return redirect('/dashboard/members')->with('success', 'Success Delete Data');
    }
}
