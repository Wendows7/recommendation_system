<?php

namespace App\Http\Controllers;

use App\Imports\RatingsImport;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dashboard;
use App\Models\Parameter;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


class DashboardRatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dashboard $dashboard)
    {
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.ratings.index',[
            'title' => 'Dashboard | Products',
            'selisihmenit' => $dashboard->showMinute(),
            'members' => User::where("level", "user")->get(),
            'products' => Product::all(),
            'parameters' => Parameter::all(),
            'ratings' => Rating::latest()->get(),

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nilai' => 'required',
            'product_id' => 'required',
            'parameter_id' => 'required',
            'user_id' => 'required'
        ]);

        Rating::create($validatedData);

        return redirect('/dashboard/ratings')->with('success', 'Success Insert Data');

    }

    public function importExcel(Request $request)
    {
        $validatedata = $request->validate([

            'file' => 'required',

         ]);

         Excel::import(new RatingsImport, $request->file("file"));

         return redirect('/dashboard/ratings')->with('success', 'File Excel Berhasil Di Upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        $rules = [
            'nilai' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
            'parameter_id' => 'required',

        ];


        $validatedData = $request->validate($rules);

        Rating::where('id', $rating->id)->update($validatedData);


        return redirect('/dashboard/ratings')->with('success', 'success Update Rating');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        Rating::destroy($rating->id);
        return redirect('/dashboard/ratings')->with('success', 'Success Delete Data');
    }

    public function deleteAll()
    {
        $allRating = Rating::all();
        Rating::destroy($allRating);

        return redirect('/dashboard/ratings')->with('success', 'Success Delete All Data');

    }
}
