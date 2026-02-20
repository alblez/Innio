<?php

namespace Domain\Booking\DataTransferObjects;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class BookingData extends Data
{
    public function __construct(
        public string $name,
        public Carbon $starts_at,
        public Carbon $ends_at,
        public int $client_id,
        public int $unit_id,
    ) {}
}
