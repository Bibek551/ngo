<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
      public function index()
    {
        $volunteers = Volunteer::latest()->paginate(10);
        return view('admin.volunteer.index', compact('volunteers'));
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('admin.volunteers.index')->with('message', 'Delete Successfully');
    }
}