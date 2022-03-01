<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;


class BookingController extends Controller
{
     /*****************************************/

    /* Booking List */

    /****************************************/ 

    public function bookingList()
    {

        $bookings = Booking::with('user','coach_class','schedule')->orderby('id', 'Desc')->get();
        return view('admin.bookings.list', compact('bookings'));
    }

    /*****************************************/

    /* view detail */

    /****************************************/
    public function bookingView($id=null)
    {
        $booking = Booking::with('user','coach_class','schedule')->where(['id' => $id])->first();
        return view('admin.bookings.view', ['booking' => $booking]);
    }

    public function acceptBookingRequest(Request $request){
        $details = Booking::find($request->id);
        $details->status = Booking::STATUS_ACCEPT;
        if ($details->save()) {
            return response()->json(['message' => 'Booking status update successfully!']);
        }
        return response()->json(['error' => 'Booking status not updated successfully!!!']);
    }

    public function rejectBookingRequest(Request $request){
        $details = Booking::find($request->id);
        $details->status = Booking::STATUS_REJECT;
        if ($details->save()) {
            return response()->json(['message' => 'Booking status update successfully!']);
        }
        return response()->json(['error' => 'Booking status not updated successfully!!!']);
    }
}
