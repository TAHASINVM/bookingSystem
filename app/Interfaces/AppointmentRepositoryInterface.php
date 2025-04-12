<?php

namespace App\Interfaces;

interface AppointmentRepositoryInterface
{
    public function slots($date);
    public function create($data);
    public function list();
}
