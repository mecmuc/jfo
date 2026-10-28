<?php
/**
 * Plugin Name: JFO Contact Form
 * Description: Kontaktformular für janfoshag.de — Shortcode: [jfo_contact_form]
 * Version: 1.7
 * Author: Jan Foshag
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function jfo_lang() {
    $locale = function_exists( 'pll_current_language' ) ? pll_current_language() : substr( get_locale(), 0, 2 );
    if ( $locale === 'en' ) return 'en';
    if ( $locale === 'it' ) return 'it';
    return 'de';
}

function jfo_t( $de, $en, $it = null ) {
    $lang = jfo_lang();
    if ( $lang === 'en' ) return $en;
    if ( $lang === 'it' ) return $it ?? $de;
    return $de;
}

function jfo_contact_form_shortcode() {
    $sent  = false;
    $error = '';

    if ( isset( $_POST['jfo_contact_submit'] ) ) {
        if ( ! isset( $_POST['jfo_nonce'] ) || ! wp_verify_nonce( $_POST['jfo_nonce'], 'jfo_contact_form' ) ) {
            $error = jfo_t( 'Ungültige Anfrage. Bitte Seite neu laden und erneut versuchen.', 'Invalid request. Please reload the page and try again.', 'Richiesta non valida. Ricaricare la pagina e riprovare.' );
        } elseif ( ! empty( $_POST['jfo_website'] ) ) {
            // Honeypot triggered — silently pretend success
            $sent = true;
        } else {
            $name    = sanitize_text_field( $_POST['jfo_name']    ?? '' );
            $email   = sanitize_email( $_POST['jfo_email']        ?? '' );
            $message = sanitize_textarea_field( $_POST['jfo_message'] ?? '' );

            if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
                $error = jfo_t( 'Bitte alle Felder ausfüllen.', 'Please fill in all fields.', 'Si prega di compilare tutti i campi.' );
            } elseif ( ! is_email( $email ) ) {
                $error = jfo_t( 'Bitte eine gültige E-Mail-Adresse eingeben.', 'Please enter a valid email address.', 'Si prega di inserire un indirizzo email valido.' );
            } else {
                $to      = 'janfoshag@gmx.de';
                $subject = jfo_t( 'Kontaktanfrage von ', 'Contact request from ', 'Richiesta di contatto da ' ) . $name;
                $body    = "Name: {$name}\nE-Mail: {$email}\n\n" . jfo_t( 'Nachricht', 'Message', 'Messaggio' ) . ":\n{$message}";
                $headers = [
                    'Content-Type: text/plain; charset=UTF-8',
                    'Reply-To: ' . $name . ' <' . $email . '>',
                ];

                if ( wp_mail( $to, $subject, $body, $headers ) ) {
                    $sent = true;
                } else {
                    $error = jfo_t(
                        'Die Nachricht konnte leider nicht gesendet werden. Bitte kontaktieren Sie mich direkt per E-Mail.',
                        'Unfortunately the message could not be sent. Please contact me directly by email.',
                        'Purtroppo il messaggio non ha potuto essere inviato. La prego di contattarmi direttamente per email.'
                    );
                }
            }
        }
    }

    ob_start();

    if ( $sent ) : ?>
        <p style="color:#0137d2; font-family:'Josefin Sans',sans-serif; font-size:1rem;">
            <?php echo esc_html( jfo_t(
                'Vielen Dank! Ihre Nachricht wurde gesendet. Ich melde mich so bald wie möglich bei Ihnen.',
                'Thank you! Your message has been sent. I will get back to you as soon as possible.',
                'Grazie! Il suo messaggio è stato inviato. La contatterò al più presto.'
            ) ); ?>
        </p>
    <?php else : ?>

        <?php if ( $error ) : ?>
            <p style="color:#c0392b; font-family:'Josefin Sans',sans-serif; font-size:0.95rem;">
                <?php echo esc_html( $error ); ?>
            </p>
        <?php endif; ?>

        <form method="post" style="max-width:520px;">
            <?php wp_nonce_field( 'jfo_contact_form', 'jfo_nonce' ); ?>

            <!-- Honeypot: hidden from real users, filled by bots -->
            <p style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
                <label for="jfo_website">Website</label>
                <input type="text" id="jfo_website" name="jfo_website" value="" tabindex="-1" autocomplete="off">
            </p>

            <p style="margin-bottom:16px;">
                <label for="jfo_name" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;"><?php echo esc_html( jfo_t( 'Name', 'Name', 'Nome' ) ); ?></label>
                <input
                    type="text"
                    id="jfo_name"
                    name="jfo_name"
                    value="<?php echo esc_attr( $_POST['jfo_name'] ?? '' ); ?>"
                    required
                    style="width:100%; padding:10px 14px; border:1px solid #d0d0d0; border-radius:6px; font-family:'Josefin Sans',sans-serif; font-size:1rem; box-sizing:border-box;"
                >
            </p>

            <p style="margin-bottom:16px;">
                <label for="jfo_email" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;"><?php echo esc_html( jfo_t( 'E-Mail', 'Email', 'Email' ) ); ?></label>
                <input
                    type="email"
                    id="jfo_email"
                    name="jfo_email"
                    value="<?php echo esc_attr( $_POST['jfo_email'] ?? '' ); ?>"
                    required
                    style="width:100%; padding:10px 14px; border:1px solid #d0d0d0; border-radius:6px; font-family:'Josefin Sans',sans-serif; font-size:1rem; box-sizing:border-box;"
                >
            </p>

            <p style="margin-bottom:24px;">
                <label for="jfo_message" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;"><?php echo esc_html( jfo_t( 'Nachricht', 'Message', 'Messaggio' ) ); ?></label>
                <textarea
                    id="jfo_message"
                    name="jfo_message"
                    rows="6"
                    required
                    style="width:100%; padding:10px 14px; border:1px solid #d0d0d0; border-radius:6px; font-family:'Josefin Sans',sans-serif; font-size:1rem; box-sizing:border-box; resize:vertical;"
                ><?php echo esc_textarea( $_POST['jfo_message'] ?? '' ); ?></textarea>
            </p>

            <p>
                <button
                    type="submit"
                    name="jfo_contact_submit"
                    style="background-color:#0137d2; color:#ffffff; border:none; border-radius:100px; padding:16px 30px; font-family:'Josefin Sans',sans-serif; font-size:1rem; cursor:pointer; letter-spacing:0.03em;"
                    onmouseover="this.style.backgroundColor='#0129a8'"
                    onmouseout="this.style.backgroundColor='#0137d2'"
                >
                    <?php echo esc_html( jfo_t( 'Nachricht senden', 'Send message', 'Invia messaggio' ) ); ?>
                </button>
            </p>
        </form>

    <?php endif;

    return ob_get_clean();
}
add_shortcode( 'jfo_contact_form', 'jfo_contact_form_shortcode' );

function jfo_seo() {
    $lang = jfo_lang();
    if ( $lang === 'en' ) {
        $description = 'Apps with AI and voice control, AI agents and voice assistants, including Apple Intelligence and Mistral. For hospitality, logistics and wholesale. Based in Munich.';
        $keywords    = 'AI apps, voice control, mobile AI, voice AI, AI agents, voice assistant, Apple Intelligence, iOS app development, Android app development, React Native, cross-platform, Mistral, software developer Munich, Jan Foshag';
        $title       = 'AI Apps with Voice Control & AI Agents | Jan Foshag Munich';
    } elseif ( $lang === 'it' ) {
        $description = 'App con IA e comando vocale, agenti IA e assistenti vocali, anche con Apple Intelligence e Mistral. Per ristorazione, logistica e commercio all’ingrosso. Da Monaco di Baviera.';
        $keywords    = 'app con IA, comando vocale, agenti IA, assistente vocale, Apple Intelligence, sviluppo app iOS, sviluppo app Android, React Native, multipiattaforma, Mistral, IA ristorazione, sviluppatore software Monaco, Jan Foshag';
        $title       = 'App con IA e comando vocale, agenti IA | Jan Foshag Monaco';
    } elseif ( is_page( 'ueber-mich' ) ) {
        $description = 'Jan Foshag, Software-Entwickler aus München: Werdegang und Projekte – von Java über Apps für iOS und Android mit React Native bis zu KI-Agenten mit Mistral und Anthropic. 20+ Jahre Erfahrung.';
        $keywords    = 'Jan Foshag, Software-Entwickler München, Freelancer, Werdegang, Projekte, iOS, Android, React Native, Cross-Platform, Flutter, KI-Agenten, Mistral, Anthropic';
        $title       = 'Über mich – Jan Foshag, Software-Entwickler München';
    } else {
        $description = 'Apps mit KI und Sprachsteuerung, KI-Agenten und Sprachassistenten, auch mit Apple Intelligence und Mistral. Für Gastronomie, Logistik und Großhandel. Aus München.';
        $keywords    = 'KI-App, App mit KI, Sprachsteuerung, App Entwicklung KI, KI-Agenten, Agentic AI, KI-Sprachassistent, KI Telefonassistent, Apple Intelligence, iOS App Entwicklung, Android App Entwicklung, React Native, Cross-Platform, Mistral, europäische KI, DSGVO KI, KI Gastronomie, KI Logistik, Bestell-App Großhandel, Software Fruchthandel, Software-Entwickler München, Jan Foshag';
        $title       = 'KI-Apps mit Sprachsteuerung & KI-Agenten | Jan Foshag München';
    }
    return compact( 'description', 'keywords', 'title' );
}

function jfo_meta_tags() {
    extract( jfo_seo() );
    $url   = is_singular() && ! is_front_page() ? get_permalink() : home_url( '/' );
    $image = 'https://janfoshag.de/wp-content/uploads/2026/10/apple-intelligence.jpg';
    if ( is_front_page() ) {
        jfo_structured_data( $description, $url, $image );
    }
    ?>
<meta name="description" content="<?php echo esc_attr( $description ); ?>">
<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>">
<meta name="author" content="Jan Foshag">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_attr( $url ); ?>">
<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <?php
}
add_action( 'wp_head', 'jfo_meta_tags' );

// Strukturierte Daten (JSON-LD), damit Google die Seite als Dienstleister in München erkennt
function jfo_structured_data( $description, $url, $image ) {
    $data = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'ProfessionalService',
        'name'        => 'Jan Foshag – Software-Entwicklung',
        'description' => $description,
        'url'         => $url,
        'image'       => $image,
        'email'       => 'info@janfoshag.de',
        'telephone'   => '+49 89 45439111',
        'address'     => array( '@type' => 'PostalAddress', 'addressLocality' => 'München', 'addressCountry' => 'DE' ),
        'areaServed'  => 'DE',
        'founder'     => array( '@type' => 'Person', 'name' => 'Jan Foshag', 'jobTitle' => jfo_t( 'Software-Entwickler', 'Software Developer', 'Sviluppatore software' ) ),
        'knowsAbout'  => array( 'Mobile AI', 'Voice AI', 'Apple Intelligence', 'iOS', 'Android', 'React Native', 'AI Agents', 'Voice Assistants', 'Mistral', 'Anthropic' ),
        'sameAs'      => array( 'https://www.linkedin.com/in/jan-foshag-01b39338/', 'https://www.xing.com/profile/Jan_Foshag' ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . "</script>\n";
}

// Browser-Tab-Titel = SEO-Titel, nur Startseiten und Über mich (Impressum etc. behalten den WP-Titel)
function jfo_document_title( $title ) {
    if ( is_front_page() || is_page( 'ueber-mich' ) ) {
        return jfo_seo()['title'];
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'jfo_document_title' );
