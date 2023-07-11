<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;

class ReservationController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $reservations = Reservation::paginate(5);
        return view('reservation', compact('reservations'));
    }

    public function create($id)
    {
        $room = Room::find($id);
        return view('create', compact('room'));
    }

    public function store(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'roomid' => 'required|integer|exists:rooms,id',
            'customername' => 'required|string|regex:/^[\pL\s\-]+$/u', //allows alphabetic characters and spaces
            'email' => 'required|email',
            'numpeople' => 'required|integer|min:1',
            'checkindate' => 'required|date',
            'checkoutdate' => 'required|date|after_or_equal:checkindate',
            'totalprice' => 'required|numeric|min:0',
        ]);
        $reservation = new Reservation;
        $reservation->room_id = $request->roomid;
        $reservation->customer_name = $request->customername;
        $reservation->email = $request->email;
        $reservation->num_people = $request->numpeople;
        $reservation->check_in_date = $request->checkindate;
        $reservation->check_out_date = $request->checkoutdate;
        $reservation->total_price = $request->totalprice;

        $reservation->save();
        return redirect(route('reservation'))->with('successMsg', 'Room successfully booked');
    }

    public function delete($id)
    {
        Reservation::find($id)->delete();
        return redirect(route('reservation'))->with('successMsg', 'Reservation deleted successfully');
    }
}
