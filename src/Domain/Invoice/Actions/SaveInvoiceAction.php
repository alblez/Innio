<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\DataTransferObjects\CreateInvoiceData;
use Domain\Invoice\Models\Invoice;

class SaveInvoiceAction
{
    public function __construct(
        private DetermineInvoiceNumberAction $determineInvoiceNumber,
        private CreateInvoiceLineAction $createInvoiceLine,
        private CalculateInvoiceTotalPriceAction $calculateTotalPrice,
    ) {}

    public function execute(CreateInvoiceData $data): Invoice
    {
        $invoice = Invoice::create([
            'client_id' => $data->client_id,
            'number' => $this->determineInvoiceNumber->execute(),
            'status' => 'pending',
        ]);

        foreach ($data->invoice_lines as $lineData) {
            $this->createInvoiceLine->execute($invoice, $lineData);
        }

        // Refresh to load the newly created lines
        $invoice->refresh();

        $invoice->total_price = $this->calculateTotalPrice->execute($invoice);
        $invoice->save();

        return $invoice;
    }
}
