<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['rows'] = Bus::with('creator')->get();

        return view('bus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $categories = Category::all();
        return view('bus.create',compact('categories'));
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
            'name' => 'required',
            'bus_number'=>'required',
            'status'=>'required',
            'category_id'=>'required',
            
        ]);
        Bus::create([
            'name' => $request->name,
            'bus_number'=>$request->bus_number,
            'status'=>$request->status,
            'category_id'=>$request->category_id,

            'created_by' => Auth::id(), // Add the authenticated user's ID
        ]);

        return redirect()->route('bus.index')->with('success', 'bus created successfully.');
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
                $bus = Bus::where('id', $id)->
                with('creator')
                    ->where('id', Auth::id()) // Ensures the post belongs to the logged-in user
                    ->first();
        
                // If the seats is not found, redirect with an error message
                if (!$bus) {
                    return redirect()->route('bus.index')->with('error', 'bus not found or unauthorized.');
                }
        
                // Return the view for showing the post details
                return view('bus.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);

        if (!$bus) {
            return redirect()->route('bus.index')->with('error', 'bus not found.');
        }

        return view('bus.edit', compact('bus'));
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
        $Bus =Bus::find($id);

        if (!$Bus) {
            return redirect()->route('bus.index')->with('error', 'bus not found.');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'Bus_Number'=>'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Update the post
        $Bus->update([
            'title' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('bus.index')->with('success', 'bus updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bus = bus::find($id);

            if (!$bus) {
                return redirect()->route('bus.index')->with('error', 'bus not found.');
            }
            $bus->delete();
            return redirect()->route('bus.index')->with('success', 'bus deleted successfully.');
        }
}    