<?php

namespace Domain\Booking\Actions;

use Domain\Booking\DataTransferObjects\BookingData;
use Domain\Booking\Models\Booking;

class CreateBookingAction
{
    public function execute(BookingData $data): Booking
    {
        return Booking::create([
            'name' => $data->name,
            'starts_at' => $data->starts_at,
            'ends_at' => $data->ends_at,
            'unit_id' => $data->unit_id,
            'client_id' => $data->client_id,
        ]);
    }
}

