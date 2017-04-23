<?php

namespace App\Http\Controllers;
use App\Departmen;
use App\Citie;
//use App\role;
use App\Outskirt;
use Illuminate\Http\Request;
use App\userActive;
use App\PermissionUser;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroUser;

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
    public function activeUser($idUs){

        $email= session('email');
        $id = \Illuminate\Support\Facades\DB::select("SELECT id FROM `users` WHERE email ='{$email}'");
        $id = $id[0]->id;
        $userAct = \Illuminate\Support\Facades\DB::select("SELECT active FROM user_actives WHERE user_id ={$id}");
        if(count($userAct) < 1 ){

                if (empty($userAct[0]['active'])) {
                    $user = new userActive();
                    $user->user_id = $id;
                    $user->active = 0;
                    $user->save();

                    //mandamos el email

                    // mail('anjamago@mailinator.com','prueba','mail','cabezera');
                    /* Mail::send('email.prueba',['user'=>'Stayme','email'=>$email],function(Message $message){
                        $message->to('info@stayme.com','info stayme')
                            ->from('anjamago@mailinator.com','pepito')
                            ->subject('Bienvenido a Stayme');
                     });*/
                }

        }elseif(count($userAct) > 0){
            $active = $userAct[0];

            if($active->active == 1){
                return view('perfil')->with('status','autorizado');
            }elseif($active->active==0){
                return view('perfil')->with('status','noAutorizado');
            }
        }

        return view('perfil')->with('status','noAutorizado');
    }
    public function activeRol(Request $request){
        $rol = $request->input('perfil');

        $userPermiso = new PermissionUser();


    }
}
