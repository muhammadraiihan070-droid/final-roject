<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index(){
       $zones = Zone::all();
        return view('admin.pages.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.pages.zones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_range' => 'required|numeric',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
    ]);

     $imageName = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $imageName = basename($imagePath);
        }

        Zone::create([
            'name' => $request->name,
            'description' => $request->description,
            'price_range' => $request->price_range,
            'image' => $imageName,
        ]);

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil tambah data');
    }

    public function show($id)
    {
        return view('admin.pages.zones.show');
    }

    public function edit($id)
    {
        return view('admin.pages.zones.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validated([
            'name' => 'required',
            'description' => 'nullable',
            'ticket_price'=> 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);
        $zone = \App\Models\Zone::findorfail($id);
        if ($zone) {
            If ($zone->image && $request->hasFile('image')) {
                Storage::disk('public')->delete('images/' .$zone->image);
            }
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/', 'public');
                $validated['image'] = basename($imagePath);
            }
            $zone->update($validated);
            return redirect()->route('zones.index')->with('success', 'Zone update successfully.');
           
        }
    }
    public function destroy($id)
    {
       $zone=Zone::find($id);
       if ($zone) {
       $zone->delete();
       return redirect('/zones')->with('success', 'Zones delete successfully.');
    } else {
        return redirect('/zones')->with('error', 'Zone not found.');
    }

    }
}

    