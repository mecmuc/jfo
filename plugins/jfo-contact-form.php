<?php
/**
 * Plugin Name: JFO Contact Form
 * Description: Kontaktformular für janfoshag.de — Shortcode: [jfo_contact_form]
 * Version: 1.0
 * Author: Jan Foshag
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function jfo_contact_form_shortcode() {
    $sent  = false;
    $error = '';

    if ( isset( $_POST['jfo_contact_submit'] ) ) {
        if ( ! isset( $_POST['jfo_nonce'] ) || ! wp_verify_nonce( $_POST['jfo_nonce'], 'jfo_contact_form' ) ) {
            $error = 'Ungültige Anfrage. Bitte Seite neu laden und erneut versuchen.';
        } else {
            $name    = sanitize_text_field( $_POST['jfo_name']    ?? '' );
            $email   = sanitize_email( $_POST['jfo_email']        ?? '' );
            $message = sanitize_textarea_field( $_POST['jfo_message'] ?? '' );

            if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
                $error = 'Bitte alle Felder ausfüllen.';
            } elseif ( ! is_email( $email ) ) {
                $error = 'Bitte eine gültige E-Mail-Adresse eingeben.';
            } else {
                $to      = 'janfoshag@gmx.de';
                $subject = 'Kontaktanfrage von ' . $name;
                $body    = "Name: {$name}\nE-Mail: {$email}\n\nNachricht:\n{$message}";
                $headers = [
                    'Content-Type: text/plain; charset=UTF-8',
                    'Reply-To: ' . $name . ' <' . $email . '>',
                ];

                if ( wp_mail( $to, $subject, $body, $headers ) ) {
                    $sent = true;
                } else {
                    $error = 'Die Nachricht konnte leider nicht gesendet werden. Bitte kontaktieren Sie mich direkt per E-Mail.';
                }
            }
        }
    }

    ob_start();

    if ( $sent ) : ?>
        <p style="color:#0137d2; font-family:'Josefin Sans',sans-serif; font-size:1rem;">
            Vielen Dank! Ihre Nachricht wurde gesendet. Ich melde mich so bald wie möglich bei Ihnen.
        </p>
    <?php else : ?>

        <?php if ( $error ) : ?>
            <p style="color:#c0392b; font-family:'Josefin Sans',sans-serif; font-size:0.95rem;">
                <?php echo esc_html( $error ); ?>
            </p>
        <?php endif; ?>

        <form method="post" style="max-width:520px;">
            <?php wp_nonce_field( 'jfo_contact_form', 'jfo_nonce' ); ?>

            <p style="margin-bottom:16px;">
                <label for="jfo_name" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;">Name</label>
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
                <label for="jfo_email" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;">E-Mail</label>
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
                <label for="jfo_message" style="display:block; font-family:'Josefin Sans',sans-serif; font-size:0.95rem; margin-bottom:6px;">Nachricht</label>
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
                    Nachricht senden
                </button>
            </p>
        </form>

    <?php endif;

    return ob_get_clean();
}
add_shortcode( 'jfo_contact_form', 'jfo_contact_form_shortcode' );

function jfo_meta_tags() {
    $description = 'Jan Foshag – Selbständiger Software-Entwickler aus München. Spezialisiert auf Mobile Apps (React Native, Flutter), Web-Entwicklung und KI-Lösungen. Über 20 Jahre Erfahrung.';
    $keywords    = 'Software-Entwickler München, Freelancer Software, React Native, Flutter, Mobile App Entwicklung, Web-Entwicklung, KI, Künstliche Intelligenz, Jan Foshag';
    $url = 'https://janfoshag.de/';
    ?>
<meta name="description" content="<?php echo esc_attr( $description ); ?>">
<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>">
<meta name="author" content="Jan Foshag">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_attr( $url ); ?>">
<meta property="og:title" content="Jan Foshag – Software-Entwickler München">
<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Jan Foshag – Software-Entwickler München">
<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <?php
}
add_action( 'wp_head', 'jfo_meta_tags' );
