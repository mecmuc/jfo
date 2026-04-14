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
| LLM | **Claude Managed Agents** (statt rohe Claude API) |
| Frontend | React Native oder Flutter (mobil) / Next.js (Web) |
| Automatisierung | n8n für Benachrichtigungen (z.B. "Frist läuft ab") |

> **Update April 2026:** Statt die Claude API direkt einzubinden, lohnt sich **Claude Managed Agents** (Public Beta seit 8.4.2026). Damit entfällt die eigene Agent-Loop und Tool-Execution — der Dokumenten-Agent kann Dateien lesen, Code ausführen und Sessions halten, ohne dass du Sandboxing und State-Management selbst baust. Kosten: Standard API-Tokens + $0.08/Session-Stunde. Für ein MVP mit episodischem Nutzungsverhalten kaum ins Gewicht fallend.
>
> **LangGraph bleibt trotzdem relevant** — die beiden ersetzen sich nicht. Claude Managed Agents ist die *Laufzeitumgebung* (Hosting, Sandboxing, Sessions), LangGraph ist die *Logik-Ebene* (Ablaufsteuerung, Verzweigungen, parallele Nodes). LangGraph-Graphen laufen innerhalb von Managed Agents. Für die RAG-Pipeline (Retrieve → Augment → Generate) und parallele Dokument-Analyse ist LangGraph weiterhin das richtige Tool.

> **CrewAI vs. LangGraph (April 2026):** CrewAI wäre technisch möglich, passt aber weniger gut. CrewAI hat kein RAG-Primitiv und keine offizielle Managed-Agents-Integration. LangGraph ist der richtige Ansatz für die Kernpipeline. CrewAI wird interessant, wenn das Projekt später Multi-Agent-Koordination braucht (z.B. Extractor-Agent + Frist-Agent + Report-Agent) — CrewAI kann LangGraph-Subgraphen als Tools aufrufen, die beiden schließen sich nicht aus.

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

- [ ] Claude Managed Agents Docs lesen & Beta-Zugang beantragen
- [ ] LangGraph Kurs abschließen (für RAG-Pipeline-Logik)
- [ ] FastAPI Hello World mit PDF-Upload aufsetzen
- [ ] ChromaDB lokal einrichten und erstes Dokument einlesen
- [ ] LangGraph-Graph in Managed Agents deployen
