<?php

namespace App\Repositories;

use App\Interfaces\AppointmentRepositoryInterface;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function slots($date)
    {
        $start = Carbon::createFromTimeString('10:00');
        $end = Carbon::createFromTimeString('17:00');
        $breakStart = Carbon::createFromTimeString('13:00');
        $breakEnd = Carbon::createFromTimeString('13:59');

        while ($start < $end) {
            if ($start->between($breakStart, $breakEnd)) {
                $start->addMinutes(30);
                continue;
            }

            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        $bookedSlots = Appointment::whereDate('date', $date)->where('user_id', Auth::id())->pluck('time_slot')->toArray();
        $availableSlots = array_values(array_diff($slots, $bookedSlots));
        return $availableSlots;
    }

    public function create($data)
    {
        return Appointment::create($data);
    }

    public function list()
    {
        return Appointment::where('user_id', Auth::id())->get();
    }
}
