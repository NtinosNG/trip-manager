<?php

namespace App\Http\Controllers;

use App\Passenger;
use App\Trip;
use Illuminate\Http\Request;
use Auth;

class PassengersController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::Check()) {
            return view('add_passenger');
        }
        else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $passenger = new Passenger();
        $passenger->title = $request->get('title');
        $passenger->first_name = $request->get('firstname');
        $passenger->surname = $request->get('surname');
        $passenger->passport_id = $request->get('passport_id');
        $passenger->user_id = Auth::user()->id;
        
        $passenger->save();
        
        return redirect('/home')->with('success', 'Passenger added successfully!');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {

        $thisPassengerTrips = $passenger->trips()->get();

        for($i = 0; $i < count($thisPassengerTrips); $i++) {
            $trip = Trip::find($thisPassengerTrips[$i]['id']);

            if(count($trip->passengers) == 1) {
                $passenger->trips()->detach($trip);
                $trip->delete();
            } 
            else
            {
                $passenger->trips()->detach($trip);
            }
        }

        $passenger->delete();

        return redirect('/home')->with('success', 'Passenger removed successfully!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Passenger  $passenger
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Passenger $passenger)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Passenger  $passenger
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Passenger $passenger)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Passenger  $passenger
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Passenger $passenger)
    // {
    //     //
    // }

  
}
