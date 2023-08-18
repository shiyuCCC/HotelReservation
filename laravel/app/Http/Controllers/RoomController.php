<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');

        //Get room IDs for rooms that are booked in requested date range
        $booked_room_ids = Reservation::where(function ($query) use ($startDate, $endDate) {
            $query->where('check_in_date', '<=', $endDate)
                ->where('check_out_date', '>=', $startDate);
        })->pluck('room_id');

        //get rooms that are not in the booked_room_ids array
        $available_rooms = Room::whereNotIn('id', $booked_room_ids)->get();

        return view('room', ['rooms' => $available_rooms]);
    }

    public function showlist()
    {
        $rooms = Room::paginate(5);
        return view('roomlist', compact('rooms'));
    }


    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $contents = file_get_contents($file);

            // Assuming each line in the file represents a room, 
            // and each property of the room is separated by a comma
            $lines = explode(PHP_EOL, $contents);

            foreach ($lines as $line) {
                $room_details = explode(",", $line);

                $room = new Room;
                $room->room_type = $room_details[0];
                $room->capacity = $room_details[1];
                $room->img_url = $room_details[2];
                $room->price_per_night = $room_details[3];
                $room->save();
            }

            return redirect()->back()->with('success', 'File has been uploaded and rooms created successfully');
        } else {
            return redirect()->back()->with('error', 'No file was selected for upload');
        }
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('editroom', compact('room'));
    }

    public function delete($id)
    {
        Room::find($id)->delete();
        return redirect(route('roomlist'))->with('successMsg', 'Room deleted successfully');
    }
}
