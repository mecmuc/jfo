# jfo — janfoshag.de Website Project

## Project Overview

This is the local development workspace for **janfoshag.de**, a German-language freelancer portfolio website for Jan Foshag, a Munich-based software developer with 20+ years of experience in mobile apps, web development, and AI.

## Repository Structure

```
jfo/
├── planning/
│   ├── plan.md                          # TODO / DONE tracker — check here for open tasks
│   ├── review.md                        # Comprehensive site audit (March 2026, current)
│   ├── about.md                         # Über mich section content (German)
│   ├── datenschutz-kontaktformular.md   # New Datenschutz section for contact form
│   └── db.md                            # Database credentials (keep private)
├── plugins/
│   └── jfo-contact-form.php             # Contact form plugin — upload to wp-content/plugins/
└── templates/
    ├── elementor-2426-2026-03-25.json             # Original Elementor page export
    └── elementor-2426-2026-03-25-with-about.json  # Current version — Über mich + contact form + footer links
```

## Tech Stack

- **CMS:** WordPress 6.6.1
- **Theme:** Astra (custom child theme or direct modifications)
- **Page Builder:** Elementor v3.24.2
- **Plugin:** Ultimate Elementor (UAEL) — particle effects
- **Database:** MySQL 5.7 — credentials in `planning/db.md`
- **DB name:** `dbs10297663`, **DB prefix:** `c2w2_`
- **Hosting:** webspace-host.com (`database-5012237781.webspace-host.com`)

## Live Site

- **URL:** https://janfoshag.de
- **Language:** German only
- **Email:** info@janfoshag.de
- **Phone:** +49 89 45439111

## Key Design Tokens

- **Primary blue:** `#0137d2`
- **Secondary purple:** `#800080`
- **Font:** Josefin Sans, sans-serif
- **Max content width:** 1180px

## Known Issues / Improvement Areas

See `planning/site-review.md` for the full audit. Key priorities:

1. Contact form removed — was built (jfo-contact-form.php) but emails landed in spam; WP Mail SMTP installed but not configured; revisit later
2. No About/bio section or headshot
3. Portfolio entries lack depth (no case study pages)
4. No blog (limits SEO)
5. Testimonials have no attribution
6. No prominent CTA

## Notes

- VAT ID: DE269699601 (required for German Impressum)
