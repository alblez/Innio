<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\Models\Invoice;

class SendInvoiceMailAction
{
    public function execute(Invoice $invoice): void
    {
        // Stubbed: would send invoice PDF via email
    }
}

