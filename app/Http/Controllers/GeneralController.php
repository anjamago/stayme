<?php

namespace App\Http\Controllers;
use App\Departmen;
use App\Citie;
//use App\role;
use App\Outskirt;
use Illuminate\Http\Request;
use App\userActive;
use App\Permission;
use App\PermissionUsers;
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
    public function activeUser($id=null,$token = null){

        $iduser= $id==null?@session('id'):$id;

        $userAct = \Illuminate\Support\Facades\DB::select("SELECT active FROM user_actives WHERE user_id ={$iduser}");

        if(count($userAct) < 1 ){

                if (empty($userAct[0]['active'])) {
                    $user = new userActive();
                    $user->user_id = $iduser;
                    $user->active = 0;
                    $user->save();

                }

        }elseif(count($userAct) > 0){
            $active = $userAct[0];

            if($active->active == 1){
                $permission = Permission::all();
                return view('perfil')->with(['status'=>'autorizado',"roles"=>$permission,"id"=>$iduser]);
            }elseif($active->active==0 && $token !=null ){
                $user = userActive::find($iduser);
                $user->active = 1;
                $user->save();
                $permission = Permission::all();
                return view('perfil')->with(['status'=>'autorizado',"roles"=>$permission,"id"=>$iduser]);
            }
        }

        return view('perfil')->with('status','noAutorizado');
    }
    public function activeRol(Request $request){

       $this->validate($request,[
           "perfil"=>"required",
           "id_user"=>"required"
        ]);
        $id_perfil = $request->input("perfil");
        $id_user = $request->input("id_user");
        $sqlres= \Illuminate\Support\Facades\DB::select("SELECT id FROM permission_users WHERE id_user ={$id_user}");
        if(count($sqlres) < 1 ) {

            $permissionUser = new PermissionUsers();
            $permissionUser->id_user = $id_user;
            $permissionUser->id_permission = $id_perfil;
            $permissionUser->save();
            return response()->redirectTo("/login");
        }else{
            return response()->redirectTo("/login");
        }
    }
}
