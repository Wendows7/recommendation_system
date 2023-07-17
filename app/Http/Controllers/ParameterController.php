<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Http\Requests\StoreParameterRequest;
use App\Http\Requests\UpdateParameterRequest;
use App\Models\Dashboard;
use PhpParser\Builder\Param;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {
        $title = 'Delete Parameter!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.parameters.index',[
            'title' => 'Dashboard | Products',
            'selisihmenit' => $dashboard->showMinute(),
            'parameters' => Parameter::latest()->get()
            
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
    public function store(StoreParameterRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Parameter::create($validatedData);

        return redirect('/dashboard/parameters')->with('success', 'Success Insert Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parameter $parameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParameterRequest $request, Parameter $parameter)
    {
        $rules = [
            'name' => 'required',
    
        ];
        
        $validatedData = $request->validate($rules);

        Parameter::where('id', $parameter->id)->update($validatedData);
     

        return redirect('/dashboard/parameters')->with('success', 'success Update Parameter');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parameter $parameter)
    {
        Parameter::destroy($parameter->id);
        return redirect('/dashboard/parameters')->with('success', 'Success Delete Data');
    }
}
