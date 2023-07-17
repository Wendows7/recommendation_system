<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Model
{
    use HasFactory;
public function showMinute()
{

    $request = session()->get('waktuLogin');
    $waktuLogin = $request;
    $selisihMenit = $waktuLogin->diffForHumans();

    return $selisihMenit;
}
   
}
