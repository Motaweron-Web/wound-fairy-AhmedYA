<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::whereIn('status' , ['new','accepted'])->orderBy('id', 'DESC')->paginate(5);
        $services = Service::orderBy('id', 'DESC')->get();
        return view('Admin.reservation.new', compact('reservations','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('Admin.reservation.info',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $res_status = Reservation::find($id);
        $res_status->update([
            'status' => $request->status
        ]);
        return redirect()->route('reservations.index')->with('message','تم تحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('message','تم الحذف بنجاح');
    }

    public function reservationsLast()
    {
        $reservations = Reservation::whereIn('status' , ['refused','ended'])->orderBy('id', 'DESC')->paginate(5);
        $services = Service::get();
        return view('Admin.reservation.last', compact('reservations','services'));
    }

    public function reservationsNew()
    {
        $reservations = Reservation::whereIn('status' , ['new','accepted'])->orderBy('id', 'DESC')->paginate(5);
        $services = Service::get();
        return view('Admin.reservation.new', compact('reservations','services'));
    }
}
