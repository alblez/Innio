<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\Models\Invoice;

class DetermineInvoiceNumberAction
{
    public function execute(): int
    {
        $max = Invoice::query()->max('number') ?? 0;

        return $max + 1;
    }
}

