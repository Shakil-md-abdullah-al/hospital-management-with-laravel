<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHistory extends Model
{
    use HasFactory;
    protected $table = 'appointment_histories';

    protected $fillable = [
        'username',
        'email',
        'phone',
        'user_id',
        'doctor',
        'doctor_id',
        'fee',
        'message',
        'status',
        'appointment_id',
    ];
    public static function storeHistory(Appointment $appointment)
    {
        self::create([
            'username' => $appointment->name,
            'email' => $appointment->email,
            'phone' => $appointment->phone,
            'user_id' => $appointment->user_id,
            'doctor' => $appointment->doctor,
            'doctor_id' => $appointment->doctor_id,
            'fee' => $appointment->fee,
            'message' => $appointment->message,
            'status' => 'Completed', // Set status to "Completed"
            'appointment_id' => $appointment->id,
        ]);
    }
}
