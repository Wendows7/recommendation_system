<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CollaborativeFiltering extends Model
{
    use HasFactory;

    public function adjustedCosineSimilarity($item1Ratings, $item2Ratings, $averageRatings) {
        $numerator = 0;
        $denominator1 = 0;
        $denominator2 = 0;
        // dd($item1Ratings);
        foreach ($item1Ratings as $userId => $rating1) {
            if (isset($item2Ratings[$userId])) {
                $rating2 = $item2Ratings[$userId];
                $averageRating = $averageRatings[$userId];

                $numerator += ($rating1 - $averageRating) * ($rating2 - $averageRating);
                $denominator1 += pow($rating1 - $averageRating, 2);
                $denominator2 += pow($rating2 - $averageRating, 2);
            }
        }

        if ($denominator1 == 0 || $denominator2 == 0) {
            return 0; // Handle division by zero.
        }

        $similarity = $numerator / (sqrt($denominator1) * sqrt($denominator2));
        return $similarity;
    }

    public static function transformPreferences($preferences)
    {
        $result = array();

        foreach($preferences as $otherPerson => $values)
        {
            foreach($values as $key => $value)
            {
                $result[$key][$otherPerson] = $value;
            }
        }

        return $result;
    }

    public function computeAverageRatings($ratings) {
        $newArrayRating = [];
        foreach($ratings as $key => $value){
            $avgNilai = $value->where("user_id", $value->user_id)->avg("nilai");
            // dd($avgNilai);
            $newArrayRating[$value->user->name] = $avgNilai;
            // [
            //     "id" => $value->id,
            //     "user_id" => $value->user_id,
            //     "product_id" => $value->product_id,
            //     "parameter_id" => $value->parameter_id,
            //     "nilai" => $value->nilai,
            //     "average" => (float)$avgNilai,
            //     "user" => $value->user,
            //     "product" => $value->product,
            //     "parameter" => $value->parameter,
            // ];
        }
        return $newArrayRating;
    }

    public function computeItemSimilarityMatrix($ratings, $averageRating) {
        $newRatings = [];
        $itemSimilarityMatrix = [];
        foreach($ratings as $key =>$value){
                $newRatings[$value->product->name][$value->user->name] = $value->nilai;
            }
        foreach ($newRatings as $itemId1 => $itemRatings1) {
            foreach ($newRatings as $itemId2 => $itemRatings2) {
                if ($itemId1 != $itemId2) {
                    $similarity = $this->adjustedCosineSimilarity($itemRatings1, $itemRatings2, $averageRating);
                    $itemSimilarityMatrix[$itemId1][$itemId2] = $similarity;
                }
            }
        }

        return $itemSimilarityMatrix;
    }

    function weightedSumRecommendation($userRatings, $itemSimilarityMatrix) {
        $predictedRatings = array();

        foreach ($itemSimilarityMatrix as $item1 => $itemSimilarities) {
            if (!isset($userRatings[$item1]) || $userRatings[$item1] == 0) {
                $numerator = 0;
                $denominator = 0;

                foreach ($itemSimilarities as $item2 => $similarity) {
                    if (isset($userRatings[$item2])) {
                        $numerator += $userRatings[$item2][0] * $similarity;
                        $denominator += abs($similarity);
                    }
                }

                if ($denominator > 0) {
                    $predictedRating = $numerator / $denominator;
                    $predictedRatings[$item1] = $predictedRating;
                }
            }
        }

        // Urutkan item berdasarkan nilai prediksi rating secara descending
        // arsort($predictedRatings);

        return $predictedRatings;
    }
}
