<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vaccine.index', ['vaccines' => $vaccines]);
    }

    public function create()
    {
        return view('vaccine.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image'],
        ]);
        $validation['image'] = $request->file('image')->store('vaccine-images');
        Vaccine::insert($validation);
        return redirect(route('vaccine.index'));
    }

    public function edit(Vaccine $vaccine)
    {
        return view('vaccine.edit', ['vaccine' => $vaccine]);
    }

    public function update(Vaccine $vaccine, Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'image' => ['image'],
        ]);
        if ($request->file('image')) {
            Storage::delete($vaccine->image);
            $validation['image'] = $request->file('image')->store('vaccine-images');
        }
        $vaccine->update($validation, ['timestamp' => false]);
        return redirect(route('vaccine.index'));
    }

    public function delete(Vaccine $vaccine)
    {
        return view('vaccine.delete', ['vaccine' => $vaccine]);
    }

    public function destroy(Vaccine $vaccine)
    {
        Storage::delete($vaccine->image);
        $vaccine->delete();
        return redirect(route('vaccine.index'));
    }
}
