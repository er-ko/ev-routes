<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Driver;
use App\Models\Garage;
use App\Models\Settings;
use App\Models\Currency;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('route.index', [
            'routes' => Route::with('user')->where('user_id', auth()->id())->orderBy('drive_date', 'desc')->paginate(15),
            'settings' => Settings::with('user')->where('user_id', auth()->id())->first(),
            'driver' => Driver::with('user')->where('user_id', auth()->id())->count(),
            'garage' => Garage::with('user')->where('user_id', auth()->id())->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        $garage = Garage::with('user')->where('user_id', auth()->id())->count();
        if ($garage >= 1) {

            return view('route.create', [
                'drivers' => Driver::with('user')->where('user_id', auth()->id())->orderBy('name', 'asc')->get(),
                'garages' => Garage::with('user')->where('user_id', auth()->id())->orderBy('created_at', 'asc')->get(),
                'currencies' => Currency::orderBy('id', 'asc')->get(),
                'settings' => Settings::with('user')->where('user_id', auth()->id())->first(),
            ]);
            
        } else {
            return redirect(route('route.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'driver_id' => 'required|numeric',
            'garage_id' => 'required|numeric',
            'currency' => 'required|string|max:5',
            'unit_distance' => 'required|string|max:2',
            'unit_consumption' => 'required|string|max:3',
            'unit_weight' => 'required|string|max:2',
            'unit_temperature' => 'required|string|max:1',
            'name' => 'required|string|max:128',
            'drive_date' => 'required|date',
            'driving_time' => 'required|numeric',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'avg_temp' => 'required|numeric',
            'charging_stops' => 'required|numeric',
            'charging_time' => 'required|numeric',
            'supplied_energy' => 'required|numeric',
            'avg_temp' => 'required|numeric',
            'avg_speed' => 'required|numeric',
            'avg_consumption' => 'required|numeric',
            'total_consumption' => 'required|numeric',
            'price_per_kw' => 'required|numeric',
            'real_price' => 'required|numeric',
            'estimated_price' => 'required|numeric',
            'loaded_weight' => 'required|numeric',
            'trailer' => 'required|boolean',
            'trailer_weight' => 'required|numeric',
        ]);

        $iframe = strtok(Str::replace('<iframe src="https://www.google.com/maps/embed?', '', $request->map_iframe), '"');
        if (isset($request->map_link)) $mapLink = $request->map_link; else $mapLink = false;
        if (isset($request->note)) $note = $request->note; else $note = false;
        if (isset($request->public)) $public = true; else $public = false;
        $validated['map_link'] = $mapLink;
        $validated['map_iframe'] = $iframe;
        $validated['note'] = $note;
        $validated['public'] = $public;

        $request->user()->routes()->create($validated);
        return redirect(route('route.index'))->with('status', 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route): View | RedirectResponse
    {
        if (Auth::check()) {
            $settings = Settings::with('user')->where('user_id', auth()->id())->first();
        } else {
            if (!$route->public) return back();
            $settings = false;
        }

        return view('route.show', [
            'route' => $route,
            'currencies' => Currency::orderBy('id', 'asc')->get(),
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route): View
    {
        return view('route.edit', [
            'route' => $route,
            'drivers' => Driver::with('user')->where('user_id', auth()->id())->orderBy('name', 'asc')->get(),
            'garages' => Garage::with('user')->where('user_id', auth()->id())->orderBy('created_at', 'asc')->get(),
            'currencies' => Currency::orderBy('id', 'asc')->get(),
            'settings' => Settings::with('user')->where('user_id', auth()->id())->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route): RedirectResponse
    {
        $validated = $request->validate([
            'driver_id' => 'required|numeric',
            'garage_id' => 'required|numeric',
            'currency' => 'required|string|max:5',
            'unit_distance' => 'required|string|max:2',
            'unit_consumption' => 'required|string|max:3',
            'unit_weight' => 'required|string|max:2',
            'unit_temperature' => 'required|string|max:1',
            'name' => 'required|string|max:128',
            'drive_date' => 'required|date',
            'driving_time' => 'required|numeric',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'avg_temp' => 'required|numeric',
            'charging_stops' => 'required|numeric',
            'charging_time' => 'required|numeric',
            'supplied_energy' => 'required|numeric',
            'avg_temp' => 'required|numeric',
            'avg_speed' => 'required|numeric',
            'avg_consumption' => 'required|numeric',
            'total_consumption' => 'required|numeric',
            'price_per_kw' => 'required|numeric',
            'real_price' => 'required|numeric',
            'estimated_price' => 'required|numeric',
            'loaded_weight' => 'required|numeric',
            'trailer' => 'required|boolean',
            'trailer_weight' => 'required|numeric',
        ]);

        $iframe = strtok(Str::replace('<iframe src="https://www.google.com/maps/embed?', '', $request->map_iframe), '"');
        if (isset($request->map_link)) $mapLink = $request->map_link; else $mapLink = false;
        if (isset($request->note)) $note = $request->note; else $note = false;
        if (isset($request->public)) $public = true; else $public = false;
        $validated['map_link'] = $mapLink;
        $validated['map_iframe'] = $iframe;
        $validated['note'] = $note;
        $validated['public'] = $public;

        $route->update($validated);
        return redirect(route('route.index'))->with('status', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
