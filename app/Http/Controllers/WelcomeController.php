<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (!session()->exists('date_format')) Session::put('date_format', Settings::defaultData()['date_format']);
        if (!session()->exists('currency')) Session::put('currency', Settings::defaultData()['currency']);
        if (!session()->exists('temperature')) Session::put('temperature', Settings::defaultData()['temperature']);
        if (!session()->exists('distance')) Session::put('distance', Settings::defaultData()['distance']);
        if (!session()->exists('consumption')) Session::put('consumption', Settings::defaultData()['consumption']);
        if (!session()->exists('weight')) Session::put('weight', Settings::defaultData()['weight']);

        return view('welcome.index', [
            'routes' => Route::where('public', true)->orderBy('created_at', 'desc')->paginate(15),
            'settings' => json_decode(json_encode(Settings::defaultData()), FALSE),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request): Request | View
    {
        $search = $request->search;
        $routes = Route::where(function($query) use ($search){
            $query->where('name', 'like', "%$search%")
                ->orWhere('note', 'like', "%$search%");
        })
        ->orWhereHas('user', function($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })
        ->paginate(15);

        return view('welcome.index', [
            'settings' => json_decode(json_encode(Settings::defaultData()), FALSE),
        ], compact('routes', 'search'));
    }

    /**
     * Update the settings resource in storage.
     */
    public function setSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'date_format' => 'required|string|max:10',
            'currency' => 'required|string|max:5',
            'temperature' => 'required|string|max:1',
            'distance' => 'required|string|max:2',
            'consumption' => 'required|string|max:3',
            'weight' => 'required|string|max:2',
        ]);
        Session::put('date_format', $validated['date_format']);
        Session::put('currency', $validated['currency']);
        Session::put('temperature', $validated['temperature']);
        Session::put('distance', $validated['distance']);
        Session::put('consumption', $validated['consumption']);
        Session::put('weight', $validated['weight']);        
        Session::save();
        return redirect(url('/'));
    }
}
