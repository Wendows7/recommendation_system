<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\CollaborativeFiltering;
use App\Models\Parameter;

class RatingsController extends Controller
{
    public function index(Parameter $parameter)
    {

        return view('rating',[
            "title" => "Recommendation System",
            "parameters" => $parameter->all(), 
            ]);
    }

    public function RecommendProducts(Parameter $parameter, Rating $ratings)
    { 
        $newrating = $ratings->with('product', 'parameter', 'user')->where('parameter_id', request('id'))->get()->unique("product_id");
        $newArrayRating = [];
        foreach($newrating as $key => $value){
            $avgNilai = $value->where("product_id", $value->product_id)->where("parameter_id", request("id"))->avg("nilai");
            $newArrayRating[] = [
                "id" => $value->id,
                "user_id" => $value->user_id,
                "product_id" => $value->product_id,
                "parameter_id" => $value->parameter_id,
                "nilai" => $value->nilai,
                "average" => (float)$avgNilai,
                "user" => $value->user,
                "product" => $value->product,
                "parameter" => $value->parameter,
            ];
        }

        
        return view('ratingbyparameter',[
            "title" => "Recommendation System",
            "ratings" => collect($newArrayRating)->sortByDesc("average"),
            "parameters" => $parameter->all()  , 

            ]);

    }
}
