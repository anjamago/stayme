<?php

namespace App\Http\Controllers;
use App\Departmen;
use App\Citie;
use App\image;
use App\Outskirt;
use App\Choise;
use App\Span;
use App\Lease_type;
use App\Lease;
use App\Choices_lease;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PropietaryController extends Controller
{
    //
    public function index(){
        $res=DB::table('leases')->get();
        return view('propietary/index')->with([
            'count'=>count($res)
        ]);
    }
    public function all(){
        $imgs= array();
         $ofertas = DB::select('
                    select  ls.id id_lease, 
                            ls.prince,
                            ls.address,
                            ls.room,
                            departmens.departmen, 
                            cities.city,
                            outskirts.outskirt,
                            genders.gender,
                            permissions.permission
                    
                    from leases ls
                    inner join departmens on ls.id_departmen = departmens.id
                    inner join cities on ls.id_city = cities.id
                    inner join outskirts on ls.id_outskirt = outskirts.id
                    inner join genders on ls.id_gender = genders.id
                    inner join permissions on ls.id_role = permissions.id
                    where ls.id_user = '.Auth::id()
                );
            foreach($ofertas as $key=>$of){
               
                $img = 
                DB::select("select * from images where id_lease =".$of->id_lease);
                
                 array_push($imgs,$img[0]);
            }
            
            return view('propietary/advertisements')->with([
                        'ofertas'=>$ofertas,
                        'imgs'=>$imgs
                        ]);
    }

    public function formOferta(){
        $cities = Citie::all();
        $departmes = Departmen::all();
        $outskirt = Outskirt::all();
        $permission = Permission::all();
        
        return view('propietary/FormOferta')->with('info',
             array(
                    'cities'=>$cities,
                    'departmes'=>$departmes,
                    'outskirt'=>$outskirt,
                    'choices' =>$this->getChoicesHb(),
                    'lease_type'=> Lease_type::all(),
                    'permission'=>$permission,
                    'spans'=>Span::all(),
             )
        );
    }
    public function registerOferta(Request $request){

       
        if($request->input('_token')){
           $lease = new Lease;
           $choicesLease = new Choices_lease;

           $item = array(
              'HAB'=>json_decode($request->input('hab')),
              'SEV'=>json_decode($request->input('sev')),
              'ACT'=>json_decode($request->input('act'))
            );
 
           $lease->id_city =!empty($request->input('city')) ?$request->input('city'):'';
           $lease->id_outskirt=!empty($request->input('outskirt'))?$request->input('outskirt'):'';
           $lease->id_departmen=!empty($request->input('departmen'))?$request->input('departmen'):'';
           $lease->id_lease_type=!empty($request->input('lease'))?$request->input('lease'):'';
           $lease->id_lease_tiame=!empty($request->input('lease_tiame'))?$request->input('lease_tiame'):'';
           $lease->id_gender=!empty($request->input('gender'))?$request->input('gender'):'';
           $lease->id_user=Auth::id();
           $lease->id_role=!empty($request->input('occupation'))?$request->input('occupation'):'';
           $lease->prince=!empty($request->input('price'))?$request->input('price')'';
           $lease->description=!empty($request->input('descripcion'))?$request->input('descripcion'):'';
           $lease->rules=!empty($request->input('reglas'))?$request->input('reglas'):'';
           $lease->room=!empty($request->input('quantity'))?$request->input('quantity'):'';
           $lease->cause='';
           $lease->address=!empty($request->input('address'))?$request->input('address'):'';
           $lease->enabled=1;

           $lease->save();

            $idLease = Lease::where('id_user',$lease->id_user)
                ->get();

            $idLease= $idLease->last()->id;

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
            //http_response_code(200);
            print $idLease;
        }
        
    }
    public function imgLoad(Request $request, $id = null){
        $idLease = Lease::where('id_user',Auth::id())
            ->get();
        $idLease= $idLease->last()->id;
        $files = $request->file('file');
        for($i=0;$i<=count($request->file('file'))-1;$i++) {
            $file = $files[$i];
            $dir = $idLease;
            $filename = $idLease . "-" . $file->getClientOriginalName();
            $path = 'ofertas/' . Auth::user()->name . '/' . $dir . '/';
            $file->move($path, $filename);

            DB::table('images')->insert
            (
                [
                    'id_lease' => $idLease,
                    'url_img' => $path . $filename
                ]
            );
            $img = image::where(
                "id_lease", $idLease
            )->get();
        }
        $id_img = $img->last()->id;
        print $id_img;

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
