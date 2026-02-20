<?php

namespace Domain\Invoice\DataTransferObjects;

use Spatie\LaravelData\Data;

class InvoiceLineData extends Data
{
    public function __construct(
        public string $description,
        public int $item_amount,
        public int $item_price,
        public int $vat_percentage,
    ){}
}
