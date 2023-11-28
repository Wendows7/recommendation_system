<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'nilai',
        'product_id',
        'parameter_id',
        'user_id',

    ];
    protected $with = [
        'user',
        'product',
        'parameter',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adjustedCosineSimilarity($item1Ratings, $item2Ratings, $averageRatings) {
        $numerator = 0;
        $denominator1 = 0;
        $denominator2 = 0;

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
        // dd($preferences);

        foreach($preferences as $otherPerson => $values)
        {
            foreach($values as $key => $value)
            {
                $result[$key][$otherPerson] = $value;
            }
        }

        return $result;
    }

    public static function computeAverageRatings($ratings) {
        $averageRatings = array();
        foreach($ratings as $key =>$value){
            foreach($value as $keys =>$values){

                // dd($value);
                $averageRatings[$key] = array_sum([$values->nilai]) / count([$values]);
            }



        }
        // dd($averageRatings);
        return $averageRatings;
    }

    public function calculateItemAverages()
    {
        // Mengambil semua data rating dari tabel "ratings"
        $ratings = Rating::where("parameter_id", 6)->get();

        // Menggunakan koleksi Laravel untuk menghitung rata-rata rating setiap item
        $itemAverages = $ratings->groupBy('product_id')
            ->map(function ($itemRatings, $itemId) {
                $averageRating = $itemRatings->avg('nilai');
                return ['product_id' => $itemId, 'average_rating' => $averageRating];
            });

        // Lakukan perulangan jika diperlukan, atau lakukan operasi lain dengan data rata-rata item
        // Misalnya, Anda dapat menyimpan hasilnya di dalam tabel baru atau di cache untuk digunakan pada proses rekomendasi.
        // ...

        return $itemAverages;
    }

    public function recommendItemsForUser($parameterId)
{
    // Panggil method calculateItemAverages() untuk mendapatkan data rata-rata rating item
    $itemAverages = $this->calculateItemAverages();
$product = Rating::where("parameter_id", $parameterId)->get();

  $newproduct = $product->unique('product_id');
        $transform = $newproduct->mapToGroups(function ($key){
            return [$key["product_id"] => $key];
        });
    // Ambil data rating untuk item yang belum pernah dinilai oleh pengguna
    // $unratedItemIds = $product;


    // Ambil 5 item dengan rating tertinggi untuk direkomendasikan
    $recommendedItems = $itemAverages->where("parameter_id", $newproduct->product_id)
    ->sortByDesc('average_rating')
    ->take(5);
    dd($recommendedItems);

    return $recommendedItems;
}


    public function computeItemSimilarityMatrix($ratings) {
        $newratings = $this->transformPreferences($ratings);
        $averageRatings = $this->computeAverageRatings($newratings);
        $itemSimilarityMatrix = array();

        foreach ($ratings as $itemId1 => $itemRatings1) {
            foreach ($ratings as $itemId2 => $itemRatings2) {
                if ($itemId1 != $itemId2) {
                    $similarity = $this->adjustedCosineSimilarity($itemRatings1, $itemRatings2, $averageRatings);
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
                        $numerator += $userRatings[$item2] * $similarity;
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
        arsort($predictedRatings);

        return $predictedRatings;
    }

}
