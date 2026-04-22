# Custom CSS — janfoshag.de

Einzufügen unter **WP Admin → Design → Customizer → Zusätzliches CSS**

---

## Seitentitel-Abstand entfernen

Entfernt den oberen Padding-Abstand über dem Elementor-Inhalt, wenn der Seitentitel ausgeblendet ist (betrifft alle Seiten inkl. englische Version):

```css
.ast-separate-container .ast-article-post,
.ast-separate-container .ast-article-single {
  padding-top: 0 !important;
}
```

---

## Inhaltsbreite begrenzen und zentrieren

Begrenzt alle Elementor-Inhalte (Text, Akkordeon, Slideshow etc.) auf 680px und zentriert sie:

```css
.elementor-section-boxed > .elementor-container,
.e-con-inner {
  max-width: 680px !important;
  margin-left: auto !important;
  margin-right: auto !important;
}
```

---

## Englische Seite — linker Innenabstand (page-id-2595)

Die englische Seite hat die Body-Klasse `page-id-2595`. Elementor verwendet hier einen `e-con-boxed`-Container, dessen innerer Wrapper `e-con-inner` keinen Abstand hat.

```css
body.page-id-2595 .e-con-inner {
  padding-left: 40px !important;
  padding-right: 40px !important;
}
```
