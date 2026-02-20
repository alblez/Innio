<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\DataTransferObjects\InvoiceLineData;
use Domain\Invoice\Models\Invoice;
use Domain\Invoice\Models\InvoiceLine;

class CreateInvoiceLineAction
{
    public function __construct(
        private CalculateInvoicePricesAction $calculateInvoicePrices,
    ) {}

    public function execute(Invoice $invoice, InvoiceLineData $lineData): InvoiceLine
    {
        $prices = $this->calculateInvoicePrices->execute($lineData);

        return InvoiceLine::create([
            'invoice_id' => $invoice->id,
            'description' => $lineData->description,
            'item_amount' => $lineData->item_amount,
            'item_price' => $lineData->item_price,
            'vat_percentage' => $lineData->vat_percentage,
            'total_price_excluding_vat' => $prices['total_price_excluding_vat'],
            'total_price_including_vat' => $prices['total_price_including_vat'],
        ]);
    }
}
