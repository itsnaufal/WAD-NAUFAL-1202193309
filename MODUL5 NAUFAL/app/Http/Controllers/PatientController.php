<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('vaccine')->get();
        return view('patient.index', ['patients' => $patients]);
    }

    public function create_vaccine()
    {
        $vaccine = Vaccine::get();
        return view('patient.create-vaccine', ['vaccines' => $vaccine]);
    }

    public function create(Vaccine $vaccine)
    {
        return view('patient.create', ['vaccine' => $vaccine]);
    }

    public function store(Vaccine $vaccine, Request $request)
    {
    
        $validation = $request->validate([
            'name' => ['required'],
            'nik' => ['required'],
            'alamat' => ['required'],
            'image_ktp' => ['required', 'image'],
            'no_hp' => ['required'],
        ]);
        $validation['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        $validation['vaccine_id'] = $vaccine->id;
        Patient::create($validation);
        return redirect(route('patient.index')); 
    }

    public function edit(Patient $patient)
    {
        $patient = $patient->load('vaccine');
        return view('patient.edit', ['patient' => $patient]);
    }

    public function update(Patient $patient, Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'nik' => ['required'],
            'alamat' => ['required'],
            'image_ktp' => ['image'],
            'no_hp' => ['required'],
        ]);
        if ($request->file('image_ktp')) {
            Storage::delete($patient->image_ktp);
            $validation['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        }
        $patient->update($validation, ['timestamp' => false]);
        return redirect(route('patient.index'));
    }

    public function delete(Patient $patient)
    {
        return view('patient.delete', ['patient' => $patient]);
    }

    public function destroy(Patient $patient)
    {
        Storage::delete($patient->image_ktp);
        $patient->delete();
        return redirect(route('patient.index'));
    }
}
