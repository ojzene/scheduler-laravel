<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments',$appointments));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required',
            'slot_time' => 'required',
            'slot_date' => 'required',
        ]);

        if (Appointment::where('slot_time', '=', $request->slot_time)->where('slot_date', '=', $request->slot_date)->exists()) {
            // appointment found
            $request->session()->flash('message', 'Appointment already booked at '. $request->slot_time .' on '. $request->slot_date. ', Please pick another appointment');
            return redirect('/appointments/create');
        }
        else {
            $appointment = Appointment::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'slot_time' => $request->slot_time,
                'slot_date' => $request->slot_date
            ]);
            return redirect('/appointments/' . $appointment->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show',compact('appointment',$appointment));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit',compact('appointment',$appointment));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'phone' => 'required',
            'slot_time' => 'required',
            'slot_date' => 'required',
        ]);

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->slot_time = $request->slot_time;
        $appointment->slot_date = $request->slot_date;
        $appointment->save();
        $request->session()->flash('message', 'Successfully modified the appointment!');
        return redirect('appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        $request->session()->flash('message', 'Successfully deleted the appointment!');
        return redirect('appointments');
    }
}
