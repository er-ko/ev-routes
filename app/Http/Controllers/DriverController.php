<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('driver.index', [
            'drivers' => Driver::with('user')->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'nickname' => 'required|string|max:32',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $image = $request->file('image')->store('public/driver');
        $validated['image'] = Str::remove('public/driver/', $image);

        $request->user()->driver()->create($validated);
        return redirect(route('driver.index'))->with('status', 'created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'nickname' => 'required|string|max:32',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file('image')) {
            $token = Driver::getImage($driver->id);
            $path = 'public/driver/'. $token;
            if (Storage::exists($path)){
                Storage::delete($path);
            }
            $image = $request->file('image')->store('public/driver');
            $validated['image'] = Str::remove('public/driver/', $image);
        }

        $driver->update($validated);
        return redirect(route('driver.index'))->with('status', 'updated');
    }
}
