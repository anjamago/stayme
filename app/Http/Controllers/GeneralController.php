<?php

namespace App\Http\Controllers;
use App\Departmen;
use App\Citie;
//use App\role;
use App\Outskirt;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    private $json = array(
            'hasError' =>false,
            'errors' =>'',
            'hasSuccess'=>true,
            'success'=>''
    );
    //departamento
    public function departmesAll(){
        $depart = Departmen::all();

        die(json_encode($depart,true));
    }

    //ciudades
    public function citiesAll(){
        $cities = Citie::all();
        die(json_encode($cities,true));
    }

    public  function citiesFiel($id){
        $cities = Citie::where('id_departmen',$id)
                            ->orderBy('city','desc')
                            ->get();
        $this->json['hasError'] = count($cities) < 1 ? true:false;
        $this->json['hasSuccess'] = count($cities) >= 1 ? true:false;
        $this->json['success'] = $cities;
        die(json_encode($this->json,true));
    }
    //barrios

    public function outskirtAll(){
        $outskirt = Outskirt::all();
        die(json_encode($outskirt,true));
    }

    public function outskirtWhere($id){
        $outskirt = Outskirt::where('id_city',$id)
                                ->orderBy('outskirt','desc')
                                ->get();
        $this->json['hasError'] = count($outskirt) < 1 ? true:false;
        $this->json['hasSuccess'] = count($outskirt) >= 1 ? true:false;
        $this->json['success'] =$outskirt;
        die(json_encode($this->json,true));
    }
    //roles
    public function roles(){
        $roles = role::all();
        $this->json['hasError'] = count($roles) < 1 ? true:false;
        $this->json['hasSuccess'] = count($roles) >= 1 ? true:false;
        $this->json['success'] =$roles;
        die(json_encode($this->json,true));

    }
}
