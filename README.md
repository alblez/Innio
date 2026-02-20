# Innio

A hotel/property booking application with invoicing, built as a hands-on
learning project to exercise every pattern from
**"Laravel Beyond CRUD"** by Brent Roose (Spatie, 2nd edition 2022).

## What This Is

Innio is a companion project for developers reading "Laravel Beyond CRUD."
The book teaches DDD-lite patterns for large Laravel applications but
doesn't ship a single buildable codebase. Instead, it uses fragments from
multiple example domains (invoicing, bookings, blog posts) across chapters.

This project unifies those fragments into one coherent application that you
can build chapter by chapter, exercising every pattern the book introduces.

**This project cannot replace reading the book.** It focuses on practical
application. When a concept requires deeper theoretical grounding, the
documentation points you to the specific chapter and section.

## Target Stack

| Component          | Version           |
|--------------------|-------------------|
| PHP                | 8.4+              |
| Laravel            | 12                |
| spatie/laravel-data| latest stable (v4)|
| Testing            | Pest              |
| Database (local)   | SQLite            |

The book focuses on PHP 8.2 and Laravel 9. Where PHP or Laravel evolution
introduced a better way to express the same pattern, this project uses the
modern version. See `docs/VERSION_DELTAS.md` for specifics.

## The Domain

A small hotel/property management company that:

- Manages **Units** (rooms, spaces) with types and availability status
- Tracks **Clients** who book those units
- Creates **Bookings** assigning a client to a unit for a period
- Generates **Invoices** from bookings, with line items and VAT calculations
- Records **Payments** against invoices
- Manages invoice lifecycle through states (Pending, Paid, Overdue, Canceled)
- Generates PDFs and sends invoice emails (stubbed)
- Syncs invoices to an external accountancy platform (stubbed)

## Project Structure

```
src/
├── App/              # Application layer (controllers, requests, view models)
│   ├── Application.php
│   └── Admin/        # Admin HTTP application modules (Chapter 9+)
├── Domain/           # Business logic, grouped by concept
│   ├── Booking/
│   ├── Client/
│   ├── Invoice/
│   ├── Payment/
│   ├── Pdf/
│   └── Unit/
└── Support/          # Cross-cutting utilities (VatCalculator, Period, etc.)
```

Each domain folder may contain: Actions, Collections, DataTransferObjects,
Events, Exceptions, Models, QueryBuilders, States, Subscribers.

## Setup

```bash
git clone git@github.com:alblez/Innio.git
cd Innio
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Book Chapter Mapping

See `docs/CHAPTER_PROGRESS.md` for a detailed mapping of which book chapter
corresponds to which part of the codebase and current build status.

## Key Architectural Decisions

See `docs/ARCHITECTURE_DECISIONS.md` for rationale behind choices like
singular domain names, Client vs. Customer naming, and version-specific
adaptations.

## Acknowledgments

All architectural patterns in this project originate from
"Laravel Beyond CRUD" by Brent Roose, published by Spatie.
The book, its companion videos, and its private reference repository
informed the system design. This project is an independent learning
exercise, not affiliated with Spatie.
