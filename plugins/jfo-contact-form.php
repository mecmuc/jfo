<?php
/**
 * Plugin Name: JFO Contact Form
 * Description: Kontaktformular für janfoshag.de — Shortcode: [jfo_contact_form]
 * Version: 1.2
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

function jfo_meta_tags() {
    $lang = jfo_lang();
    if ( $lang === 'en' ) {
        $description = 'Jan Foshag – Freelance software developer based in Munich. Specialising in mobile apps (React Native, Flutter), web development and AI solutions. Over 20 years of experience.';
        $keywords    = 'software developer Munich, freelance software, React Native, Flutter, mobile app development, web development, AI, artificial intelligence, Jan Foshag';
        $title       = 'Jan Foshag – Software Developer Munich';
    } elseif ( $lang === 'it' ) {
        $description = 'Jan Foshag – Sviluppatore software freelance con sede a Monaco di Baviera. Specializzato in app mobile (React Native, Flutter), sviluppo web e soluzioni AI. Oltre 20 anni di esperienza.';
        $keywords    = 'sviluppatore software Monaco, freelance software, React Native, Flutter, sviluppo app mobile, sviluppo web, AI, intelligenza artificiale, Jan Foshag';
        $title       = 'Jan Foshag – Sviluppatore Software Monaco';
    } else {
        $description = 'Jan Foshag – Selbständiger Software-Entwickler aus München. Spezialisiert auf Mobile Apps (React Native, Flutter), Web-Entwicklung und KI-Lösungen. Über 20 Jahre Erfahrung.';
        $keywords    = 'Software-Entwickler München, Freelancer Software, React Native, Flutter, Mobile App Entwicklung, Web-Entwicklung, KI, Künstliche Intelligenz, Jan Foshag';
        $title       = 'Jan Foshag – Software-Entwickler München';
    }
    $url = 'https://janfoshag.de/';
    ?>
<meta name="description" content="<?php echo esc_attr( $description ); ?>">
<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>">
<meta name="author" content="Jan Foshag">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_attr( $url ); ?>">
<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <?php
}
add_action( 'wp_head', 'jfo_meta_tags' );
