<?php

namespace App\Http\Controllers;

use App\proficiency;
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

            return response()
            ->json([
                'model' => $proficiency
            ]);
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
