<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Garage::getCarBrands($request->get('search'));
        }
        return view('garage.index', [
            'cars' => Garage::with('user')->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get(),
            'currencies' => Currency::orderBy('id', 'asc')->get(),
            'settings' => Settings::with('user')->where('user_id', auth()->id())->first(),
            'driver' => Driver::with('user')->where('user_id', auth()->id())->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:64',
            'name' => 'required|string|max:64',
            'nickname' => 'required|string|max:32',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|numeric',
            'power' => 'required|numeric',
            'torque' => 'required|numeric',
            'battery' => 'required|numeric',
            'voltage' => 'required|numeric',
            'drag_coefficient' => 'required|numeric',
        ]);
        $image = $request->file('image')->store('public/garage');
        $validated['image'] = Str::remove('public/garage/', $image);

        $request->user()->garage()->create($validated);
        return redirect(route('garage.index'))->with('status', 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garage $garage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garage $garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garage $garage): RedirectResponse
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:64',
            'name' => 'required|string|max:64',
            'nickname' => 'required|string|max:32',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|numeric',
            'power' => 'required|numeric',
            'torque' => 'required|numeric',
            'battery' => 'required|numeric',
            'voltage' => 'required|numeric',
            'drag_coefficient' => 'required|numeric',
        ]);

        if ($request->file('image')) {
            $token = Garage::getImage($garage->id);
            $path = 'public/garage/'. $token;
            if (Storage::exists($path)){
                Storage::delete($path);
            }
            $image = $request->file('image')->store('public/garage');
            $validated['image'] = Str::remove('public/garage/', $image);
        }

        $garage->update($validated);
        return redirect(route('garage.index'))->with('status', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garage $garage)
    {
        //
    }

    /**
     * Update the settings resource in storage.
     */
    public function settings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'date_format' => 'required|string|max:10',
            'currency' => 'required|string|max:5',
            'temperature' => 'required|string|max:1',
            'distance' => 'required|string|max:2',
            'consumption' => 'required|string|max:3',
            'weight' => 'required|string|max:2',
        ]);

        $request->user()->settings()->update($validated);
        return redirect(route('garage.index'))->with('status', 'updated');
    }
}
