<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use App\Passenger;
use Auth;

class TripsController extends Controller
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

            $passengers = Passenger::All();
            return view('add_trip')->with('passengers', $passengers);
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
        $trip = new Trip();
        $trip->departure_airport_code = $request->get('departure_airport_code');
        $trip->arrival_airport_code = $request->get('arrival_airport_code');
        $trip->departure_datetime = $request->get('departure_datetime');
        $trip->arrival_datetime = $request->get('arrival_datetime');

        $trip->save();

        $passengers =  Passenger::find($request->get('passenger'));
        $trip->passengers()->attach($passengers);

        return redirect('/home')->with('success', 'Trip added successfully!');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->passengers()->detach($trip);
        $trip->delete();

        return redirect('/home')->with('success', 'Trip removed successfully!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Trip  $trip
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Trip $trip)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Trip  $trip
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Trip $trip)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Trip  $trip
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Trip $trip)
    // {
    //     //
    // }

}
