<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Driver::all();
        return view('driver.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
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
            'mobile'=> 'required',
            'address'=>'required',
            'dob'=> 'required',
            
        ]);
        Driver::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'dob' => $request->dob,
        ]);

        return redirect()->route('driver.index')->with('success', 'driver created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        // If the seats is not found, redirect with an error message
        if (!$driver) {
            return redirect()->route('driver.index')->with('error', 'driver not found or unauthorized.');
        }

        // Return the view for showing the post details
        return view('driver.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->route('driver.index')->with('error', 'driver not found.');
        }

        return view('driver.edit', compact('driver'));
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
        $driver =Driver::find($id);

        if (!$driver) {
            return redirect()->route('driver.index')->with('error', 'driver not found.');
        }
       
        // Validate the request
        $request->validate([
            'name' => 'required|string|',
            'mobile' => 'required|integer|digits:10',  // Use numeric or integer
            'address' => 'required|string|max:255',
            'dob' => 'required|date|max:255',  // Use `date` instead of `dateTime`
            'status' => 'required|in:0,1',
        ]);
        

        // Update the post
        $driver->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'dob' => $request->dob,
            'status' => $request->status,
        ]);

        return redirect()->route('driver.index')->with('success', 'driver updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->route('driver.index')->with('error', 'driver not found.');
        }
        $driver->delete();
        return redirect()->route('driver.index')->with('success', 'driver deleted successfully.');
    }
}
