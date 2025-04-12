<?php

namespace App\Http\Controllers;

use App\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = app(AppointmentRepositoryInterface::class)->list();
        return view('dashboard', compact('appointments'));
    }
}
