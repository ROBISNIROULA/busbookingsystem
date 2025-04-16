<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\route;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = route::all();
        // $route = route::where('id', $id)->
        // with('creator')
        //     ->where('id', Auth::id()) // Ensures the post belongs to the logged-in user
        //     ->first();

        // If the seats is not found, redirect with an error message
        if (!$data) {
            return redirect()->route('route.index')->with('error', 'route not found or unauthorized.');
        }

        // Return the view for showing the post details
        return view('route.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $route = route::all();
        return view('route.create',compact('route'));
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
            'source' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);


        route::create([
            'source' => $request->source,
            'destination' => $request->destination,
            'status' => $request->status,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('route.index')->with('success', 'Route created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = route::with(['creator'])
        ->where('id', $id)
        ->first();

    if (!$route) {
        return redirect()->route('route.index')
            ->with('error', 'Route not found or unauthorized.');
    }

    return view('route.show', compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = route::find($id);

        if (!$route) {
            return redirect()->route('route.index')->with('error', 'Route not found.');
        }

        return view('route.edit', compact('route'));
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
        $route = route::find($id);

        if (!$route) {
            return redirect()->route('route.index')->with('error', 'Route not found.');
        }

        // Validate the request
        $request->validate([
            'source' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Update the post
        $route->update([
            'source' => $request->source,
            'destination' => $request->destination,
            'status' => $request->status,
            
        ]);

        return redirect()->route('route.index')->with('success', 'Route updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = route::find($id);

        if (!$route) {
            return redirect()->route('route.index')->with('error', 'Route not found.');
        }
        $route->delete();
        return redirect()->route('route.index')->with('success', 'Route deleted successfully.');
    }
}
