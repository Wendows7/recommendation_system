<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Parameter;
class DashboardUserRatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nilai' => 'required',
            'product_id' => 'required',
            'parameter_id' => 'required',
            'user_id' => 'required'
        ]);

        $parameter = Parameter::where('id', $request["parameter_id"])->get();

        if(count(Rating::where("nilai", $request["nilai"])->where("product_id",$request["product_id"])
        ->where("parameter_id",$request["parameter_id"])->where("user_id",$request["user_id"])->get()) > 0 )
        {
            return redirect('/dashboard/product_user')->with('error', 'Maaf, kamu sudah pernah merating produk ini dengan parameter ' .$parameter[0]->name);

        }else{

            Rating::create($validatedData);
            return redirect('/dashboard/product_user')->with('success', 'Success Insert Data');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
