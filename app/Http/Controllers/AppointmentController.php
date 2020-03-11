<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use Auth;
use App\role;
use Carbon\Carbon;
use App\Proficiency;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('help');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $s = $request->input('s');

            $appointments = Appointment::search($s)->orderByDesc('data')
            ->paginate(10);
            
            return view ('help.appointment.home', compact('appointments', 's'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::with(['role' => function($q){
            $q->where('name', 'Doctor');
            }])->get();
        
        $doctors = User::has('role', 1)
        ->orderBy('name', 'desc')->get();
        $proficiencies = Proficiency::all();
        
        return view ('help.appointment.register', compact('users', 'proficiencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $this->validate(request(),  [
            'name' => 'required|string|max:255',
            'sns' => 'required|integer',
            'especialidade' => 'required',
            'data' => 'required|date|after_or_equal:tomorrow',
            'user_id' => 'required|integer',
        ]);

        $appointment = Appointment::create([
            
            'name' => request('name'),
            'sns' => request ('sns'),
            'especialidade' => request ('especialidade'),
            'data' => request ('data'),
            'user_id' => request ('user_id'),
            'realizada' => (0)
        ]);

        session()->flash('message', 'Appointment created successfully!');
        
        return redirect('/help/appointment/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $appointment = Appointment::with('user', 'items')->findOrFail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $users = User::whereHas('role', function($q){
            $q->where('name', 'Doctor');
            })->get();

        $proficiencies = Proficiency::All();
        return view ('help.appointment.edit', compact('appointment', 'users', 'proficiencies'));
    }

    public function editD($id) 
    {

        $appointment = Appointment::find($id);
        return view ('help.appointment.edit', compact('appointment', 'users', 'proficiencies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment, $id)
    {
         $this->validate(request(),  [
            'name' => 'required|string|max:255',
            'sns' => 'required|integer',
            'especialidade' => 'required',
            'data' => 'required|date|after_or_equal:tomorrow',
            'user_id' => 'required|integer',
        ]);

        $appointment = Appointment::findOrFail($id);


        if ($appointment->realizada == 0){
               $appointment->update($request->all());

                session()->flash('message', 'Appointment updated successfully!');
        
                return redirect('/help/appointment/home');
        }
        else 
        {
           session()->flash('message', 'Impossible to updade an medical consultation alredy performed');
            return redirect('/help/appointment/home');
        }
     
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

         session()->flash('message', 'Appointment deleted successfully!');
        
        return redirect('/help/appointment/home');
    }

   

}
