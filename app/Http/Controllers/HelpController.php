<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use App\Proficiency;
use Closure;
use Auth;

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
            'especialidade' => 'required',
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

        $prof = request ('especialidade');
        
        foreach ($prof as  $value) {
 
             $user->proficiency()->attach(Proficiency::where('id', $value)->first());
        }
    

        session()->flash('message', 'Doctor entry created successfully!');

        return redirect('/help/home');
   }

}
