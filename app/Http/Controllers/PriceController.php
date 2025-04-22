<?php

namespace App\Http\Controllers;

use App\Models\price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = price::with(['route', 'category'])
        ->where('route_id', Auth::id())
        ->get();

    return view('price.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $price = price::all();
        return view('price.create',compact('price'));
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
            'route_id' => 'required|exists:route,id',
            'amount' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:1,0',

        ]);

        price::create([
            'route' => $request->route_id,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return redirect()->route('price.index')->with('success', 'Price created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = price::with(['route', 'category'])
        ->where('id', $id)
        ->where('route_id', Auth::id()) // Fixed: check created_by instead of id
        ->first();

    if (!$price) {
        return redirect()->route('price.index')
            ->with('error', 'Price not found.');
    }

    return view('price.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = price::find($id);

        if (!$price) {
            return redirect()->route('price.index')->with('error', 'Price not found.');
        }

        return view('price.edit', compact('price'));
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
        $price = price::find($id);

        if (!$price) {
            return redirect()->route('price.index')->with('error', 'Price not found.');
        }

        // Validate the request
        $request->validate([
            'amount' => 'required|integer',
            'status' => 'required|in:0,1',
        ]);

        // Update the post
        $price->update([
            'amount' => $request->amount,
            'status' => $request->status,
        ]);

        return redirect()->route('price.index')->with('success', 'Price updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = price::find($id);

        if (!$price) {
            return redirect()->route('price.index')->with('error', 'Price not found.');
        }
        $price->delete();
        return redirect()->route('price.index')->with('success', 'Price deleted successfully.');
    }
}
