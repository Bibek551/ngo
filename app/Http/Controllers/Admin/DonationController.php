<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
      public function index()
    {
        $donations = Donation::latest()->paginate(10);
        return view('admin.donation.index', compact('donations'));
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('message', 'Delete Successfully');
    }
}