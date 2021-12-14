    <?php

    use App\Http\Controllers\PatientController;
    use App\Http\Controllers\VaccineController;
    use Illuminate\Support\Facades\Route;


    Route::get('/', function ('welcome') {
        return view('welcome');
    })->name('welcome');

    Route::get('/vaccine', [VaccineController::class, 'index'])->name('vaccine.index');
    Route::get('/vaccine/create', [VaccineController::class, 'create'])->name('vaccine.create');
    Route::post('/vaccine/store', [VaccineController::class, 'store'])->name('vaccine.store');
    Route::get('/vaccine/edit/{vaccine:id}', [VaccineController::class, 'edit'])->name('vaccine.edit');
    Route::put('/vaccine/update/{vaccine:id}', [VaccineController::class, 'update'])->name('vaccine.update');
    Route::get('/vaccine/delete/{vaccine:id}', [VaccineController::class, 'delete'])->name('vaccine.delete');
    Route::delete('/vaccine/destroy/{vaccine:id}', [VaccineController::class, 'destroy'])->name('vaccine.destroy');

    Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
    Route::get('/patient/create_vaccine', [PatientController::class, 'create_vaccine'])->name('patient.create_vaccine');
    Route::get('/patient/create/{vaccine:id}', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/store/{vaccine:id}', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/edit/{patient:id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/update/{patient:id}', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/patient/delete/{patient:id}', [PatientController::class, 'delete'])->name('patient.delete');
    Route::delete('/patient/destroy/{patient:id}', [PatientController::class, 'destroy'])->name('patient.destroy');
