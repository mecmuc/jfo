# Empfehlung: Software für Fruchtgroßhändler

Stand: März 2026 | Fokus: B2B-SaaS für eine unterdigitalisierte Branche

---

## Die Idee

Fruchtgroßhändler sind eine der am wenigsten digitalisierten Branchen im deutschen Mittelstand. Viele arbeiten noch mit Excel, Telefon und Fax. Gleichzeitig haben sie komplexe operative Probleme: tägliche Preisschwankungen, Verderblichkeit, Lieferlogistik, viele kleine Stammkunden (Restaurants, Kantinen, Märkte). Genau hier entsteht Software-Bedarf, den kaum jemand bedient.

**Dein Vorteil:** Du hast VWL-Hintergrund (verstehst Handelslogik), mobile Expertise (für Fahrer-Apps), KI-Skills (Preis- und Nachfrageprognosen) und Interesse an der Branche. Das ist eine seltene Kombination.

---

## Marktanalyse

**Zielgruppe:** Fruchtgroßhändler in Deutschland, Österreich, Schweiz
- Ca. 1.200–1.800 Fruchtgroßhändler in Deutschland (Statistisches Bundesamt)
- Umsatzklasse: meist 2–20 Mio. € /Jahr
- IT-Budget: typisch 0,5–2 % des Umsatzes = 10.000–400.000 €/Jahr
- Bestehende Lösungen: SAP (zu teuer/komplex), Excel (zu fehleranfällig), Branchensoftware (veraltet, teuer, schlechte UX)

**Zahlungsbereitschaft:** 150–500 €/Monat für ein gutes Tool ist realistisch. Bei 50 zahlenden Kunden = 7.500–25.000 €/Monat recurring.

---

## Kernprobleme der Branche (= deine Features)

| Problem | Feature |
|---------|---------|
| Preise ändern sich täglich, manuell weitergeben | Tagespreisblatt — einmal eingeben, automatisch per WhatsApp/Email raus |
| Bestellungen kommen per Telefon/WhatsApp | Bestellportal für Gastro-Kunden (Web + Mobile) |
| Fahrer wissen nicht welche Route optimal ist | Fahrer-App mit Tourenplanung |
| Welcher Kunde hat zuletzt was bestellt? | CRM-Lite — Bestellhistorie, Stammkunden, Wiedervorlage |
| Welche Ware läuft ab? | Lagerübersicht mit Ablaufwarnung |
| Rechnung tippen nach jeder Tour | Automatische Rechnungserstellung nach Lieferung |
| Prognose: wieviel Ware kaufen? | KI-gestützte Bedarfsschätzung auf Basis von Historie und Saison |

---

## Produktstrategie: Stufenweise bauen

### Stufe 1 — Kern-MVP (3 Monate Entwicklung)
Fokus: Ein Problem sehr gut lösen.
**Wähle: Tagespreisblatt + Bestellportal**
- Händler gibt morgens Preise ein (Web-Oberfläche, mobil-optimiert)
- Kunden (Restaurants etc.) können online bestellen oder Preisliste ansehen
- Händler bekommt Bestellübersicht für den Tag
- Automatische Bestätigungs-Email an Kunden

Techstack-Empfehlung: Next.js (Web), Supabase (Backend/DB), React Native (Fahrer/Händler-App), n8n für Automatisierungen.

### Stufe 2 — Erweiterung (Monate 4–8)
- Rechnungserstellung (PDF-Export, DATEV-kompatibel)
- Fahrer-App mit Tourenplanung
- Lagerübersicht mit Ablaufwarning

### Stufe 3 — KI-Features (ab Monat 9)
- Bedarfsprognose: "Diese Woche brauchst du wahrscheinlich X kg Erdbeeren"
- Preisempfehlung basierend auf Einkaufspreisen und Marge
- Churn-Warnung: "Kunde X hat seit 2 Wochen nicht bestellt"

---

## Quartalsplan

---

### Q2 2026 — April bis Juni 2026
**Thema: Markt verstehen, bevor du eine Zeile Code schreibst**

- [ ] **5 Interviews mit Fruchtgroßhändlern** führen — Münchener Großmarkt (Schupferstraße) ist ideal, dort sitzen viele. Fragen: Was nervt täglich? Welche Software nutzt ihr? Was würdet ihr zahlen?
- [ ] **Bestehende Lösungen testen:** obsthandel-software.de, Fiege, Sage, lexbizz — was können die, was nicht?
- [ ] **Entscheidung:** Ist da wirklich ein Markt? Sind Leute bereit zu zahlen? Wenn nein → stopp. Wenn ja → weiter.
- [ ] **Wenn ja:** Domain kaufen, einfache Landing Page mit Warteliste aufsetzen — noch kein Produkt, nur: "Wir bauen Software für Fruchtgroßhändler, trag dich ein"
- [ ] **Zielpreis validieren:** "Würdest du 200 €/Monat zahlen für ein Tool das X macht?" — direkt fragen

**Ziel:** Klare Go/No-Go Entscheidung auf Basis echter Gespräche

---

### Q3 2026 — Juli bis September 2026
**Thema: MVP bauen**

*(nur wenn Q2 positiv)*

- [ ] **MVP-Scope festnageln:** Nur Tagespreisblatt + Bestellportal — nichts weiter
- [ ] **2–3 Pilot-Kunden gewinnen:** Kostenlos oder stark vergünstigt (50 €/Mo) gegen ehrliches Feedback und Referenz
- [ ] **Entwicklung:** Ca. 6–8 Wochen Vollzeit oder 12–16 Wochen parallel zu Freelance-Arbeit
- [ ] **Wichtig:** Kunden früh in die Entwicklung einbeziehen — nach jedem Feature kurz zeigen, Feedback einholen
- [ ] **Rechtliches klären:** GTC, Datenschutz (DSGVO), Rechnungslegung als SaaS-Anbieter

**Ziel:** Erstes funktionierendes Produkt, 2–3 aktive Piloten

---

### Q4 2026 — Oktober bis Dezember 2026
**Thema: Erste zahlende Kunden**

- [ ] **Pricing finalisieren:** Empfehlung Einstieg 149 €/Mo (Basis) + 249 €/Mo (inkl. Fahrer-App)
- [ ] **5–10 zahlende Kunden gewinnen:** Direktakquise auf Großmärkten (München, Frankfurt, Hamburg), Branchenverbände (BVL, BdG)
- [ ] **Support-Prozess aufbauen:** Wie beantwortest du Fragen? Chat, Email, Telefon? (Achtung: B2B-Kunden erwarten schnellen Support)
- [ ] **Rechnungsstellung automatisieren:** Stripe oder Paddle für SaaS-Billing
- [ ] **Erstes MRR-Ziel:** 1.000–1.500 €/Monat recurring

**Ziel:** Produktmarktfit bestätigt, erstes stabiles Einkommen

---

### Q1 2027 — Januar bis März 2027
**Thema: Wachstum und Erweiterung**

- [ ] **Stufe-2-Features bauen:** Rechnungserstellung + Fahrer-App (das sind die Features, die Händler von Excel wegbringen)
- [ ] **Vertrieb skalieren:** Branchenmessen besuchen (Fruit Logistica Berlin, Februar — wichtigste Branchenmesse weltweit!), Messestand oder einfach als Besucher mit Gesprächen
- [ ] **Referenzen nutzen:** Piloten als Case Studies aufbereiten, auf Website stellen
- [ ] **Ziel:** 20–30 zahlende Kunden = 3.000–7.500 €/MRR

---

### Q2 2027 — April bis Juni 2027
**Thema: Skalierung**

- [ ] **Marketingkanal aufbauen:** LinkedIn-Content für die Branche, ggf. YouTube ("So digitalisierst du deinen Fruchthandel")
- [ ] **Partnerschaft suchen:** Steuerberater oder Warenwirtschaftsanbieter, die Fruchtgroßhändler betreuen — als Empfehlungspartner
- [ ] **KI-Features testen:** Bedarfsprognose als Beta für interessierte Kunden
- [ ] **Preiserhöhung für Neukunden:** Basis 199 €/Mo, Premium 349 €/Mo
- [ ] **Ziel:** 40–60 Kunden = 8.000–20.000 €/MRR

---

### Q3–Q4 2027
**Thema: Entscheidungspunkt**

- [ ] Bei 50+ Kunden: Überlegung ob Freelance-Arbeit reduziert wird
- [ ] Ggf. ersten Werkstudenten für Support / Onboarding einstellen
- [ ] Internationalisierung: Österreich, Schweiz, ggf. Frankreich (Sprachvorteil!)
- [ ] Exit-Überlegung: Ist das Produkt in 3–5 Jahren verkaufbar? (SaaS mit 100+ Kunden und stabilem MRR ist attraktiv für strategische Käufer)

---

## Finanzmodell (konservativ)

| Zeitpunkt | Kunden | Ø MRR/Kunde | MRR gesamt | Kommentar |
|-----------|--------|-------------|-----------|-----------|
| Q4 2026 | 8 | 149 € | 1.200 € | Pilot-Phase abgeschlossen |
| Q1 2027 | 20 | 175 € | 3.500 € | Wachstum läuft |
| Q2 2027 | 45 | 200 € | 9.000 € | Skalierung |
| Q4 2027 | 80 | 220 € | 17.600 € | Solide Basis |

**Entwicklungskosten bis MVP:** ca. 0 € (du baust selbst) + Infrastruktur ca. 50–100 €/Mo

---

## Risiken

| Risiko | Gegenmaßnahme |
|--------|--------------|
| Händler kaufen nicht digital | Interviews zuerst — vor dem Bauen! |
| Zu langer Verkaufszyklus (B2B) | Erstgespräche direkt auf Großmärkten, kein Cold Outreach |
| Support frisst Zeit | Gute Doku, Onboarding-Videos, klare Scope-Grenzen |
| Großer Anbieter kopiert die Idee | Nische ist zu klein für SAP & Co — das ist dein Schutz |
| Branche digitalisiert sich zu langsam | Dann: pivot zu verwandter Branche (Blumengroßhandel, Gemüse) |

---

## Warum gerade diese Nische?

- **Unterdigitalisiert:** Wenig Wettbewerb, keine dominante Lösung
- **Zahlungsbereit:** Händler rechnen in Margen, verstehen ROI
- **Sticky:** Wenn Bestellhistorie und Kunden im System sind, wechselt niemand
- **Kleiner Markt, aber fein:** 1.500 Händler × 200 €/Mo = 3,6 Mio. €/Jahr adressierbares Marktvolumen in DE allein
- **Skalierbar über DACH:** Österreich und Schweiz sprechen Deutsch, ähnliche Branchenstruktur

---

## Erster konkreter Schritt

**Diese Woche:** Münchener Großmarkt (Schupferstraße 5) besuchen und mit 2–3 Händlern sprechen. Einfach hingehen, ehrlich sagen dass du Software entwickelst und Feedback suchst. Die meisten Großmarkthändler sind offen für solche Gespräche — besonders wenn du früh morgens (5–8 Uhr) kommst, wenn der Betrieb etwas ruhiger wird.

---

*Dieses Dokument ist eine KI-gestützte Empfehlung (März 2026). Grundlage sind öffentliche Marktdaten und Branchenkenntnis — eigene Markterkundung (Interviews!) ist zwingend vor dem Bauen.*
