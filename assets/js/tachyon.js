/* tachyon 2.0.1 */
    var e = document.body.dataset;
    const o = "tachyonWhitelist" in e, n = "tachyonSameOrigin" in e, a = e.tachyonTimer || 50;
    let r = null;

    function i() {
      r = r ? null : this;
      const t = "tachyon";
      var e = document.getElementById(t);
      e ? e.remove() : setTimeout(() => {
        var e;
        r === this && ((e = document.createElement("link")).id = t, e.href = this.href, e.rel = "prerender", document.head.appendChild(e))
      }, a)
    }

    function t(t) {
      var e;
      t.dataset && (e = "tachyon" in t.dataset, "A" !== t.tagName || !t.href || e != o && !n || n && !e && t.origin !== window.location.origin || ["mouseover", "mouseout", "touchstart", "touchend"].forEach(e => t.addEventListener(e, i, {passive: !0})))
    }

    new MutationObserver(e => e.forEach(e => e.addedNodes.forEach(t))).observe(document.body, {
      childList: !0,
      subtree: !0
    }), document.querySelectorAll("a").forEach(t);
