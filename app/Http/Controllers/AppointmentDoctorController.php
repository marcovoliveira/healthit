<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use Auth;
use App\role;
use Carbon\Carbon;
use App\Proficiency;
use Illuminate\Http\Request;

class AppointmentDoctorController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor');

        
    }
  

     public function index(Request $request)
    {        
        $s = $request->input('s');

            $appointments = Appointment::search($s)->orderByDesc('data')->where('user_id', '=', Auth::id())
            ->paginate(10);
            
           return view ('medic.appointment.home', compact('appointments', 's'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {


        $appointment = Appointment::find($id);

        return view ('medic.appointment.show', compact('appointment'));
       
    }



    public function edit($id) 
    {

        $appointment = Appointment::find($id);
        return view ('medic.appointment.edit', compact('appointment', 'users', 'proficiencies'));

    }

   
    public function update(Request $request, Appointment $appointment, $id)
    {

        
        $this->validate(request(), [
            'sintomas' => 'required|string|max:255',
            'diagnostico' => 'required|string|max:255',
        ]);




        $appointment = Appointment::findOrFail($id);
        $r = $appointment->realizada;

        if ($r == 0){
                       
            $appointment->sintomas = request('sintomas');
            $appointment->diagnostico = request('diagnostico');
            $appointment->realizada = 1 ;   

             $appointment->save();

 
                session()->flash('message', 'Appointment performed successfully!');
        
                return redirect('/medic/appointment/home');
        }
        else 
        {
           session()->flash('message', 'Impossible to perform a medical appointment alredy performed');

            return redirect('/medic/appointment/home');
        }
    }

}
