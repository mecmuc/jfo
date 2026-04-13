# Projektidee: KI-Dokumentenassistent für Selbstständige & KMU

## Die Idee

Ein lokaler KI-Assistent, der Dokumente (PDFs, Rechnungen, Verträge, Angebote) einliest und auf natürlichsprachige Fragen dazu antwortet — entweder als Web-App oder als React Native / Flutter App.

**Arbeitstitel:** "DocBuddy" oder "Papierlos.ai"

---

## Was er kann

- PDFs hochladen (Rechnungen, Verträge, Angebote, Steuerbescheide)
- Fragen stellen: *"Wann läuft dieser Vertrag aus?"*, *"Wie hoch ist die Gesamtsumme aller Rechnungen aus Q1?"*
- Zusammenfassungen generieren
- Wichtige Fristen & Beträge automatisch extrahieren
- Mehrsprachig (DE/EN) — passt zu deiner bisherigen Polylang-Erfahrung

---

## Tech Stack (passt zu deinen Skills)

| Schicht | Technologie |
|---|---|
| Backend | Python + FastAPI |
| AI / RAG | LangChain/LangGraph + ChromaDB (lokal) |
| LLM | Claude API (Anthropic) |
| Frontend | React Native oder Flutter (mobil) / Next.js (Web) |
| Automatisierung | n8n für Benachrichtigungen (z.B. "Frist läuft ab") |

---

## Warum dieses Projekt?

**Für dich als Freelancer:**
- Zeigt das komplette Stack: Mobile + Backend + KI + RAG
- Echter Use Case — jeder Selbstständige hat das Problem
- Kann als Portfolioprojekt auf janfoshag.de als Case Study landen
- Potenziell als kleines SaaS vermarktbar (Zielgruppe: Freelancer, Steuerberater, kleine Agenturen)

**Lerneffekt:**
- RAG in der Praxis (Embeddings, Chunking, Retrieval-Strategien)
- LangGraph für mehrstufige Dokumentenanalyse
- FastAPI + Auth (JWT) als professionelles Backend-Pattern

---

## MVP Scope (2–3 Wochen)

1. PDF-Upload + Text-Extraktion (PyMuPDF)
2. Embedding & Speicherung in ChromaDB
3. Q&A via Claude API (RAG-Pipeline)
4. Einfaches Web-UI (Next.js oder Streamlit für schnellen Start)

---

## Nächste Schritte

- [ ] LangGraph Kurs abschließen (Grundlagen für Schritt 3)
- [ ] FastAPI Hello World mit PDF-Upload aufsetzen
- [ ] ChromaDB lokal einrichten und erstes Dokument einlesen
- [ ] Claude API für Q&A integrieren
