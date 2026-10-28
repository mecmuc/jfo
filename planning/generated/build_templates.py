"""Baut elementor-home-kundensicht, elementor-ueber-mich und elementor-home-it aus dem Export vom 16.10.2026."""
import copy, json, secrets, sys

SRC, OUTDIR = sys.argv[1], sys.argv[2]
DATE = "2026-10-28"
BLUE, PURPLE = "#0137d2", "#800080"

export = json.load(open(SRC))
old = {e["id"]: e for e in export["content"][0]["elements"]}

# Bild-Platzhalter: nach dem Upload hier die Mediathek-URLs (und IDs) eintragen
IMAGES = {
    "agentic": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/agentic-ai.jpg", "id": ""},
    "voice": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/voice-agents.jpg", "id": ""},
    "apple": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/apple-intelligence.jpg", "id": ""},
    "gastro": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/gastronomie.jpg", "id": ""},
    "logistik": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/logistik.jpg", "id": ""},
    "obst": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/obst-grosshandel.jpg", "id": ""},
    "ehinger": {"url": "https://janfoshag.de/wp-content/uploads/2026/10/ehinger-bestell-app-retusche.jpg", "id": ""},
}


def nid():
    return secrets.token_hex(4)[:7]


def box(unit="px", t=0, r=0, b=0, l=0):
    return {"unit": unit, "top": str(t), "right": str(r), "bottom": str(b), "left": str(l), "isLinked": False}


def heading(text, size="h2", font_size=28, color="#000000", margin_bottom=12):
    return {"id": nid(), "elType": "widget", "widgetType": "heading", "elements": [], "isInner": False,
            "settings": {"title": text, "header_size": size, "title_color": color,
                         "typography_typography": "custom", "typography_font_family": "Josefin Sans",
                         "typography_font_weight": "600",
                         "typography_font_size": {"unit": "px", "size": font_size, "sizes": []},
                         "typography_font_size_mobile": {"unit": "px", "size": round(font_size * 0.8), "sizes": []},
                         "_margin": box(b=margin_bottom)}}


def text(html, margin_bottom=0):
    s = {"editor": html}
    if margin_bottom:
        s["_margin"] = box(b=margin_bottom)
    return {"id": nid(), "elType": "widget", "widgetType": "text-editor", "elements": [], "isInner": False, "settings": s}


def button(label, url):
    s = copy.deepcopy(old["36d9fec8"]["settings"])
    s.pop("display_condition_list", None)
    s.update({"text": label, "link": {"url": url, "is_external": "", "nofollow": "", "custom_attributes": ""},
              "_margin": box(b=48)})  # mehr Abstand nach Buttons
    return {"id": nid(), "elType": "widget", "widgetType": "button", "elements": [], "isInner": False, "settings": s}


def image(key, alt, ratio_height=380):
    img = IMAGES[key]
    s = {"image": {"url": img["url"], "id": img["id"], "alt": alt, "source": "library"},
         "image_size": "large", "width": {"unit": "%", "size": 100, "sizes": []},
         "image_border_radius": box(t=12, r=12, b=12, l=12)}
    if ratio_height:  # Querformat: feste Höhe, zuschneiden
        s.update({"height": {"unit": "px", "size": ratio_height, "sizes": []},
                  "height_mobile": {"unit": "px", "size": round(ratio_height * 0.6), "sizes": []},
                  "object-fit": "cover"})
    else:  # Hochformat-Screenshot: volle Höhe, mit Schatten, auf Handy schmaler
        s.update({"width_mobile": {"unit": "%", "size": 70, "sizes": []}, "align_mobile": "center",
                  "image_box_shadow_box_shadow_type": "yes",
                  "image_box_shadow_box_shadow": {"horizontal": 0, "vertical": 8, "blur": 24, "spread": 0,
                                                  "color": "rgba(0,0,0,0.18)"}})
    return {"id": nid(), "elType": "widget", "widgetType": "image", "elements": [], "isInner": False, "settings": s}


def container(children, direction="column", gap=16, bg=None, padding=0, margin_bottom=0, width=None):
    s = {"content_width": "full", "flex_direction": direction, "flex_direction_mobile": "column" if direction == "row" else "",
         "flex_gap": {"column": str(gap), "row": str(gap), "unit": "px", "isLinked": True, "size": gap}}
    if bg:
        s.update({"background_background": "classic", "background_color": bg,
                  "border_radius": box(t=16, r=16, b=16, l=16),
                  "css_classes": "jfo-card"})  # siehe CARD_CSS
    if padding:
        s["padding"] = box(t=padding, r=padding, b=padding, l=padding)
        s["padding_mobile"] = box(t=20, r=20, b=20, l=20)
    if margin_bottom:
        s["margin"] = box(b=margin_bottom)
    if width:
        s["width"] = {"unit": "%", "size": width, "sizes": []}
        s["width_mobile"] = {"unit": "%", "size": 100, "sizes": []}
    return {"id": nid(), "elType": "container", "isInner": True, "elements": children, "settings": s}


def card(img_key, alt, title, problem, solution, extra=None, labels=("Problem", "Lösung")):
    kids = [image(img_key, alt, 300), heading(title, "h3", 24, BLUE, 4),
            text(f"<p><strong>{labels[0]}:</strong> {problem}</p>"),
            text(f"<p><strong>{labels[1]}:</strong> {solution}</p>")]
    if extra:
        kids.append(extra)
    return container(kids, gap=12, bg="#f4f6fd", padding=28, margin_bottom=24)


def dashboard_link(label):
    return ('<p style="margin-top: 14px; margin-bottom: 24px;"><a style="display: inline-block; background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%); '
            'color: #ffffff; -webkit-text-fill-color: #ffffff; text-decoration: none; border: none; border-radius: 50px; padding: 4px 32px; '
            'font-weight: bold; letter-spacing: 0.04em; box-shadow: 0 4px 18px rgba(124, 58, 237, 0.40);" '
            f'href="https://dashboards.fruchthandel-apps.de" target="_blank" rel="noopener noreferrer">{label}</a></p>')


def clean(e):
    """Bestehendes Element übernehmen: neue IDs, ohne display_condition_list."""
    e = copy.deepcopy(e)
    def walk(x):
        x["id"] = nid()
        x.get("settings", {}).pop("display_condition_list", None)
        for c in x.get("elements", []):
            walk(c)
    walk(e)
    return e


def edit_text(e, old_txt, new_txt):
    """Text in einem übernommenen text-editor-Widget ersetzen."""
    assert old_txt in e["settings"]["editor"], old_txt
    e["settings"]["editor"] = e["settings"]["editor"].replace(old_txt, new_txt)
    return e


def footer():
    return [clean(old["1a2b31a0"]), clean(old["209f7f58"])]


# Karten: hell mit dunklem Text; im Dark Mode (html[data-theme=dark] oder OS-Einstellung) dunkel mit hellem Text
_TXT = ".jfo-card, .jfo-card p, .jfo-card li, .jfo-card strong, .jfo-card em, .jfo-card blockquote"
_DARK = ("{0} .jfo-card {{ background-color: #24223a !important; }}"
         "{0} .jfo-card .jfo-card {{ background-color: #2c2944 !important; }}"
         "{0} .jfo-card blockquote {{ background-color: rgba(255,255,255,0.06) !important; }}"
         + "".join("{0} " + sel.strip() + ", " for sel in _TXT.split(","))[:-2]
         + " {{ color: #e4e4ee !important; }}")
CARD_CSS = ("<style>" + _TXT + " { color: #333333 !important; }"
            + _DARK.format('html[data-theme="dark"]')
            + "@media (prefers-color-scheme: dark) {" + _DARK.format('html:not([data-theme="light"])') + "}"
            + "</style>")


def page(title, elements):
    style = {"id": nid(), "elType": "widget", "widgetType": "html", "elements": [], "isInner": False,
             "settings": {"html": CARD_CSS}}
    root = {"id": nid(), "elType": "container", "isInner": False, "elements": [style] + elements,
            "settings": {"content_width": "boxed", "flex_gap": {"column": "0", "row": "0", "unit": "px", "isLinked": True, "size": 0}}}
    return {"content": [root], "page_settings": {"hide_title": "yes"}, "version": "0.4", "title": title, "type": "page"}


# ---------------- Startseite ----------------
home = [
    # 1. Hero
    heading("Software-Lösungen", "h1", 38, BLUE, 16),
    text("<p>Ich entwickle Software, die Abläufe vereinfacht: KI-Apps mit Sprachsteuerung, "
         "selbstständig handelnde Agenten und Sprachassistenten.</p>"
         "<p>Ich bin Jan Foshag, Software-Entwickler in München, seit über 20 Jahren.</p>", 8),
    button("Kontakt aufnehmen", "#kontakt"),

    # 2. Was ich entwickle
    heading("Was ich entwickle", "h2", 30, "#000000", 20),
    card("apple", "iPhone-App mit KI und Sprachsteuerung", "Apps mit KI und Sprachsteuerung",
         "Ihre App soll klüger werden und sich per Sprache bedienen lassen. Aber Kundendaten dürfen das Gerät nicht verlassen, "
         "und übliche Cloud-KI kostet pro Anfrage.",
         "Apps, die gesprochene Sätze verstehen: bestellen, suchen und erfassen per Sprache statt per Formular. "
         "Die KI läuft auf Wunsch direkt auf dem Gerät oder, mit Apple Intelligence, in Apples Private Cloud: datenschutzfreundlich und ohne laufende Kosten pro Anfrage. "
         "Auf dem iPhone wird Ihre App zusätzlich über Siri und Kurzbefehle erreichbar. "
         "Grundlage sind über 10 Jahre App-Entwicklung für iOS und Android, nativ und plattformübergreifend."),
    card("agentic", "Abstraktes Netzwerk als Symbol für KI-Agenten", "KI-Agenten",
         "Routinearbeit kostet Ihr Team Stunden: E-Mails sortieren, Daten zwischen Systemen übertragen, "
         "ans Telefon gehen, wenn gerade niemand Zeit hat.",
         "KI-Agenten, die solche Aufgaben selbstständig erledigen, direkt in Ihren bestehenden Systemen. "
         "Bei wichtigen Entscheidungen fragen sie nach. Als Sprachassistent nehmen sie rund um die Uhr "
         "Bestellungen und Reservierungen am Telefon an."),

    # 2b. Branchen
    heading("Gastronomie, Logistik und Großhandel", "h2", 30, "#000000", 16),
    container([container([image("gastro", "Profiküche in der Gastronomie", 160)], width=32),
               container([image("logistik", "Lagerregale mit Kartons", 160)], width=32),
               container([image("obst", "Obst in Kisten im Großhandel", 160)], width=32)],
              direction="row", gap=12, margin_bottom=16),
    text("<p>Gastronomie, Großhandel und Logistik hängen eng zusammen: Bestellungen, Lieferungen, Lager. "
         "Genau dort spielen Apps mit KI und Sprachsteuerung ihre Stärken aus. Ich kenne diese Abläufe aus der Praxis: "
         "aus der Intralogistik und aus Bestell-Apps für den Fruchtgroßhandel.</p>", 32),

    # 3. Frucht- und Großhandel: Fallbeispiel Ehinger (Kasten) + nächster Schritt (außerhalb)
    heading("Für den Frucht- und Großhandel", "h2", 30, "#000000", 16),
    container([
        heading("Fallbeispiel: Fruchthof Ehinger", "h3", 20, PURPLE, 8),
        container([
            container([image("ehinger", "Startbildschirm der Bestell-App des Fruchthof Ehinger mit Sortiment, Mei Gmiaskorb, Warenkorb und Aktionen", None)], width=38),
            container([text("<p><strong>Lösung:</strong> Eine Bestell-App für iOS und Android. Gastronomie-Kunden legen ihre feste "
                             "Bestellliste „Mei Gmiaskorb“ an und bestellen mit wenigen Klicks. Aktuelle Angebote erscheinen direkt in der App "
                             "und per Push-Nachricht.</p>"
                             "<p><strong>Ergebnis:</strong> Die Bestellungen über die App wachsen stetig.</p>")],
                      width=58),
        ], direction="row", gap=24),
        text('<blockquote class="wp-block-quote"><p><em>„Ein sehr gutes, kompetentes Team, das unsere Wünsche und Anregungen nahezu '
             'perfekt umgesetzt hat. Auch bei den Kunden kommt unsere App sehr gut an, da sie ohne Komplikationen läuft und es den Kunden '
             'sogar Spaß macht mit der App zu arbeiten.“</em></p><p>— Fruchthof Ehinger</p></blockquote>'),
    ], gap=12, bg="#faf5fa", padding=28, margin_bottom=24),
    text("<p><strong>Der nächste Schritt für den Fruchthandel:</strong> Ein KI-Dashboard, das Marktdaten analysiert und verständlich aufbereitet. "
         "Weitere Schnittstellen, etwa zum Fruchtmanager, und KI-Features wie Sprachbestellung lassen sich ergänzen.</p>"),
    text(dashboard_link("KI-Dashboard ansehen →")),

    # 4. Warum mit mir
    heading("Warum mit mir", "h2", 30, "#000000", 12),
    text("<ul>"
         "<li><strong>20+ Jahre</strong> Software-Entwicklung: von Handelsplattformen und Intralogistik über Apps für iOS und Android bis zu KI-Agenten</li>"
         "<li><strong>Apps seit über 10 Jahren:</strong> iOS und Android, nativ und plattformübergreifend, u. a. für eine Krankenkasse, Plan.Net und Indoor-Navigation</li>"
         "<li><strong>10.000+ Installationen</strong> der App „GFK-Spiel“</li>"
         "<li><strong>Direkter Draht:</strong> Sie sprechen mit dem Entwickler</li>"
         "</ul>", 8),
    button("Mehr über mich, Projekte und Werdegang", "/ueber-mich/"),

    # 5. Kontakt (unverändert)
    clean(old["153505ad"]), clean(old["1e5fc687"]), clean(old["5ecbb2fe"]),
    clean(old["6de89887"]), clean(old["66c148a2"]),
    *footer(),
]

# ---------------- Über mich ----------------
about = [
    heading("Über mich", "h1", 38, BLUE, 16),
    text("<p>Ich bin Jan Foshag, selbständiger Software-Entwickler. Ich lebe und arbeite in München. Seit über 20 Jahren entwickle ich Software – "
         "von klassischen Java-Anwendungen über Apps für iOS und Android, nativ und plattformübergreifend, "
         "bis hin zu modernen KI-gestützten Lösungen.</p>"),
    clean(old["27d2f951"]), clean(old["1a6e23f1"]),   # Projektbeispiele + Akkordeon
    clean(old["583af67a"]),                            # Bildergalerie
    clean(old["d9fd1e6"]), clean(old["1b2abba7"]),     # Werdegang
    clean(old["42e660d6"]),                            # Schwerpunkte
    text("<ul>"
         "<li>App-Entwicklung: iOS und Android, nativ und Cross-Platform (React Native, Flutter)</li>"
         "<li>Künstliche Intelligenz: Apple Intelligence, Siri AI, KI-Agenten, Voice Agents, Anthropic, Mistral, RAG, MCP, Python u. v. m.</li>"
         "<li>Webanwendungen</li>"
         "</ul>"),
    clean(old["38aaf910"]), clean(old["320d5a1b"]),    # Ausbildung
    clean(old["314e57f0"]), clean(old["4eb3635e"]),    # Sprachen
    button("Kontakt aufnehmen", "/#kontakt"),
    *footer(),
]

# ---------------- Startseite Italienisch (eine Seite: Soluzioni + kurzes Chi sono) ----------------
IT = ("Problema", "Soluzione")
home_it = [
    # 1. Hero
    heading("Soluzioni software", "h1", 38, BLUE, 16),
    text("<p>Sviluppo software che semplifica i processi: app con IA e comando vocale, "
         "agenti autonomi e assistenti vocali.</p>"
         "<p>Sono Jan Foshag, sviluppatore software a Monaco di Baviera da oltre 20 anni.</p>", 8),
    button("Contattami", "#kontakt"),

    # 2. Cosa sviluppo
    heading("Cosa sviluppo", "h2", 30, "#000000", 20),
    card("apple", "App per iPhone con IA e comando vocale", "App con IA e comando vocale",
         "La Sua app deve diventare più intelligente e lasciarsi comandare con la voce. Ma i dati dei clienti non devono lasciare "
         "il dispositivo, e la solita IA nel cloud costa a ogni richiesta.",
         "App che capiscono le frasi parlate: ordinare, cercare e registrare con la voce invece che con un modulo. "
         "Se desiderato, l’IA funziona direttamente sul dispositivo oppure, con Apple Intelligence, nel Private Cloud di Apple: nel rispetto della privacy "
         "e senza costi continui per ogni richiesta. Su iPhone la Sua app diventa raggiungibile anche tramite Siri e Comandi rapidi. "
         "Alla base ci sono oltre 10 anni di sviluppo di app per iOS e Android, native e multipiattaforma.",
         labels=IT),
    card("agentic", "Rete astratta come simbolo degli agenti IA", "Agenti IA",
         "Le attività di routine costano ore al Suo team: smistare e-mail, trasferire dati tra sistemi, "
         "rispondere al telefono quando nessuno ha tempo.",
         "Agenti IA che svolgono questi compiti in autonomia, direttamente nei Suoi sistemi esistenti. "
         "Per le decisioni importanti chiedono conferma. Come assistenti vocali prendono ordini e prenotazioni "
         "al telefono 24 ore su 24.",
         labels=IT),

    # 2b. Settori
    heading("Ristorazione, logistica e commercio all’ingrosso", "h2", 30, "#000000", 16),
    container([container([image("gastro", "Cucina professionale nella ristorazione", 160)], width=32),
               container([image("logistik", "Scaffali di magazzino con scatoloni", 160)], width=32),
               container([image("obst", "Frutta in cassette nel commercio all’ingrosso", 160)], width=32)],
              direction="row", gap=12, margin_bottom=16),
    text("<p>Ristorazione, commercio all’ingrosso e logistica sono strettamente collegati: ordini, consegne, magazzino. "
         "È proprio lì che le app con IA e comando vocale danno il meglio. Conosco questi processi dalla pratica: "
         "dall’intralogistica e dalle app di ordinazione per il commercio all’ingrosso di frutta.</p>", 32),

    # 3. Caso di studio Ehinger + prossimo passo
    heading("Per il commercio all’ingrosso di frutta", "h2", 30, "#000000", 16),
    container([
        heading("Caso di studio: Fruchthof Ehinger", "h3", 20, PURPLE, 8),
        container([
            container([image("ehinger", "Schermata iniziale dell’app di ordinazione del Fruchthof Ehinger con assortimento, Mei Gmiaskorb, carrello e offerte", None)], width=38),
            container([text("<p><strong>Soluzione:</strong> Un’app di ordinazione per iOS e Android. I clienti della ristorazione creano "
                             "la loro lista d’ordine fissa „Mei Gmiaskorb“ e ordinano con pochi clic. Le offerte attuali compaiono "
                             "direttamente nell’app e tramite notifica push.</p>"
                             "<p><strong>Risultato:</strong> Gli ordini tramite l’app crescono costantemente.</p>")],
                      width=58),
        ], direction="row", gap=24),
        text('<blockquote class="wp-block-quote"><p><em>„Un team molto valido e competente, che ha realizzato in modo quasi perfetto '
             'i nostri desideri e suggerimenti. Anche i clienti apprezzano molto la nostra app, perché funziona senza complicazioni '
             'e lavorarci è persino divertente.“</em></p><p>— Fruchthof Ehinger (tradotto dal tedesco)</p></blockquote>'),
    ], gap=12, bg="#faf5fa", padding=28, margin_bottom=24),
    text("<p><strong>Il prossimo passo per il commercio di frutta:</strong> una dashboard IA che analizza i dati di mercato "
         "e li presenta in modo chiaro. Si possono aggiungere altre interfacce, ad esempio verso il Fruchtmanager, "
         "e funzioni IA come l’ordinazione vocale.</p>"),
    text(dashboard_link("Vedi la dashboard IA →")),

    # 4. Chi sono (kurz, ersetzt „Warum mit mir“ + Über-mich-Seite)
    text('<div id="chi-sono"></div>'),
    heading("Chi sono", "h2", 30, "#000000", 12),
    text("<p>Sono Jan Foshag, sviluppatore software indipendente a Monaco di Baviera. Da oltre 20 anni sviluppo software: "
         "dalle piattaforme di commercio e dall’intralogistica alle app per iOS e Android, fino agli agenti IA.</p>"
         "<ul>"
         "<li><strong>App da oltre 10 anni:</strong> iOS e Android, native e multipiattaforma, tra l’altro per una cassa malattia, Plan.Net e la navigazione indoor</li>"
         "<li><strong>Oltre 10.000 installazioni</strong> dell’app „GFK-Spiel“</li>"
         "<li><strong>Contatto diretto:</strong> parla direttamente con lo sviluppatore</li>"
         "<li><strong>Lingue:</strong> tedesco e francese madrelingua, inglese buono. L’italiano lo sto imparando: mi scriva pure in italiano!</li>"
         "</ul>", 8),

    # 5. Contatto
    clean(old["153505ad"]), clean(old["1e5fc687"]),
    heading("Contatto", "h2", 30, "#000000", 12),
    text('<p>Sono sempre alla ricerca di nuovi progetti e sarò felice di ricevere un Suo messaggio.</p>'
         '<p><a href="mailto:info@janfoshag.de">info@janfoshag.de</a></p>'
         '<p><a href="tel:+498945439111">+49 89 45439111</a></p>'
         '<p><a href="https://www.xing.com/profile/Jan_Foshag">Xing</a>, '
         '<a href="https://www.linkedin.com/in/jan-foshag-01b39338/">LinkedIn</a></p>'),
    clean(old["66c148a2"]),                            # [jfo_contact_form], erkennt IT über Polylang
    clean(old["1a2b31a0"]),
    text('<p style="text-align:center; font-size:0.85rem;"><a href="/impressum/">Note legali (Impressum)</a> &nbsp;|&nbsp; '
         '<a href="/datenschutz/">Privacy (Datenschutz)</a></p>'),
]

for name, title, els in [("elementor-home-kundensicht", "Startseite Kundensicht", home),
                         ("elementor-ueber-mich", "Über mich", about),
                         ("elementor-home-it", "Home (IT)", home_it)]:
    path = f"{OUTDIR}/{name}-{DATE}.json"
    json.dump(page(title, els), open(path, "w"), ensure_ascii=False, indent=1)
    print("geschrieben:", path)
