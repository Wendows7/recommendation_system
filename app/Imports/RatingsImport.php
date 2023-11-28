<?php

namespace App\Imports;

use App\Models\Parameter;
use App\Models\Product;
use App\Models\Rating;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class RatingsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $users = User::where("name", $row[0])->first()->id;
        $products = Product::where("name", $row[1])->first()->id;
        $parameters = Parameter::where("name", $row[2])->first()->id;

        return new Rating([
            "user_id" => $users,
            "product_id" => $products,
            "parameter_id" => $parameters,
            "nilai" => $row[3],
        ]);
    }
}
