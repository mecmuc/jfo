/**
 * janfoshag.de – Dark mode toggle
 * Sets html[data-theme="dark"|"light"] and persists choice in localStorage.
 * Default is dark when no preference is saved (set early by the inline
 * <head> script in mu-plugins/jfo-enqueue.php; repeated here as fallback).
 */
(function () {
  var STORAGE_KEY = 'jfo-theme';
  var html = document.documentElement;

  /* ── Apply saved preference, otherwise dark ── */
  var saved = null;
  try { saved = localStorage.getItem(STORAGE_KEY); } catch (e) {}
  html.setAttribute('data-theme', saved || 'dark');

  /* ── SVG icons ── */
  var ICON_MOON = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"/></svg>';
  var ICON_SUN  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="12" y1="21" x2="12" y2="23" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="1" y1="12" x2="3" y2="12" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="21" y1="12" x2="23" y2="12" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>';

  function isDarkActive() {
    var current = html.getAttribute('data-theme');
    if (current === 'dark')  return true;
    if (current === 'light') return false;
    return window.matchMedia('(prefers-color-scheme: dark)').matches;
  }

  function updateButton(btn) {
    var dark = isDarkActive();
    btn.innerHTML = dark ? ICON_SUN : ICON_MOON;
    btn.setAttribute('aria-label', dark ? 'Switch to light mode' : 'Switch to dark mode');
    btn.title = dark ? 'Switch to light mode' : 'Switch to dark mode';
  }

  document.addEventListener('DOMContentLoaded', function () {
    var btn = document.createElement('button');
    btn.id = 'jfo-theme-toggle';
    updateButton(btn);
    document.body.appendChild(btn);

    btn.addEventListener('click', function () {
      var next = isDarkActive() ? 'light' : 'dark';
      html.setAttribute('data-theme', next);
      try { localStorage.setItem(STORAGE_KEY, next); } catch (e) {}
      updateButton(btn);
    });
  });
})();
