<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('admin.pages.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.pages.zones.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_range' => 'required||',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('zones', 'public');
            $validated['image'] = basename($imagePath);
        }

        Zone::create($validated);
        return redirect()->route('admin.zones.index')->with('success', 'Attraction created successfully.');
    }

    public function show($id)
    {
        $zone = Zone::find($id);
        return view('admin.pages.zones.show', compact('zone'));
    }

   public function edit($id)
{
    $zone = Zone::findOrFail($id);
    return view('admin.pages.zones.edit', compact('zone'));
}

   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price_range' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $zone = \App\Models\Zone::findOrFail($id);

    if ($zone->image && $request->hasFile('image')) {
        Storage::disk('public')->delete('images/' . $zone->image);
    }

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validated['image'] = basename($imagePath);
    }

    $zone->update($validated);

    return redirect()->route('admin.zones.index')
        ->with('success', 'Zone update successfully.');
}
    public function destroy($id)
    {
        $zone = Zone::find($id);
        if ($zone) {
            $zone->delete();
            return redirect()->route('admin.zones.index')->with('success', 'Zones delete successfully.');
        } else {
            return redirect()->route('admin.zones.index')->with('error', 'Zone not found.');
        }
    }
}
