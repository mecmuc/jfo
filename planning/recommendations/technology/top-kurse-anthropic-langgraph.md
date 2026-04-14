# Kursempfehlungen: Anthropic, LangGraph & CrewAI

**Stand:** April 2026

---

## Anthropic / Claude

### Kostenlos — Anthropic Academy (offiziell)

> Erste Anlaufstelle. Direkt von Anthropic, offizielles Zertifikat, kein Account nötig.

| Kurs                         | Link                                                      | Dauer       | Priorität    |
| ---------------------------- | --------------------------------------------------------- | ----------- | ------------ |
| Building with the Claude API | [anthropic.skilljar.com](https://anthropic.skilljar.com/) | 8+ h        | ★★★ Pflicht  |
| Model Context Protocol (MCP) | [anthropic.skilljar.com](https://anthropic.skilljar.com/) | 1.1h videos | ★★★ Pflicht  |
| Claude Code                  | [anthropic.skilljar.com](https://anthropic.skilljar.com/) | 1.5h video  | ★★★ Pflicht  |
| Agent Skills                 | [anthropic.skilljar.com](https://anthropic.skilljar.com/) | —           | ★★ Empfohlen |

> **Prüfungsvorbereitung:** Diese Kurse sind gleichzeitig die offizielle Vorbereitung auf die CCA-F-Prüfung — "Building with the Claude API" allein deckt den Großteil des Prüfungsstoffs ab. Zuerst die Academy-Kurse machen, dann die Udemy Practice Exams (Schritt 8) zum Simulieren.

### Bezahlt — Udemy

| Kurs                                          | Link                                                                                              | Wofür                      |
| --------------------------------------------- | ------------------------------------------------------------------------------------------------- | -------------------------- |
| Mastering Claude Code & Agentic AI (2026)     | [udemy.com](https://www.udemy.com/course/master-claude-code/)                                     | Praxis, Agentic Workflows  |
| The Complete Claude Code & Cowork Masterclass | [udemy.com](https://www.udemy.com/course/claude-aiagents-cowork-masterclass/)                     | Überblick Gesamtökosystem  |
| Claude Certified Architect                    | [udemy.com](https://www.udemy.com/course/claude-certified-architect-y/)                           | CCA-F Prüfungsvorbereitung |
| CCAF Practice Exams 2026                      | [udemy.com](https://www.udemy.com/course/new-claude-certified-architect-foundations-cca-f-exams/) | Prüfungssimulation         |

### Zertifizierung: Claude Certified Architect – Foundations (CCA-F)

- Offizielle Anthropic-Zertifizierung seit März 2026
- 60 Fragen, 120 Minuten, Passing Score 720/1000
- Preis: $99 (erste 5.000 im Claude Partner Network kostenlos)
- Anmeldung & Info: [claudecertifications.com](https://claudecertifications.com)

---

## LangGraph

> Richtige Wahl für komplexe, stateful Production-Agenten (Loops, Branches, Human-in-the-loop, Checkpointing). Für schnelle Kunden-Demos ist CrewAI (unten) oft der bessere Einstieg.

| Kurs                                             | Link                                                                                                | Rating                     | Wofür                                 |
| ------------------------------------------------ | --------------------------------------------------------------------------------------------------- | -------------------------- | ------------------------------------- |
| **LangGraph — Develop LLM powered AI agents**    | [udemy.com](https://www.udemy.com/course/langgraph/)                                                | Bestseller / Highest Rated | LangGraph-Fokus, empfohlener Einstieg |
| **LangChain — Agentic AI Engineering**           | [udemy.com](https://www.udemy.com/course/langchain/)                                                | Bestseller                 | LangChain + LangGraph kombiniert      |
| **LLM Engineering, RAG & AI Agents Masterclass** | [udemy.com](https://www.udemy.com/course/become-an-llm-agentic-ai-engineer-14-day-bootcamp-2025/)   | 4.5 ★ (720 Bewertungen)    | LangGraph + MCP + CrewAI + AutoGen    |
| **Ultimate RAG Bootcamp**                        | [udemy.com](https://www.udemy.com/course/ultimate-rag-bootcamp-using-langchainlanggraph-langsmith/) | —                          | RAG-Fokus mit LangGraph & LangSmith   |

Offizielle Doku: [langchain-ai.github.io/langgraph](https://langchain-ai.github.io/langgraph/tutorials/)

---

## CrewAI

> Bester Einstieg für Multi-Agent-Workflows. ~40% schnellere Prototypen als LangGraph, intuitiv erklärbar gegenüber Kunden.

### Kostenlos

| Kurs                                                                | Link                                                                                 | Dauer |
| ------------------------------------------------------------------- | ------------------------------------------------------------------------------------ | ----- |
| **Multi AI Agent Systems with crewAI** (DeepLearning.ai, offiziell) | [coursera.org](https://www.coursera.org/projects/multi-ai-agent-systems-with-crewai) | ~2h   |

### Bezahlt — Udemy

| Kurs                                                              | Link                                                                                           | Dauer | Wofür                                       |
| ----------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ----- | ------------------------------------------- |
| **Agentic AI with CrewAI & Agentic Design Patterns** ✅ Empfohlen | [udemy.com](https://www.udemy.com/course/agentic-ai-with-crewai-agentic-design-patterns/)      | ~4h   | Design Patterns + Capstone-Projekt          |
| **Build Real-World Multi AI Agent Systems with CrewAI**           | [udemy.com](https://www.udemy.com/course/build-real-world-multi-ai-agent-systems-with-crewai/) | —     | Hands-on, echte Projekte mit Streamlit      |
| **Production Grade AI Agents: CrewAI & AWS**                      | [udemy.com](https://www.udemy.com/course/production-grade-agentic-ai/)                         | ~9h   | Deployment auf AWS Bedrock (für AWS-Kunden) |

> Bereits absolviert: "AI Engineer Agentic Track: The Complete Agent & MCP Course" von Ed Donner — [udemy.com](https://www.udemy.com/course/the-complete-agentic-ai-engineering-course/) ✅

---

## Gesamte empfohlene Lernreihenfolge

> Mit Udemy-Abo sind alle Udemy-Kurse ohne Aufpreis. Einzige echte Kosten: die CCA-F-Prüfungsgebühr ($99). Der DeepLearning.ai-Kurs (Coursera) ist optional — der Udemy-Kurs in Schritt 3 deckt dasselbe besser ab.

| Schritt | Kurs                                                                                                                                     | Kosten    |
| ------- | ---------------------------------------------------------------------------------------------------------------------------------------- | --------- |
| 1       | [Anthropic Academy: Building with Claude API](https://anthropic.skilljar.com/)                                                           | kostenlos |
| 2       | [Anthropic Academy: MCP + Claude Code + Agent Skills](https://anthropic.skilljar.com/)                                                   | kostenlos |
| 3       | [LangGraph — Develop LLM powered AI agents (Udemy)](https://www.udemy.com/course/langgraph/)                                             | Udemy Abo |
| 4       | [Agentic AI with CrewAI & Agentic Design Patterns (Udemy)](https://www.udemy.com/course/agentic-ai-with-crewai-agentic-design-patterns/) | Udemy Abo |
| 5       | [Mastering Claude Code & Agentic AI (Udemy)](https://www.udemy.com/course/master-claude-code/)                                           | Udemy Abo |
| 6       | [Claude Certified Architect (Udemy)](https://www.udemy.com/course/claude-certified-architect-y/)                                         | Udemy Abo |
| 7       | [CCAF Practice Exams (Udemy)](https://www.udemy.com/course/new-claude-certified-architect-foundations-cca-f-exams/)                      | Udemy Abo |
| 8       | [CCA-F Prüfung ablegen](https://claudecertifications.com)                                                                                | $99       |

---

## Quellen

- [Anthropic Academy](https://anthropic.skilljar.com/)
- [claudecertifications.com](https://claudecertifications.com)
- [Udemy LangGraph Topic](https://www.udemy.com/topic/langgraph/)
- [DeepLearning.ai: CrewAI Short Course](https://www.coursera.org/projects/multi-ai-agent-systems-with-crewai)
- [Medium: Top LangChain & LangGraph Courses on Udemy 2026](https://medium.com/javarevisited/7-best-udemy-courses-to-learn-langchain-and-langgraph-in-2025-23d5148b2a06)
- [Medium: Top 7 Claude Code Courses on Udemy 2026](https://medium.com/javarevisited/i-tried-20-claude-code-courses-on-udemy-here-are-my-top-7-recommendations-for-2026-5aec9c45c85f)
