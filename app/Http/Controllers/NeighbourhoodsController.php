<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Neighbourhood;
use App\Exports\AllDataExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class NeighbourhoodsController extends Controller
{
    protected $search_id;
    public function index(){

        if(request('search_id')){
            $data = Data::where('neighbourhood_id', 'like', '%' . request('search_id') . '%');

            $var_mele = Data::where([
                'gender_id' => '1',
                'neighbourhood_id' => request('search_id')
            ]);

            $var_famele = Data::where([
                'gender_id' => '2',
                'neighbourhood_id' => request('search_id')
            ]);

            $married = Data::where([
                'status_id' => '1',
                'neighbourhood_id' => request('search_id')
            ]);

            $not_married = Data::where([
                'status_id' => '2',
                'neighbourhood_id' => request('search_id')
            ]);

            $childern = Data::get()->filter(function($data, $key) {
                return (Carbon::parse($data->date_of_birth)->age >= 0 and Carbon::parse($data->date_of_birth)->age <= 16);
            });
            $teen = Data::get()->filter(function($data, $key) {
                return (Carbon::parse($data->date_of_birth)->age >= 17 and Carbon::parse($data->date_of_birth)->age <= 25);
            });
            $adult = Data::get()->filter(function($data, $key) {
                return (Carbon::parse($data->date_of_birth)->age >= 26 and Carbon::parse($data->date_of_birth)->age <= 45);
            });
            $pre_elderly = Data::get()->filter(function($data, $key) {
                return (Carbon::parse($data->date_of_birth)->age >= 46 and Carbon::parse($data->date_of_birth)->age <=55);
            });
            $elderly = Data::get()->filter(function($data, $key) {
                return (Carbon::parse($data->date_of_birth)->age >= 56);
            });

           

            return view('neighbourhoods-data', [
                'neighbourhoods' => Neighbourhood::all(),
                'dataset' => $data->get(),
                'isValid' => true,
                 'mele' => $var_mele->count(),
                'famele' => $var_famele->count(),
                'count_total' => $data->count(),
                'married' => $married->count(),
                'not_married' => $not_married->count(),
                'neighbourhoods_id' => request('search_id'),

                'childern' => $childern->filter(function($data, $key) {
                    return ($data->neighbourhood_id == request('search_id'));
                })->count(),
                'teen' => $teen->filter(function($data, $key) {
                    return ($data->neighbourhood_id == request('search_id'));
                })->count(),
                'adult' => $adult->filter(function($data, $key) {
                    return ($data->neighbourhood_id == request('search_id'));
                })->count(),
                'pre_elderly' => $pre_elderly->filter(function($data, $key) {
                    return ($data->neighbourhood_id == request('search_id'));
                })->count(),
                'elderly' => $elderly->filter(function($data, $key) {
                    return ($data->neighbourhood_id == request('search_id'));
                })->count(),
                'old_input' => request('search_id')
            ]);

        }else{
            return view('neighbourhoods-data', [
                'isValid' => false,
                'neighbourhoods' => Neighbourhood::all(),
                'old_input' => request('search_id')
            ]);
        }
       
    }

    public function excel($id){

        
        $dataset = Data::where('neighbourhood_id', 'like', '%' . $id . '%')->get();
        $dataset_array[] = array('Nama', 'NIK', 'Nomor KK', 'Alamat', 'RT', 'Agama', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir (yyyy-mm-dd)', 'Status Perkawinan', 'Pekerjaan', 'Kewarganegaraan');

        foreach($dataset as $data){
            $dataset_array[] = array(
                'Nama' => $data->name,
                'NIK' => $data->nik,
                'Nomor KK' => $data->number_of_kk,
                'Alamat' => $data->address,
                'RT' => $data->neighbourhood->neighbourhood_name,
                'Agama' => $data->religion->religion_name,
                'Jenis Kelamin' => $data->gender->gender_name,
                'Tempat Lahir' =>$data->place_of_birth,
                'Tanggal Lahir' => $data->date_of_birth,
                'Status Perkawinan' => $data->status->status_name,
                'Pekerjaan' => $data->proffesion,
                'Kewarganegaraan' =>$data->state->state_name
            );
       }
       return Excel::download(new AllDataExport($dataset_array), "data-warga-RT{$id}.xlsx");
    }

    public function printView($id){
    
        return view('neighbourhoods-print-view', [
            'dataset' => Data::where('neighbourhood_id', 'like', '%' . $id . '%')->get()
        ]);
    }
}
