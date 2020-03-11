<?php

namespace App\Http\Controllers;

use App\Proficiency;
use App\User;
use App\role;
use Illuminate\Http\Request;

class ProficiencyController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('help');
        
    }
    
        public function index(Request $request)
    {
         $s = $request->input('s');

            $proficiencies = Proficiency::search($s)
            ->paginate(10);
            
            return view ('help.proficiency.home', compact('proficiencies', 's'));
    }

        public function create()
        {
        $proficiencies = Proficiency::all();

        return view ('help.proficiency.register', compact('proficiencies'));
        }

        public function store (Request $request)
        {
                $this->validate(request(),  [
                'name' => 'required|string|max:50|unique:proficiencies',
            ]);

            $proficiency = Proficiency::create([
                'name' => request('name'),
            ]);

            session()->flash('message', 'Proficiency created successfully!');
            
            return redirect('/help/proficiency/home');

        }

        public function show ($id)
        {
            $proficiency = Proficiency::findOrFail($id);

            
        }

        public function edit ($id)
        {
            $proficiency = Proficiency::find($id);

            return view ('help.proficiency.edit', compact('proficiency'));
        }

        public function update (Request $request, $id)
        {
           $this->validate($request, [
                'name' => 'required|string|max:50|unique:proficiencies'
            ]);
        
        $proficiency = Proficiency::findOrFail($id);
        $proficiency->update($request->all());

        session()->flash('message', 'Proficiency updated successfully!');
        
        return redirect('/help/proficiency/home');

        }

        public function showAttach() 
        {
            $proficiencies = Proficiency::All();
            $users = User::with(['role' => function($q){
            $q->where('name', 'Doctor');
            }])->get();
            /*$user = User::all();
            $users = $user->where('role', 'Doctor');*/

            return view ('help.proficiency.attach', compact('proficiencies', 'users'));

        }


        public function attach(Request $request) 
        {
             
            $user_id = $request->input('user_id');
            $prof_id = $request->input('prof_id');      

            $user = User::findOrFail($user_id);

            $user->proficiencies()->syncWithoutDetaching(Proficiency::where('id', $prof_id)->first());


            /*if($user->proficiencies()->contains(Proficiency::where('id', $prof_id)->first())) {
                 $user->proficiencies()->attach(Proficiency::where('id', $prof_id)->first());
                 session()->flash('message', 'Proficiency attached successfully!');
                return redirect('/help/proficiency/home');
            }
*/              session()->flash('message', 'Proficiency attached successfully!');
                return redirect('/help/proficiency/home');
               

             

        

        }

        public function destroy($id)
        {
            $proficiency = Proficiency::findOrFail($id);
            $proficiency->user()->detach();
            /*$proficiency->user()->detaching(Proficiency::where($id, $proficiency_id)->first());*/
            $proficiency->delete();

            session()->flash('message', 'Proficiency deleted successfully!');
        
            return redirect('/help/proficiency/home');

        }

}
