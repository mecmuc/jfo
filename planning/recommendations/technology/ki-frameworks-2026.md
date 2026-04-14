# KI-Agentenframeworks 2026 — Update & neue Empfehlungen

**Stand:** April 2026

---

## Ist LangGraph noch die richtige Empfehlung?

**Kurzantwort: Ja — aber nicht mehr für alle.**

LangGraph ist 2026 nach wie vor das framework der Wahl für **komplexe, stateful Agenten** (Loops, Branches, Human-in-the-loop, Checkpointing). 87% Task-Success in aktuellen Benchmarks, beste Observability via LangSmith. Wenn du Produktions-Agenten baust, die wirklich "denken" müssen, ist LangGraph noch erste Wahl.

**Was sich geändert hat:** Der Markt ist deutlich breiter geworden. Für Freelancer, die schnell Prototypen verkaufen wollen, ist LangGraph inzwischen oft *zu komplex als Einstieg*. CrewAI und der neue OpenAI Agents SDK liegen 2026 vorne, wenn Geschwindigkeit wichtiger ist als volle Kontrolle.

---

## Framework-Übersicht 2026

| Framework | Stärke | Lernkurve | Für Jan? |
|---|---|---|---|
| **LangGraph** | Stateful, komplex, Production-ready | Steil | Ja — für Enterprise-Projekte |
| **CrewAI** | Multi-Agenten, Rolle/Ziel-Modell, 40% schnellere Prototypen | Niedrig | **Ja — bester Einstieg** |
| **OpenAI Agents SDK** | Einfachste API, 100+ LLMs, nicht nur OpenAI | Sehr niedrig | Ja — für schnelle Demos |
| **Microsoft Agent Framework** | AutoGen + Semantic Kernel vereint, A2A + MCP, GA März 2026 | Mittel | Eher für .NET-Kunden |
| **AutoGen** | *Maintenance mode* — keine neuen Features | — | Nicht mehr empfohlen |

---

## Neue Empfehlung: CrewAI

### Hintergrund

CrewAI wurde von **João Moura** (brasilianischer Software-Engineer) 2023 als Open-Source-Projekt gestartet. Das Unternehmen dahinter heißt **CrewAI Inc.** und hat inzwischen Venture-Capital erhalten. Moura ist auch Instructor im offiziellen DeepLearning.ai-Kurs (zusammen mit Andrew Ng).

### Warum CrewAI 2026 interessant für dich ist

CrewAI modelliert Agenten als "Crew" mit Rollen, Zielen und Aufgaben — das lässt sich Kunden intuitiv erklären. Du brauchst unter 20 Zeilen Python für einen funktionierenden Multi-Agenten-Workflow.

**Freelancer-Vorteil:** Du kannst Prototypen ~40% schneller bauen als mit LangGraph, was in Kundenpräsentationen und Discovery-Workshops ein echter Unterschied ist.

**Empfohlener Kurs:**
- [CrewAI Crash Course 2026 — DeepLearning.ai](https://www.deeplearning.ai) (kostenlos)
- [CrewAI Official Docs Quickstart](https://docs.crewai.com) — 30 Minuten bis zum ersten laufenden Agenten

---

## Neue Empfehlung: OpenAI Agents SDK

Trotz des Namens unterstützt das SDK seit 2026 über 100 LLMs via Chat Completions API — also auch Claude. Es ist das einfachste Framework überhaupt und ideal für Demos und kleine Automatisierungen.

---

## Projektidee 2026: "AI-Assistent für Münchner Handwerksbetriebe"

### Idee

Viele kleine Handwerksbetriebe in München haben dasselbe Problem: Anfragen kommen über WhatsApp, E-Mail und Telefon, und niemand hat Zeit für strukturierte Kundenkommunikation. Ein auf CrewAI basierter Agent könnte:

1. **Anfragen klassifizieren** (dringend/nicht dringend, Auftragstyp)
2. **Standardantworten generieren** (auf Deutsch, im Ton des Betriebs)
3. **Terminslots vorschlagen** (via Google Calendar API)
4. **Kostenvoranschläge vorausfüllen** (als Vorlage, nicht final)

### Tech-Stack

```
CrewAI (Agentenlogik)
├── Agent 1: Anfragen-Classifier
├── Agent 2: Antwort-Generator (DE, du/Sie konfigurierbar)
└── Agent 3: Kalender-Koordinator
Claude API (LLM)
WhatsApp Business API (Eingangskanal)
Google Calendar API (Terminverwaltung)
```

### Warum das gut zu dir passt

- Du kennst WordPress/Web — ein einfaches Admin-Dashboard dazu ist kein Aufwand
- Lokaler Markt München: Persönliche Akquise realistisch
- Kein SaaS-Aufwand nötig: Einmalige Einrichtung pro Kunde, monatliche Wartungspauschale
- Skalierbar: Dasselbe System funktioniert für Zahnarztpraxen, Reinigungen, Steuerberater

### Realistische Einnahmen

- Setup: 1.500–3.000 € pro Betrieb
- Monatliche Wartung/Hosting: 150–300 € / Monat
- 5 Kunden = 750–1.500 € passives Monatseinkommen

### Nächste Schritte

1. [ ] CrewAI Quickstart lokal zum Laufen bringen (1–2 Stunden)
2. [ ] Proof of Concept: Handwerker-Anfrage-Classifier (ein Wochenende)
3. [ ] Einen Münchner Bekannten mit Handwerksbetrieb ansprechen als Pilot-Tester

---

## Fazit

LangGraph bleibt sinnvoll für komplexe Projekte — aktualisiere aber `udemy-kurs.md` um den Hinweis, dass **CrewAI 2026 der bessere Einstiegspunkt** ist, wenn du schnell Kunden-Demos liefern willst. Die beiden Frameworks schließen sich nicht aus.

---

**Quellen:**
- [Turing: Top 6 AI Agent Frameworks 2026](https://www.turing.com/resources/ai-agent-frameworks)
- [letsdatascience.com: AI Agent Frameworks Compared](https://letsdatascience.com/blog/ai-agent-frameworks-compared)
- [DEV Community: LangGraph vs CrewAI vs Smolagents Benchmarks](https://dev.to/pooyagolchian/ai-agents-in-2026-langgraph-vs-crewai-vs-smolagents-with-real-benchmarks-on-local-llms-4ma1)
- [Shakudo: Top 9 AI Agent Frameworks March 2026](https://www.shakudo.io/blog/top-9-ai-agent-frameworks)
- [Fungies.io: LangChain vs CrewAI vs AutoGen vs OpenAI SDK 2026](https://fungies.io/ai-agent-frameworks-comparison-2026-langchain-crewai-autogen/)
