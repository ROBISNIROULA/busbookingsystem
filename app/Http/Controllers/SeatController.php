<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class seatController extends Controller
{
    public function index()
    {
        $data['rows'] = Seat::with('creator')
            ->where('id', Auth::id()) // Show only posts created by the logged-in user
            ->get();

        return view('seats.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('seats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'seat_number'=>'required',
            
        ]);
        Seat::create([
            'name' => $request->name,
            'seat_number'=>$request->seat_number,

            'created_by' => Auth::id(), // Add the authenticated user's ID
        ]);

        return redirect()->route('seats.index')->with('success', 'Seats created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the post by ID, but only if it belongs to the logged-in user
        $seats = Seat::where('id', $id)->
        with('creator')
            ->where('id', Auth::id()) // Ensures the post belongs to the logged-in user
            ->first();

        // If the seats is not found, redirect with an error message
        if (!$seats) {
            return redirect()->route('seats.index')->with('error', 'seats not found or unauthorized.');
        }

        // Return the view for showing the post details
        return view('seats.show', compact('seats'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seats = Seat::find($id);

        if (!$seats) {
            return redirect()->route('seats.index')->with('error', 'seats not found.');
        }

        return view('seats.edit', compact('seats'));
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
        $post =Seat::find($id);

        if (!$post) {
            return redirect()->route('seats.index')->with('error', 'seats not found.');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Update the post
        $post->update([
            'title' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('seats.index')->with('success', 'seats updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Seat::find($id);

        if (!$post) {
            return redirect()->route('seats.index')->with('error', 'seats not found.');
        }
        $post->delete();
        return redirect()->route('seats.index')->with('success', 'seats deleted successfully.');
    }


}
