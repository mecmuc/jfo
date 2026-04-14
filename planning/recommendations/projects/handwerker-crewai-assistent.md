# Projektidee: AI-Assistent für Münchner Handwerksbetriebe

**Stand:** April 2026

---

## Die Idee

Viele kleine Handwerksbetriebe in München haben dasselbe Problem: Anfragen kommen über WhatsApp, E-Mail und Telefon, und niemand hat Zeit für strukturierte Kundenkommunikation.

Ein auf **CrewAI** basierter Multi-Agenten-Assistent übernimmt die Erstkommunikation und Terminkoordination — einmalig eingerichtet, monatlich abgerechnet.

---

## Was der Assistent kann

1. **Anfragen klassifizieren** — dringend/nicht dringend, Auftragstyp
2. **Standardantworten generieren** — auf Deutsch, im Ton des Betriebs (du/Sie konfigurierbar)
3. **Terminslots vorschlagen** — via Google Calendar API
4. **Kostenvoranschläge vorausfüllen** — als Vorlage, nicht final

---

## Tech-Stack

```
CrewAI (Agentenlogik)
├── Agent 1: Anfragen-Classifier
├── Agent 2: Antwort-Generator (DE, du/Sie konfigurierbar)
└── Agent 3: Kalender-Koordinator
Claude API (LLM)
WhatsApp Business API (Eingangskanal)
Google Calendar API (Terminverwaltung)
```

**Warum CrewAI (nicht LangGraph):**
CrewAI modelliert Agenten als "Crew" mit Rollen, Zielen und Aufgaben — das ist Kunden intuitiv erklärbar. Unter 20 Zeilen Python für einen funktionierenden Multi-Agenten-Workflow. Prototypen ~40% schneller als mit LangGraph — wichtig für Kundenpräsentationen und Discovery-Workshops.

LangGraph wäre technisch möglich, ist aber hier Overkill — es gibt keine komplexen Loops oder Checkpointing-Anforderungen.

---

## Warum das gut zu dir passt

- Lokaler Markt München — persönliche Akquise über Netzwerk realistisch
- Kein SaaS-Aufwand: einmalige Einrichtung pro Kunde, monatliche Wartungspauschale
- WordPress/Web-Kenntnisse reichen für ein einfaches Admin-Dashboard
- Skalierbar auf andere Branchen: Zahnarztpraxen, Reinigungen, Steuerberater

---

## Realistische Einnahmen

| Posten | Betrag |
|---|---|
| Setup pro Betrieb | 1.500–3.000 € |
| Monatliche Wartung/Hosting | 150–300 € / Monat |
| Ziel: 5 Kunden | 750–1.500 € passiv / Monat |

---

## MVP Scope (1–2 Wochenenden)

1. CrewAI Quickstart lokal zum Laufen bringen
2. Proof of Concept: Handwerker-Anfrage-Classifier (ein Agent reicht fürs MVP)
3. Fake-WhatsApp-Eingang via Webhook simulieren (kein echtes WA Business nötig für PoC)
4. Einen Münchner Bekannten mit Handwerksbetrieb als Pilot-Tester ansprechen

---

## Nächste Schritte

- [ ] CrewAI Quickstart lokal aufsetzen — [docs.crewai.com](https://docs.crewai.com) (30 Min)
- [ ] Anfrage-Classifier PoC bauen (1 Wochenende)
- [ ] Pilot-Tester aus Münchner Netzwerk finden
- [ ] Preismodell festlegen: Setup-Fee + Wartungspauschale

---

## Abgrenzung zu DocBuddy

| | DocBuddy | Handwerker-AI |
|---|---|---|
| Stack | LangGraph + RAG | CrewAI + Multi-Agent |
| Zielgruppe | Freelancer / KMU (Dokumente) | Handwerksbetriebe (Kommunikation) |
| Vertrieb | SaaS / Self-Service | Direktvertrieb lokal München |
| Einstiegshürde | Mittel (RAG-Infrastruktur) | Niedrig (CrewAI sehr schnell) |

Die Projekte schließen sich nicht aus. Handwerker-AI ist der schnellere Weg zu ersten Kunden und Einnahmen.

---

*Projektidee aus ki-frameworks-2026.md extrahiert, April 2026.*
