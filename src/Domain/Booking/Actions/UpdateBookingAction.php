<?php

namespace Domain\Booking\Actions;

use Domain\Booking\DataTransferObjects\BookingData;
use Domain\Booking\Models\Booking;

class UpdateBookingAction
{
    public function execute(Booking $booking, BookingData $data): Booking
    {
        $booking->update([
            'name' => $data->name,
            'starts_at' => $data->starts_at,
            'ends_at' => $data->ends_at,
            'unit_id' => $data->unit_id,
            'client_id' => $data->client_id,
        ]);

        return $booking->refresh();
    }
}
