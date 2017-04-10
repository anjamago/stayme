<?php

namespace App\Http\Controllers;
use App\Departmen;
use App\Citie;
use App\Outskirt;
use App\Choise;
use App\Lease_type;
use App\Lease;
use App\Choices_lease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PropietaryController extends Controller
{
    //
    public function index(){
        $res=DB::table('leases')->get();
        return view('propietary/index');
    }
    public function all(){
        $ofertas = DB::table('leases')
            ->join('choices_leases', 'leases.id_lease', '=', 'choices_leases.id_lease')
            ->join('choises', 'choices_leases.id_choice', '=', 'choises.id_choise')
            ->join('departmens', 'leases.id_departmen', '=', 'departmens.id_departmen')
            ->join('cities', 'leases.id_city', '=', 'cities.id_city')
            ->join('outskirts', 'leases.id_outskirt', '=', 'outskirts.id_outskirt')
            ->join('genders','leases.id_gender','=','genders.id_gender')
            ->join('rols','leases.id_role','=','rols.id_rol')
            ->where('leases.id_user',1)
            ->get();
           
            return view('propietary/advertisements')->with('ofertas',$ofertas);
    }

    public function formOferta(){
        $cities = Citie::all();
        $departmes = Departmen::all();
        $outskirt = Outskirt::all();
        
        return view('propietary/FormOferta')->with('info',
             array(
                    'cities'=>$cities,
                    'departmes'=>$departmes,
                    'outskirt'=>$outskirt,
                    'choices' =>$this->getChoicesHb(),
                    'lease_type'=> Lease_type::all()
             )
        );
    }
    public function registerOferta(Request $request){

       
        if($request->input('_token')){
           $lease = new Lease;
           $choicesLease = new Choices_lease;
           $item = array('HAB'=>$request->input('hab'),'SEV'=>$request->input('sev'),'ACT'=>$request->input('act'));
 
           $lease->id_city =$request->input('city');
           $lease->id_outskirt=$request->input('outskirt');
           $lease->id_departmen=$request->input('departmen');
           $lease->id_lease_type=$request->input('lease');
           $lease->id_lease_tiame=$request->input('lease_tiame');
           $lease->id_gender=$request->input('gender');
           $lease->id_user=1;
           $lease->id_role=$request->input('occupation');
           $lease->prince=$request->input('price');
           $lease->description=$request->input('descripcion');
           $lease->rules=$request->input('reglas');
           $lease->room=$request->input('quantity');
           $lease->cause='';
           $lease->address=$request->input('address');
           $lease->enabled=1;
           #$lease->save();
           

           $idLease = Lease::where('id_user',$lease->id_user)
                    ->get();
           $idLease= $idLease->last()->id_lease;
            
            foreach($item as $key=> $datas){
                foreach($datas as $value)
                {
                    DB::table('choices_leases')->insert(
                        [
                            'id_lease' => $idLease,
                            'id_user' => $lease->id_user,
                            'id_choice' => $value,
                            'type' => $key,
                        ]
                    );
              
                }
            }
            ##guardar imagen

           return redirect('propietary');
           
        }
        
    }

    private function getChoicesHb(){
         $choices = DB::select(
             "(SELECT * FROM `choises` WHERE type ='HAB') 
                UNION ( SELECT * FROM `choises` WHERE type='SEV')
                UNION (SELECT * FROM `choises` WHERE type='ACT');"
         );
       return $choices;           
    }
}
