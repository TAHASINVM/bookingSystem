<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Appointment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h4 class="mb-4 text-center">Book an Appointment</h4>

                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control"  value="{{ old('phone') }}" name="phone" required>
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" id="date" name="date" required>
                            @error('date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time_slot" class="form-label">Time Slot</label>
                            <select class="form-select" id="time_slot" name="time_slot" required>

                            </select>
                            @error('time_slot')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>


<script src="{{ asset('js/slots.js') }}"></script>
