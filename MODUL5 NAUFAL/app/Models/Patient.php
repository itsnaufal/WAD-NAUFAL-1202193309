<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Patient extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'nik', 'alamat', 'image_ktp', 'no_hp', 'vaccine_id'];

        
        public function vaccine()
        {
            return $this->belongsTo(Vaccine::class);
        }
    }
