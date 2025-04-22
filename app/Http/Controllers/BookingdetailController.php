<?php

namespace App\Http\Controllers;

use App\Models\Bookingdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BookingdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Bookingdetail::with('creator')->get();

        return view('bookingdetails.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingdetails = Bookingdetail::all();
        return view('bookingdetails.create',compact('bookingdetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'seat_id'=>'required',
            'route_id'=>'required',
            'price_id'=>'required',
            'booked_date'=>'required',
            'bus_id'=>'required',
            'status'=>'required',
            
        ]);
        Bookingdetail::create([
            'user_id' => $request->user_id,
            'seat_id'=>$request->seat_id,
            'route_id'=>$request->route_id,
            'price_id'=>$request->price_id,
            'booked_date'=>$request->booked_date,
            'bus_id'=>$request->bus_id,
            'status'=>$request->status,

            // 'created_by' => Auth::id(), // Add the authenticated user's ID
        ]);

        return redirect()->route('bookingdetails.index')->with('success', 'Booking Detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookingdetail = Bookingdetail::where('id', $id)->
        with('creator')
            ->where('id', Auth::id()) // Ensures the post belongs to the logged-in user
            ->first();

        // If the seats is not found, redirect with an error message
        if (!$bookingdetail) {
            return redirect()->route('bookingdetails.index')->with('error', 'Booking Detail not found or unauthorized.');
        }

        // Return the view for showing the post details
        return view('bookingdetails.show', compact('bookingdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookingdetail = Bookingdetail::find($id);

        if (!$bookingdetail) {
            return redirect()->route('bookingdetails.index')->with('error', 'Booking detail not found.');
        }

        return view('bookingdetails.edit', compact('bookingdetail'));
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
        $bookingdetail =Bookingdetail::find($id);

        if (!$bookingdetail) {
            return redirect()->route('bookingdetails.index')->with('error', 'Booking detail not found.');
        }

        // Validate the request
        $request->validate([
            'user_id' => 'required|string|max:255',
            'seat_id' => 'required|string|max:255',
            'route_id' => 'required|string|max:255',
            'price_id' => 'required|string|max:255',
            'booked_date' => 'required|string|max:255',
            'Bus_id'=>'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Update the post
        $bookingdetail->update([
            'user_id' => $request->user_id,
            'seat_id' => $request->seat_id,
            'route_id' => $request->route_id,
            'price_id' => $request->price_id,
            'booked_date' => $request->booked_date,
            'bus_id' => $request->bus_id,
            'status' => $request->status,
        ]);

        return redirect()->route('bookingdetails.index')->with('success', 'Booking detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingdetail = Bookingdetail::find($id);

        if (!$bookingdetail) {
            return redirect()->route('bookingdetails.index')->with('error', 'Booking detail not found.');
        }
        $bookingdetail->delete();
        return redirect()->route('bookingdetails.index')->with('success', 'Booking detail deleted successfully.');
    }
}
