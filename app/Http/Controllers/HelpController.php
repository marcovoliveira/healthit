<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use App\Proficiency;
use Closure;
use Auth;
use DateTime;
use Carbon\Carbon;



class HelpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('help');
        
    }
    
   public function index(){
       return view('help.home');
   }


   public function register(){

       $proficiencies = Proficiency::all();
       return view('help.register', compact('proficiencies'));
   }

   public function store(Request $request){
       
       $this->validate(request(),  [
            'name' => 'required|string|max:255',
            'seg_social' => 'required|integer|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'proficiency' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        

        $user = User::create([
            
            'name' => request('name'),
            'seg_social' => request ('seg_social'),
            'email' => request ('email'),
            'password' => bcrypt(request('password')),
            'hora_in' => request ('hora_in'),
            'hora_out' => request ('hora_out')
        ]);
        

        $user->role()->attach(Role::where('name', 'Doctor')->first());
        $prof = request ('proficiency');

        foreach ($prof as  $value) {
             $user->proficiencies()->attach(Proficiency::where('id', $value)->first());
        }
        session()->flash('message', 'Doctor entry created successfully!');

        return redirect('/help/home');
   }

   public function show($id)
   {
       $user = User::findOrFail($id);

       return response()
            ->json([

                'model' => $user

            ]);
   }

   public function edit($id)
   {
       $user = User::findOrFail($id);

       return response()
            ->json([
                'form' => $user,
                'option' => []
            ]);      
   }

   public function update(Request $request, $id)
   {


        $this->validate(request(),  [
            'name' => 'required|string|max:255',
            'seg_social' => 'required|integer|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'especialidade' => 'required',

            'password' => 'required|string|min:6|confirmed',
        ]);
        


        $user = User::findOrFail($id);
        


        $user->update($request->all());

        $user->role()->attach(Role::where('name', 'Doctor')->first());

        $prof = request ('especialidade');
        
        foreach ($prof as  $value) {
 
             $user->proficiency()->attach(Proficiency::where('id', $value)->first());
        }
    

        session()->flash('message', 'Doctor updated successfully!');

        return redirect('/help/home');


   }

   public function findUsersDate(Request $request){

    $dt  = $request->data;
    $e = $request->e;
    
    //$createDate = new DateTime($dt);
    $dtparse =  str_replace('T', ' ', $dt);
    $date = date('H:i:s', strtotime($dtparse));
    
    $dtcarbon = Carbon::parse($dt);


    



    $parsetry =  str_replace('T', ' ', $dt);
    $try2 = strtotime($parsetry);
    $try = $try2 - (15 * 100);
    $dtstart = date("Y-m-d H:i:s", $try);
    $try4 = $try2 + (15 * 100);
    $dtend = date("Y-m-d H:i:s", $try4);





            // Consulta começa as 19H-----19:30H
            // Marcar 18H30 ou para as 19:30H 
            // logo so posso marcar para 
        $users=User::select('id', 'name', 'hora_in', 'hora_out')
        ->whereHas('proficiencies', function($q) use($e){
            $q->where('name', $e);
        })
        ->whereHas('appointment', function($w) use($dtend, $dtstart){
            $w->whereNotBetween('data', array($dtstart, $dtend)); // ->where('data', '=', $dtend);       //  where('data', '', $dtstart)
            // esta query na parte dos appointments não esta a funcionar!
        })
        ->where('hora_in', '<=', $date)
        ->where('hora_out', '>', $date)->get();


        return response()->json($users);


   }

/*   public function findEspecialidadeDate(Request $request){

    $especialidade  = $request->data;
    
        $users=User::select('id', 'name', 'hora_in')
        ->whereHas('proficiencies', function($q) use($especialidade){
            $q->where('name', $especialidade);
        })->get();
        
    
        return response()->json($users);


   }
*/

}
