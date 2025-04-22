<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = review::with('user')
        ->where('id', Auth::id()) // Show only posts created by the logged-in user
        ->get();

    return view('review.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.create');
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
            'description'=>'required',
            'bus_id'=>'required',
            
        ]);
        review::create([
            'user_id' => $request->user_id,
            'description'=>$request->description,
            'bus_id'=>$request->bus_id,
            'created_by' => Auth::id(), // Add the authenticated user's ID
        ]);

        return redirect()->route('review.index')->with('success', 'Review created successfully.');
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
                $review = review::where('id', $id)->
                with('creator')
                    ->where('id', Auth::id()) // Ensures the post belongs to the logged-in user
                    ->first();
        
                // If the seats is not found, redirect with an error message
                if (!$review) {
                    return redirect()->route('review.index')->with('error', 'Review not found or unauthorized.');
                }
        
                // Return the view for showing the post details
                return view('review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = review::find($id);

        if (!$review) {
            return redirect()->route('review.index')->with('error', 'Review not found.');
        }

        return view('review.edit', compact('review'));
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
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}
