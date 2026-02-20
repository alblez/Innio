<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\DataTransferObjects\CreateInvoiceData;
use Domain\Invoice\Models\Invoice;

class CreateInvoiceAction
{
    public function __construct(
        private SaveInvoiceAction $saveInvoice,
        private SendInvoiceMailAction $sendInvoiceMail,
    ) {}

    public function execute(CreateInvoiceData $data): Invoice
    {
        $invoice = $this->saveInvoice->execute($data);

        $this->sendInvoiceMail->execute($invoice);

        return $invoice;
    }
}
