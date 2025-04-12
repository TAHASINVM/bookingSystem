<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointment.create');
    }

    public function store(AppointmentRequest $request)
    {
        app(AppointmentRepositoryInterface::class)->create(
            $request->validated() + ['user_id' => Auth::id()]
        );
        return redirect('/dashboard');
    }

    public function availableSlots($date)
    {
        $slots = app(AppointmentRepositoryInterface::class)->slots($date);
        return response()->json([
            'status' => true,
            'slots' => $slots
        ]);
    }
}
