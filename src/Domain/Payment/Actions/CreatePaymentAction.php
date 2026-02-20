<?php

namespace Domain\Payment\Actions;

use Domain\Invoice\Models\Invoice;
use Domain\Payment\Models\Payment;

class CreatePaymentAction
{
    public function execute(Invoice $invoice, string $type): Payment
    {
        return Payment::create([
            'invoice_id' => $invoice->id,
            'type' => $type,
            'price' => $invoice->total_price,
            'paid_at' => now(),
        ]);
    }
}
