<?php

namespace App\Http\Controllers;

use App\Models\CollaborativeFiltering;
use App\Models\Dashboard;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class DashboardRecommendationProductController extends Controller
{
    public function index(Dashboard $dashboard, Rating $ratings, CollaborativeFiltering $collaborativeFiltering)
    {
        $ratingAverage = $ratings->with('product', 'parameter', 'user')->where('parameter_id', 7)->get()->unique("user_id");
        $ratingMatrix = $ratings->with('product', 'parameter', 'user')->where("parameter_id", 7)->get();

        $average = $collaborativeFiltering->computeAverageRatings($ratingAverage);
        $newRatings=[];
        foreach($ratingMatrix as $key =>$value){
            $newRatings[$value->user->name][$value->product->name] = [$value->nilai,[$value->product]];
        }
        $userlogin = auth()->user()->name;
        
        $itemsimilarity = $collaborativeFiltering->computeItemSimilarityMatrix($ratingMatrix, $average);
        $sumweight = $collaborativeFiltering->weightedSumRecommendation($newRatings[$userlogin], $itemsimilarity);
        $finalresult = [];

        foreach($sumweight as $key => $value) {
            $finalresult[] = [
                "name" => $key,
                "nilai" => $value,
            ];
        }

        $sumWeightName = array_column($finalresult, 'name');
        $products = Product::whereIn("name", $sumWeightName)->get();
        $resultsementara = [];
        foreach ($products as $product => $value) {
            
            $resultsementara[] =
            
            [
                "name" => $value->name,
                "image" => $value->image,
                "description" => $value->description,
            ];
            }

            foreach ($resultsementara as $sumber)
            {
                $result = array_search($sumber["name"], array_column($finalresult, "name"));
                if($result !== false){
                    $finalresult[$result] = array_merge($finalresult[$result], $sumber);
                }
            }
            
            dd($newRatings);
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view("dashboard.user_recommendation.index",[
            "title" => "Dashboard | Recommendation",
            "selisihmenit" => $dashboard->showMinute(),
            "productrecommend" => collect($finalresult)->sortByDesc("nilai")

        ]);
    }
}
