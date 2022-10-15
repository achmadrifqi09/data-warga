<?php

namespace App\Http\Controllers;

use App\Exports\AllDataExport;
use Carbon\Carbon;
use App\Models\Data;
use App\Models\User;
use App\Models\State;
use App\Models\Gender;
use App\Models\Status;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Models\Neighbourhood;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller
{


    public function index(){

        $mele = Data::where('gender_id', 1)->count();
        $famele = Data::where('gender_id', 2)->count();
        
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
    
        

        return view('dashboard', [
            'dataset' => Data::all(),
            'mele' => $mele,
            'famele' => $famele,
            'count_total'=> Data::all()->count(),
            'user' => User::all(),
            'married' => Data::where('status_id', 1)->count(),
            'not_married' => Data::where('status_id', 2)->count(),

            
            'childern' => $childern->count(),
            'teen' => $teen->count(),
            'adult' => $adult->count(),
            'pre_elderly' => $pre_elderly->count(),
            'elderly' => $elderly->count()
          
        ]);
    }

    public function printView(){
        return view('print-view', [
            'dataset' => Data::all()
        ]);
    }

    public function exel(){
        $dataset = Data::all();
        $dataset_array[] = array('Nama', 'NIK', 'Nomor KK', 'Alamat', 'RT', 'Agama', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir (tahun-bulan-tanggal)', 'Status Perkawinan', 'Pekerjaan', 'Kewarganegaraan');

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
          return Excel::download(new AllDataExport($dataset_array), 'data-warga.xlsx');
    }


    public function create(){
        return view('add-data', [
            'religions' => Religion::all(),
            'genders' => Gender::all(),
            'states' => State::all(),
            'statuses' => Status::all(),
            'neighbourhoods' => Neighbourhood::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' =>'required|max:255',
            'nik' => 'required',
            'address' => 'required',
            'religion_id' => 'required',
            'gender_id' => 'required',
            'neighbourhood_id' => 'required',
            'number_of_kk' =>'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'status_id' => 'required',
            'state_id' => 'required',
            'proffesion' => 'required'
        ]);

        
        Data::create($validateData);
        return redirect('/dashboard')->with('success', 'Data berhasil ditambahkan!');
     
    }

    public function destroy($id){
        $deletedData = Data::find($id);
        $deletedData->delete();
        return redirect('/dashboard')->with('success', 'Data berhasil dihapus!');
    }

    public function edit($id){

        
        $editData = Data::find($id);
        return view('edit-data', [
            'data' => $editData,
            'religions' => Religion::all(),
            'genders' => Gender::all(),
            'states' => State::all(),
            'statuses' => Status::all(),
            'neighbourhoods' => Neighbourhood::all()     
        ]);
    }

    public function update(Request $request,$id){
  
        $data = Data::findorfail($id);
        $data->update($request->all());
    
        return redirect('/dashboard')->with('success', 'Data berhasil di ubah!');
    }

   
}
