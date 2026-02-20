# Chapter Progress

Track of which book chapters have been implemented in the project.

## Status Legend

- [ ] Not started
- [~] In progress
- [x] Complete

## Chapters

### Part 1: Domain

- [~] **Chapter 1: Domain-Oriented Laravel**
    - [x] Fresh Laravel 12 project
    - [x] src/Domain, src/App, src/Support namespace structure
    - [x] composer.json PSR-4 autoloading
    - [x] Custom Application class override
    - [x] bootstrap/app.php configured
    - [~] Domain folders created (all six domains)
    - [ ] Migrations and models finalized
    - [ ] Checkpoint: `php artisan migrate` runs clean

- [ ] **Chapter 2: Working with Data**
    - [ ] spatie/laravel-data installed
    - [ ] DTOs for all entities
    - [ ] Plain value objects (Period, Money if needed)
    - [ ] Checkpoint: DTOs construct from arrays without error

- [ ] **Chapter 3: Actions**
    - [ ] CreateClientAction
    - [ ] CreateBookingAction
    - [ ] CreateInvoiceAction (composes CreateInvoiceLineAction)
    - [ ] CalculateInvoicePricesAction
    - [ ] DetermineInvoiceNumberAction
    - [ ] SaveInvoiceAction
    - [ ] SendInvoiceMailAction (stubbed)
    - [ ] CreatePdfAction (stubbed)
    - [ ] PayInvoiceAction
    - [ ] Checkpoint: Actions executed with test data

- [ ] **Chapter 4: Models**
    - [ ] Custom QueryBuilders (InvoiceQueryBuilder, UnitQueryBuilder)
    - [ ] Custom Collections (InvoiceLineCollection, UnitCollection)
    - [ ] Models trimmed to: relationships, casts, builder/collection hooks
    - [ ] Checkpoint: QueryBuilder and Collection methods work

- [ ] **Chapter 5: States**
    - [ ] Abstract InvoiceState
    - [ ] Concrete states: Pending, Paid, Overdue, Canceled
    - [ ] State-specific behavior (color, mustBePaid)
    - [ ] Transitions: PendingToPaid, PendingToOverdue, PendingToCancelled,
      OverdueToPaid, OverdueToCancelled
    - [ ] Checkpoint: State transitions work, invalid transitions throw

- [ ] **Chapter 6: Enums**
    - [ ] PaymentType enum (BankTransfer, CreditCard, Cash)
    - [ ] UnitType enum
    - [ ] Checkpoint: Enums used in models and DTOs

- [ ] **Chapter 7: Managing Domains**
    - [ ] Review domain boundaries
    - [ ] Shared/cross-cutting concerns identified
    - [ ] Checkpoint: No domain is too large or too small

- [ ] **Chapter 8: Testing Domains**
    - [ ] Custom test factories (InvoiceFactory, InvoiceLineFactory,
      BookingFactory, ClientFactory, UnitFactory, PaymentFactory)
    - [ ] DTO data factories (CreateInvoiceDataFactory, InvoiceLineDataFactory)
    - [ ] Action tests with mock actions for PDF/mail
    - [ ] Model tests (QueryBuilder, Collection, Subscriber)
    - [ ] State and transition tests
    - [ ] Checkpoint: Full green test suite

### Part 2: Application Layer

- [ ] **Chapter 9: Entering the Application Layer**
    - [ ] Admin/Bookings module (Controllers, Requests, ViewModels)
    - [ ] Admin/Invoices module
    - [ ] Route registration in bootstrap/app.php
    - [ ] Checkpoint: Routes respond correctly

- [ ] **Chapter 10: View Models**
    - [ ] BookingFormViewModel
    - [ ] InvoiceFormViewModel / InvoiceShowViewModel
    - [ ] Arrayable integration
    - [ ] Checkpoint: Views render with ViewModel data

- [ ] **Chapter 11: HTTP Queries**
    - [ ] InvoiceIndexQuery (filter by status, client; sort by number)
    - [ ] BookingIndexQuery
    - [ ] Checkpoint: Filtered/sorted indexes work

- [ ] **Chapter 12: Jobs**
    - [ ] SendInvoiceMailJob wrapping SendInvoiceMailAction
    - [ ] Accountancy sync command (Support namespace gateway)
    - [ ] Checkpoint: Jobs dispatch and execute
