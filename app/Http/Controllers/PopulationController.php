<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Data;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function cart(){
        $mele = Data::get()->filter(function($data, $key){
            return (Carbon::parse($data->date_of_birth) > Carbon::now()->subYear(3));
        });

      

        dd($mele);
       
    }
}
