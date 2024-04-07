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

    public function indexLibrarian()
    {
        $pendingRentals = Rental::where('status', 'PENDING')->get();
        $acceptedInTimeRentals = Rental::where('status', 'ACCEPTED')->whereDate('deadline', '>=', now())->get();
        $lateRentals = Rental::where('status', 'ACCEPTED')->whereDate('deadline', '<', now())->get();
        $rejectedRentals = Rental::where('status', 'REJECTED')->get();
        $returnedRentals = Rental::where('status', 'RETURNED')->get();

        return view('rentals.index', compact('pendingRentals', 'acceptedInTimeRentals', 'lateRentals', 'rejectedRentals', 'returnedRentals'));
    }

    public function show(Borrow $rental)
    {
        return view('rental.show', compact('rental'));
    }

    public function showLibrarian(Rental $rental)
    {
        return view('rentals.show_librarian', compact('rental'));
    }

    public function updateLibrarian(Request $request, Rental $rental)
    {
        $validatedData = $request->validate([
            'status' => ['required', 'in:PENDING,ACCEPTED,REJECTED,RETURNED'],
            'deadline' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        $rental->update($validatedData);

        return redirect()->route('rentals.show.librarian', $rental)->with('success', 'Rental details updated successfully.');
    }
}
