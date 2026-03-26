# jfo — janfoshag.de Website Project

## Project Overview

This is the local development workspace for **janfoshag.de**, a bilingual (DE/EN) freelancer portfolio website for Jan Foshag, a Munich-based software developer with 20+ years of experience in mobile apps, web development, and AI.

## Repository Structure

```
jfo/
├── planning/
│   ├── plan.md                          # TODO / DONE tracker — check here for open tasks
│   ├── custom-css.md                    # Working CSS snippets for WP Customizer
│   ├── reviews/
│   │   ├── 260325_review.md             # Site audit March 25, 2026
│   │   └── 260326_review.md             # Site audit March 26, 2026 (current)
│   ├── about.md                         # Über mich section content (German)
│   ├── datenschutz-kontaktformular.md   # New Datenschutz section for contact form
│   └── db.md                            # Database credentials (keep private)
├── plugins/
│   └── jfo-contact-form.php             # Contact form plugin v1.1 — bilingual DE/EN
└── templates/
    ├── elementor-2569-2026-03-26.json   # Current German page template
    └── elementor-home-en.json           # English page template
```

## Tech Stack

- **CMS:** WordPress 6.6.1
- **Theme:** Astra (custom child theme or direct modifications)
- **Page Builder:** Elementor v3.24.2
- **Plugin:** Ultimate Elementor (UAEL) — particle effects
- **Plugin:** Polylang — bilingual DE/EN
- **Plugin:** WP Mail SMTP — configured and tested
- **Database:** MySQL 5.7 — credentials in `planning/db.md`
- **DB name:** `dbs10297663`, **DB prefix:** `c2w2_`
- **Hosting:** webspace-host.com (`database-5012237781.webspace-host.com`)

## Live Site

- **URL:** https://janfoshag.de
- **Languages:** German (default) + English (via Polylang)
- **Email:** info@janfoshag.de
- **Phone:** +49 89 45439111

## Key Design Tokens

- **Primary blue:** `#0137d2`
- **Secondary purple:** `#800080`
- **Font:** Josefin Sans, sans-serif
- **Max content width:** 1180px

## Known Issues / Improvement Areas

See `planning/site-review.md` for the full audit. Key priorities:

1. Contact form live — jfo-contact-form.php v1.1 active, bilingual DE/EN, WP Mail SMTP configured (March 2026)
2. No headshot in Über mich section
3. Portfolio entries lack depth (no case study pages)
4. No blog (limits SEO)
5. Testimonials have no attribution

## Notes

- VAT ID: DE269699601 (required for German Impressum)
