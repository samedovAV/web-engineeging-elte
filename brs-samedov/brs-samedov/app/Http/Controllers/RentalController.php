<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $pendingRentals = Borrow::where('status', 'PENDING')->get();
        $acceptedRentals = Borrow::where('status', 'ACCEPTED')->whereDate('deadline', '>=', now())->get();
        $lateRentals = Borrow::where('status', 'ACCEPTED')->whereDate('deadline', '<', now())->get();
        $rejectedRentals = Borrow::where('status', 'REJECTED')->get();
        $returnedRentals = Borrow::where('status', 'RETURNED')->get();

        return view('my-rentals.index', compact('pendingRentals', 'acceptedRentals', 'lateRentals', 'rejectedRentals', 'returnedRentals'));
    }
}
