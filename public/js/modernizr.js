/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-atobbtoa-cssall-flexbox-mediaqueries-rgba-svg-svgfilters-setclasses-shiv !*/
! function(e, t, n) {
    function r(e, t) {
        return typeof e === t
    }

    function o() {
        var e, t, n, o, a, i, s;
        for (var l in E)
            if (E.hasOwnProperty(l)) {
                if (e = [], t = E[l], t.name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length))
                    for (n = 0; n < t.options.aliases.length; n++) e.push(t.options.aliases[n].toLowerCase());
                for (o = r(t.fn, "function") ? t.fn() : t.fn, a = 0; a < e.length; a++) i = e[a], s = i.split("."), 1 === s.length ? Modernizr[s[0]] = o : (!Modernizr[s[0]] || Modernizr[s[0]] instanceof Boolean || (Modernizr[s[0]] = new Boolean(Modernizr[s[0]])), Modernizr[s[0]][s[1]] = o), y.push((o ? "" : "no-") + s.join("-"))
            }
    }

    function a(e) {
        var t = C.className,
            n = Modernizr._config.classPrefix || "";
        if (S && (t = t.baseVal), Modernizr._config.enableJSClass) {
            var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
            t = t.replace(r, "$1" + n + "js$2")
        }
        Modernizr._config.enableClasses && (t += " " + n + e.join(" " + n), S ? C.className.baseVal = t : C.className = t)
    }

    function i() {
        return "function" != typeof t.createElement ? t.createElement(arguments[0]) : S ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments)
    }

    function s() {
        var e = t.body;
        return e || (e = i(S ? "svg" : "body"), e.fake = !0), e
    }

    function l(e, n, r, o) {
        var a, l, c, u, f = "modernizr",
            d = i("div"),
            m = s();
        if (parseInt(r, 10))
            for (; r--;) c = i("div"), c.id = o ? o[r] : f + (r + 1), d.appendChild(c);
        return a = i("style"), a.type = "text/css", a.id = "s" + f, (m.fake ? m : d).appendChild(a), m.appendChild(d), a.styleSheet ? a.styleSheet.cssText = e : a.appendChild(t.createTextNode(e)), d.id = f, m.fake && (m.style.background = "", m.style.overflow = "hidden", u = C.style.overflow, C.style.overflow = "hidden", C.appendChild(m)), l = n(d, e), m.fake ? (m.parentNode.removeChild(m), C.style.overflow = u, C.offsetHeight) : d.parentNode.removeChild(d), !!l
    }

    function c(e, t) {
        return !!~("" + e).indexOf(t)
    }

    function u(e) {
        return e.replace(/([a-z])-([a-z])/g, function(e, t, n) {
            return t + n.toUpperCase()
        }).replace(/^-/, "")
    }

    function f(e, t) {
        return function() {
            return e.apply(t, arguments)
        }
    }

    function d(e, t, n) {
        var o;
        for (var a in e)
            if (e[a] in t) return n === !1 ? e[a] : (o = t[e[a]], r(o, "function") ? f(o, n || t) : o);
        return !1
    }

    function m(e) {
        return e.replace(/([A-Z])/g, function(e, t) {
            return "-" + t.toLowerCase()
        }).replace(/^ms-/, "-ms-")
    }

    function p(t, r) {
        var o = t.length;
        if ("CSS" in e && "supports" in e.CSS) {
            for (; o--;)
                if (e.CSS.supports(m(t[o]), r)) return !0;
            return !1
        }
        if ("CSSSupportsRule" in e) {
            for (var a = []; o--;) a.push("(" + m(t[o]) + ":" + r + ")");
            return a = a.join(" or "), l("@supports (" + a + ") { #modernizr { position: absolute; } }", function(e) {
                return "absolute" == getComputedStyle(e, null).position
            })
        }
        return n
    }

    function h(e, t, o, a) {
        function s() {
            f && (delete F.style, delete F.modElem)
        }
        if (a = r(a, "undefined") ? !1 : a, !r(o, "undefined")) {
            var l = p(e, o);
            if (!r(l, "undefined")) return l
        }
        for (var f, d, m, h, g, v = ["modernizr", "tspan", "samp"]; !F.style && v.length;) f = !0, F.modElem = i(v.shift()), F.style = F.modElem.style;
        for (m = e.length, d = 0; m > d; d++)
            if (h = e[d], g = F.style[h], c(h, "-") && (h = u(h)), F.style[h] !== n) {
                if (a || r(o, "undefined")) return s(), "pfx" == t ? h : !0;
                try {
                    F.style[h] = o
                } catch (y) {}
                if (F.style[h] != g) return s(), "pfx" == t ? h : !0
            }
        return s(), !1
    }

    function g(e, t, n, o, a) {
        var i = e.charAt(0).toUpperCase() + e.slice(1),
            s = (e + " " + T.join(i + " ") + i).split(" ");
        return r(t, "string") || r(t, "undefined") ? h(s, t, o, a) : (s = (e + " " + _.join(i + " ") + i).split(" "), d(s, t, n))
    }

    function v(e, t, r) {
        return g(e, n, n, t, r)
    }
    var y = [],
        E = [],
        b = {
            _version: "3.3.1",
            _config: {
                classPrefix: "",
                enableClasses: !0,
                enableJSClass: !0,
                usePrefixes: !0
            },
            _q: [],
            on: function(e, t) {
                var n = this;
                setTimeout(function() {
                    t(n[e])
                }, 0)
            },
            addTest: function(e, t, n) {
                E.push({
                    name: e,
                    fn: t,
                    options: n
                })
            },
            addAsyncTest: function(e) {
                E.push({
                    name: null,
                    fn: e
                })
            }
        },
        Modernizr = function() {};
    Modernizr.prototype = b, Modernizr = new Modernizr, Modernizr.addTest("svg", !!t.createElementNS && !!t.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect), Modernizr.addTest("svgfilters", function() {
        var t = !1;
        try {
            t = "SVGFEColorMatrixElement" in e && 2 == SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE
        } catch (n) {}
        return t
    });
    var C = t.documentElement;
    Modernizr.addTest("cssall", "all" in C.style);
    var S = "svg" === C.nodeName.toLowerCase();
    S || ! function(e, t) {
        function n(e, t) {
            var n = e.createElement("p"),
                r = e.getElementsByTagName("head")[0] || e.documentElement;
            return n.innerHTML = "x<style>" + t + "</style>", r.insertBefore(n.lastChild, r.firstChild)
        }

        function r() {
            var e = E.elements;
            return "string" == typeof e ? e.split(" ") : e
        }

        function o(e, t) {
            var n = E.elements;
            "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), E.elements = n + " " + e, c(t)
        }

        function a(e) {
            var t = y[e[g]];
            return t || (t = {}, v++, e[g] = v, y[v] = t), t
        }

        function i(e, n, r) {
            if (n || (n = t), f) return n.createElement(e);
            r || (r = a(n));
            var o;
            return o = r.cache[e] ? r.cache[e].cloneNode() : h.test(e) ? (r.cache[e] = r.createElem(e)).cloneNode() : r.createElem(e), !o.canHaveChildren || p.test(e) || o.tagUrn ? o : r.frag.appendChild(o)
        }

        function s(e, n) {
            if (e || (e = t), f) return e.createDocumentFragment();
            n = n || a(e);
            for (var o = n.frag.cloneNode(), i = 0, s = r(), l = s.length; l > i; i++) o.createElement(s[i]);
            return o
        }

        function l(e, t) {
            t.cache || (t.cache = {}, t.createElem = e.createElement, t.createFrag = e.createDocumentFragment, t.frag = t.createFrag()), e.createElement = function(n) {
                return E.shivMethods ? i(n, e, t) : t.createElem(n)
            }, e.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + r().join().replace(/[\w\-:]+/g, function(e) {
                return t.createElem(e), t.frag.createElement(e), 'c("' + e + '")'
            }) + ");return n}")(E, t.frag)
        }

        function c(e) {
            e || (e = t);
            var r = a(e);
            return !E.shivCSS || u || r.hasCSS || (r.hasCSS = !!n(e, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), f || l(e, r), e
        }
        var u, f, d = "3.7.3",
            m = e.html5 || {},
            p = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
            h = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
            g = "_html5shiv",
            v = 0,
            y = {};
        ! function() {
            try {
                var e = t.createElement("a");
                e.innerHTML = "<xyz></xyz>", u = "hidden" in e, f = 1 == e.childNodes.length || function() {
                    t.createElement("a");
                    var e = t.createDocumentFragment();
                    return "undefined" == typeof e.cloneNode || "undefined" == typeof e.createDocumentFragment || "undefined" == typeof e.createElement
                }()
            } catch (n) {
                u = !0, f = !0
            }
        }();
        var E = {
            elements: m.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
            version: d,
            shivCSS: m.shivCSS !== !1,
            supportsUnknownElements: f,
            shivMethods: m.shivMethods !== !1,
            type: "default",
            shivDocument: c,
            createElement: i,
            createDocumentFragment: s,
            addElements: o
        };
        e.html5 = E, c(t), "object" == typeof module && module.exports && (module.exports = E)
    }("undefined" != typeof e ? e : this, t), Modernizr.addTest("rgba", function() {
        var e = i("a").style;
        return e.cssText = "background-color:rgba(150,255,150,.5)", ("" + e.backgroundColor).indexOf("rgba") > -1
    }), Modernizr.addTest("atobbtoa", "atob" in e && "btoa" in e, {
        aliases: ["atob-btoa"]
    });
    var x = function() {
        var t = e.matchMedia || e.msMatchMedia;
        return t ? function(e) {
            var n = t(e);
            return n && n.matches || !1
        } : function(t) {
            var n = !1;
            return l("@media " + t + " { #modernizr { position: absolute; } }", function(t) {
                n = "absolute" == (e.getComputedStyle ? e.getComputedStyle(t, null) : t.currentStyle).position
            }), n
        }
    }();
    b.mq = x, Modernizr.addTest("mediaqueries", x("only all"));
    var w = "Moz O ms Webkit",
        T = b._config.usePrefixes ? w.split(" ") : [];
    b._cssomPrefixes = T;
    var _ = b._config.usePrefixes ? w.toLowerCase().split(" ") : [];
    b._domPrefixes = _;
    var N = {
        elem: i("modernizr")
    };
    Modernizr._q.push(function() {
        delete N.elem
    });
    var F = {
        style: N.elem.style
    };
    Modernizr._q.unshift(function() {
        delete F.style
    }), b.testAllProps = g, b.testAllProps = v, Modernizr.addTest("flexbox", v("flexBasis", "1px", !0)), o(), a(y), delete b.addTest, delete b.addAsyncTest;
    for (var M = 0; M < Modernizr._q.length; M++) Modernizr._q[M]();
    e.Modernizr = Modernizr
}(window, document);