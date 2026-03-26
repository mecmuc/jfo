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
