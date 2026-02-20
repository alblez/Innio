<?php

namespace Domain\Invoice\DataTransferObjects;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class CreateInvoiceData extends Data
{
    public function __construct(
        public int $client_id,
        #[DataCollectionOf(InvoiceLineData::class)]
        public array $invoice_lines,
    ){}
}
