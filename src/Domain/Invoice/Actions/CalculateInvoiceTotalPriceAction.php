<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\Models\Invoice;

class CalculateInvoiceTotalPriceAction
{
    public function execute(Invoice $invoice): int
    {
        return $invoice->invoiceLines->sum('total_price_including_vat');
    }
}
