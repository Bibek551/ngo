<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingForm;
use Illuminate\Http\Request;

class BookingFormController extends Controller
{
     public function index()
    {
        $bookings = BookingForm::latest()->paginate(10);
        return view('admin.booking.index', compact('bookings'));
    }

    public function destroy(BookingForm $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('message', 'Delete Successfully');
    }
}