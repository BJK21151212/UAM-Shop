!(function () {
    "use strict";
    if ("object" == typeof window)
        if ("IntersectionObserver" in window && "IntersectionObserverEntry" in window && "intersectionRatio" in window.IntersectionObserverEntry.prototype)
            "isIntersecting" in window.IntersectionObserverEntry.prototype ||
                Object.defineProperty(window.IntersectionObserverEntry.prototype, "isIntersecting", {
                    get: function () {
                        return this.intersectionRatio > 0;
                    },
                });
        else {
            var t = (function (t) {
                    for (var e = window.document, i = o(e); i; ) i = o((e = i.ownerDocument));
                    return e;
                })(),
                e = [],
                i = null,
                n = null;
            (a.prototype.THROTTLE_TIMEOUT = 100),
                (a.prototype.POLL_INTERVAL = null),
                (a.prototype.USE_MUTATION_OBSERVER = !0),
                (a._setupCrossOriginUpdater = function () {
                    return (
                        i ||
                            (i = function (t, i) {
                                (n = t && i ? u(t, i) : { top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0 }),
                                    e.forEach(function (t) {
                                        t._checkForIntersections();
                                    });
                            }),
                        i
                    );
                }),
                (a._resetCrossOriginUpdater = function () {
                    (i = null), (n = null);
                }),
                (a.prototype.observe = function (t) {
                    if (
                        !this._observationTargets.some(function (e) {
                            return e.element == t;
                        })
                    ) {
                        if (!t || 1 != t.nodeType) throw new Error("target must be an Element");
                        this._registerInstance(), this._observationTargets.push({ element: t, entry: null }), this._monitorIntersections(t.ownerDocument), this._checkForIntersections();
                    }
                }),
                (a.prototype.unobserve = function (t) {
                    (this._observationTargets = this._observationTargets.filter(function (e) {
                        return e.element != t;
                    })),
                        this._unmonitorIntersections(t.ownerDocument),
                        0 == this._observationTargets.length && this._unregisterInstance();
                }),
                (a.prototype.disconnect = function () {
                    (this._observationTargets = []), this._unmonitorAllIntersections(), this._unregisterInstance();
                }),
                (a.prototype.takeRecords = function () {
                    var t = this._queuedEntries.slice();
                    return (this._queuedEntries = []), t;
                }),
                (a.prototype._initThresholds = function (t) {
                    var e = t || [0];
                    return (
                        Array.isArray(e) || (e = [e]),
                        e.sort().filter(function (t, e, i) {
                            if ("number" != typeof t || isNaN(t) || t < 0 || t > 1) throw new Error("threshold must be a number between 0 and 1 inclusively");
                            return t !== i[e - 1];
                        })
                    );
                }),
                (a.prototype._parseRootMargin = function (t) {
                    var e = (t || "0px").split(/\s+/).map(function (t) {
                        var e = /^(-?\d*\.?\d+)(px|%)$/.exec(t);
                        if (!e) throw new Error("rootMargin must be specified in pixels or percent");
                        return { value: parseFloat(e[1]), unit: e[2] };
                    });
                    return (e[1] = e[1] || e[0]), (e[2] = e[2] || e[0]), (e[3] = e[3] || e[1]), e;
                }),
                (a.prototype._monitorIntersections = function (e) {
                    var i = e.defaultView;
                    if (i && -1 == this._monitoringDocuments.indexOf(e)) {
                        var n = this._checkForIntersections,
                            s = null,
                            a = null;
                        this.POLL_INTERVAL
                            ? (s = i.setInterval(n, this.POLL_INTERVAL))
                            : (r(i, "resize", n, !0),
                              r(e, "scroll", n, !0),
                              this.USE_MUTATION_OBSERVER && "MutationObserver" in i && (a = new i.MutationObserver(n)).observe(e, { attributes: !0, childList: !0, characterData: !0, subtree: !0 })),
                            this._monitoringDocuments.push(e),
                            this._monitoringUnsubscribes.push(function () {
                                var t = e.defaultView;
                                t && (s && t.clearInterval(s), l(t, "resize", n, !0)), l(e, "scroll", n, !0), a && a.disconnect();
                            });
                        var c = (this.root && (this.root.ownerDocument || this.root)) || t;
                        if (e != c) {
                            var d = o(e);
                            d && this._monitorIntersections(d.ownerDocument);
                        }
                    }
                }),
                (a.prototype._unmonitorIntersections = function (e) {
                    var i = this._monitoringDocuments.indexOf(e);
                    if (-1 != i) {
                        var n = (this.root && (this.root.ownerDocument || this.root)) || t;
                        if (
                            !this._observationTargets.some(function (t) {
                                var i = t.element.ownerDocument;
                                if (i == e) return !0;
                                for (; i && i != n; ) {
                                    var s = o(i);
                                    if ((i = s && s.ownerDocument) == e) return !0;
                                }
                                return !1;
                            })
                        ) {
                            var s = this._monitoringUnsubscribes[i];
                            if ((this._monitoringDocuments.splice(i, 1), this._monitoringUnsubscribes.splice(i, 1), s(), e != n)) {
                                var a = o(e);
                                a && this._unmonitorIntersections(a.ownerDocument);
                            }
                        }
                    }
                }),
                (a.prototype._unmonitorAllIntersections = function () {
                    var t = this._monitoringUnsubscribes.slice(0);
                    (this._monitoringDocuments.length = 0), (this._monitoringUnsubscribes.length = 0);
                    for (var e = 0; e < t.length; e++) t[e]();
                }),
                (a.prototype._checkForIntersections = function () {
                    if (this.root || !i || n) {
                        var t = this._rootIsInDom(),
                            e = t ? this._getRootRect() : { top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0 };
                        this._observationTargets.forEach(function (n) {
                            var o = n.element,
                                a = c(o),
                                r = this._rootContainsTarget(o),
                                l = n.entry,
                                d = t && r && this._computeTargetAndRootIntersection(o, a, e),
                                u = null;
                            this._rootContainsTarget(o) ? (i && !this.root) || (u = e) : (u = { top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0 });
                            var p = (n.entry = new s({ time: window.performance && performance.now && performance.now(), target: o, boundingClientRect: a, rootBounds: u, intersectionRect: d }));
                            l ? (t && r ? this._hasCrossedThreshold(l, p) && this._queuedEntries.push(p) : l && l.isIntersecting && this._queuedEntries.push(p)) : this._queuedEntries.push(p);
                        }, this),
                            this._queuedEntries.length && this._callback(this.takeRecords(), this);
                    }
                }),
                (a.prototype._computeTargetAndRootIntersection = function (e, o, s) {
                    if ("none" != window.getComputedStyle(e).display) {
                        for (var a, r, l, d, p, f, m, g, v = o, b = h(e), w = !1; !w && b; ) {
                            var y = null,
                                C = 1 == b.nodeType ? window.getComputedStyle(b) : {};
                            if ("none" == C.display) return null;
                            if (b == this.root || 9 == b.nodeType)
                                if (((w = !0), b == this.root || b == t)) i && !this.root ? (!n || (0 == n.width && 0 == n.height) ? ((b = null), (y = null), (v = null)) : (y = n)) : (y = s);
                                else {
                                    var x = h(b),
                                        k = x && c(x),
                                        T = x && this._computeTargetAndRootIntersection(x, k, s);
                                    k && T ? ((b = x), (y = u(k, T))) : ((b = null), (v = null));
                                }
                            else {
                                var $ = b.ownerDocument;
                                b != $.body && b != $.documentElement && "visible" != C.overflow && (y = c(b));
                            }
                            if (
                                (y &&
                                    ((a = y),
                                    (r = v),
                                    void 0,
                                    void 0,
                                    void 0,
                                    void 0,
                                    void 0,
                                    void 0,
                                    (l = Math.max(a.top, r.top)),
                                    (d = Math.min(a.bottom, r.bottom)),
                                    (p = Math.max(a.left, r.left)),
                                    (g = d - l),
                                    (v = ((m = (f = Math.min(a.right, r.right)) - p) >= 0 && g >= 0 && { top: l, bottom: d, left: p, right: f, width: m, height: g }) || null)),
                                !v)
                            )
                                break;
                            b = b && h(b);
                        }
                        return v;
                    }
                }),
                (a.prototype._getRootRect = function () {
                    var e;
                    if (this.root && !f(this.root)) e = c(this.root);
                    else {
                        var i = f(this.root) ? this.root : t,
                            n = i.documentElement,
                            o = i.body;
                        e = { top: 0, left: 0, right: n.clientWidth || o.clientWidth, width: n.clientWidth || o.clientWidth, bottom: n.clientHeight || o.clientHeight, height: n.clientHeight || o.clientHeight };
                    }
                    return this._expandRectByRootMargin(e);
                }),
                (a.prototype._expandRectByRootMargin = function (t) {
                    var e = this._rootMarginValues.map(function (e, i) {
                            return "px" == e.unit ? e.value : (e.value * (i % 2 ? t.width : t.height)) / 100;
                        }),
                        i = { top: t.top - e[0], right: t.right + e[1], bottom: t.bottom + e[2], left: t.left - e[3] };
                    return (i.width = i.right - i.left), (i.height = i.bottom - i.top), i;
                }),
                (a.prototype._hasCrossedThreshold = function (t, e) {
                    var i = t && t.isIntersecting ? t.intersectionRatio || 0 : -1,
                        n = e.isIntersecting ? e.intersectionRatio || 0 : -1;
                    if (i !== n)
                        for (var o = 0; o < this.thresholds.length; o++) {
                            var s = this.thresholds[o];
                            if (s == i || s == n || s < i != s < n) return !0;
                        }
                }),
                (a.prototype._rootIsInDom = function () {
                    return !this.root || p(t, this.root);
                }),
                (a.prototype._rootContainsTarget = function (e) {
                    var i = (this.root && (this.root.ownerDocument || this.root)) || t;
                    return p(i, e) && (!this.root || i == e.ownerDocument);
                }),
                (a.prototype._registerInstance = function () {
                    e.indexOf(this) < 0 && e.push(this);
                }),
                (a.prototype._unregisterInstance = function () {
                    var t = e.indexOf(this);
                    -1 != t && e.splice(t, 1);
                }),
                (window.IntersectionObserver = a),
                (window.IntersectionObserverEntry = s);
        }
    function o(t) {
        try {
            return (t.defaultView && t.defaultView.frameElement) || null;
        } catch (t) {
            return null;
        }
    }
    function s(t) {
        (this.time = t.time),
            (this.target = t.target),
            (this.rootBounds = d(t.rootBounds)),
            (this.boundingClientRect = d(t.boundingClientRect)),
            (this.intersectionRect = d(t.intersectionRect || { top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0 })),
            (this.isIntersecting = !!t.intersectionRect);
        var e = this.boundingClientRect,
            i = e.width * e.height,
            n = this.intersectionRect,
            o = n.width * n.height;
        this.intersectionRatio = i ? Number((o / i).toFixed(4)) : this.isIntersecting ? 1 : 0;
    }
    function a(t, e) {
        var i,
            n,
            o,
            s = e || {};
        if ("function" != typeof t) throw new Error("callback must be a function");
        if (s.root && 1 != s.root.nodeType && 9 != s.root.nodeType) throw new Error("root must be a Document or Element");
        (this._checkForIntersections =
            ((i = this._checkForIntersections.bind(this)),
            (n = this.THROTTLE_TIMEOUT),
            (o = null),
            function () {
                o ||
                    (o = setTimeout(function () {
                        i(), (o = null);
                    }, n));
            })),
            (this._callback = t),
            (this._observationTargets = []),
            (this._queuedEntries = []),
            (this._rootMarginValues = this._parseRootMargin(s.rootMargin)),
            (this.thresholds = this._initThresholds(s.threshold)),
            (this.root = s.root || null),
            (this.rootMargin = this._rootMarginValues
                .map(function (t) {
                    return t.value + t.unit;
                })
                .join(" ")),
            (this._monitoringDocuments = []),
            (this._monitoringUnsubscribes = []);
    }
    function r(t, e, i, n) {
        "function" == typeof t.addEventListener ? t.addEventListener(e, i, n || !1) : "function" == typeof t.attachEvent && t.attachEvent("on" + e, i);
    }
    function l(t, e, i, n) {
        "function" == typeof t.removeEventListener ? t.removeEventListener(e, i, n || !1) : "function" == typeof t.detatchEvent && t.detatchEvent("on" + e, i);
    }
    function c(t) {
        var e;
        try {
            e = t.getBoundingClientRect();
        } catch (t) {}
        return e ? ((e.width && e.height) || (e = { top: e.top, right: e.right, bottom: e.bottom, left: e.left, width: e.right - e.left, height: e.bottom - e.top }), e) : { top: 0, bottom: 0, left: 0, right: 0, width: 0, height: 0 };
    }
    function d(t) {
        return !t || "x" in t ? t : { top: t.top, y: t.top, bottom: t.bottom, left: t.left, x: t.left, right: t.right, width: t.width, height: t.height };
    }
    function u(t, e) {
        var i = e.top - t.top,
            n = e.left - t.left;
        return { top: i, left: n, height: e.height, width: e.width, bottom: i + e.height, right: n + e.width };
    }
    function p(t, e) {
        for (var i = e; i; ) {
            if (i == t) return !0;
            i = h(i);
        }
        return !1;
    }
    function h(e) {
        var i = e.parentNode;
        return 9 == e.nodeType && e != t ? o(e) : (i && i.assignedSlot && (i = i.assignedSlot.parentNode), i && 11 == i.nodeType && i.host ? i.host : i);
    }
    function f(t) {
        return t && 9 === t.nodeType;
    }
})(),
    (function (t) {
        "use strict";
        t.extend(t.easing, {
            def: "easeOutQuad",
            swing: function (e, i, n, o, s) {
                return t.easing[t.easing.def](e, i, n, o, s);
            },
            easeOutQuad: function (t, e, i, n, o) {
                return -n * (e /= o) * (e - 2) + i;
            },
            easeOutQuint: function (t, e, i, n, o) {
                return n * ((e = e / o - 1) * e * e * e * e + 1) + i;
            },
        });
        var e,
            i,
            n,
            o,
            s,
            a,
            r,
            l,
            c = {
                initialised: !1,
                mobile: !1,
                minipopup: {
                    imageSrc: "",
                    imageLink: "#",
                    name: "",
                    nameLink: "#",
                    content: "has been added to your cart.",
                    action: '<a href="/cart" class="btn viewcart">View Cart</a><a href="/checkout" class="btn btn-dark checkout">Checkout</a>',
                    delay: 4e3,
                    space: 20,
                    template:
                        '<div class="minipopup-box"><div class="product"><figure class="product-media"><a href="{{imageLink}}"><img src="{{imageSrc}}" alt="product" width="60" height="60"></a></figure><div class="product-detail"><a href="{{nameLink}}" class="product-name">{{name}}</a><p>{{content}}</p></div></div><div class="product-action">{{action}}</div><button class="mfp-close"></button></div>',
                },
                init: function () {
                    this.initialised ||
                        ((this.initialised = !0),
                        this.checkMobile(),
                        this.stickyHeader(),
                        this.headerSearchToggle(),
                        this.mMenuIcons(),
                        this.mMenuToggle(),
                        this.mobileMenu(),
                        this.scrollToTop(),
                        this.quantityInputs(),
                        this.alert(),
                        this.countTo(),
                        this.tooltip(),
                        this.popover(),
                        this.changePassToggle(),
                        this.changeBillToggle(),
                        this.catAccordion(),
                        this.toggleFilter(),
                        this.toggleSidebar(),
                        this.toggleCart(),
                        this.linkToTab(),
                        this.productTabSroll(),
                        this.scrollToElement(),
                        this.loginPopup(),
                        this.productManage(),
                        this.ratingTooltip(),
                        this.windowClick(),
                        this.popupMenu(),
                        this.topNotice(),
                        this.ratingForm(),
                        this.parallax(),
                        this.sideMenu(),
                        this.miniPopup.init(),
                        this.initProductSinglePage(),
                        this.initCollapsibleWidget(),
                        this.initProductsScrollLoad(".scroll-load"),
                        this.productsCartAction(),
                        this.productsWishlistAction(),
                        this.initPurchasedMinipopup(),
                        this.initJqueryParallax(),
                        this.ajaxLoadProducts(),
                        this.categoryNavScroll(),
                        this.wordRotate(),
                        this.footerReveal(),
                        this.videoModal(),
                        this.animPlayBtn(),
                        t.fn.superfish && this.menuInit(),
                        t.fn.countdown && this.countDown(),
                        t.fn.owlCarousel && this.owlCarousels(),
                        "object" == typeof noUiSlider && this.filterSlider(),
                        t.fn.themeSticky && this.stickySidebar(),
                        t.fn.magnificPopup && this.lightBox(),
                        t.fn.isotope && this.isotopes(),
                        t.fn.elevateZoom && this.zoomImage(),
                        t.fn.themePluginFloatElement && this.floatElement());
                },
                floatElement: function () {
                    t(function () {
                        t("body")
                            .find("[data-plugin-float-element]:not(.manual)")
                            .each(function () {
                                var e,
                                    i = t(this),
                                    n = i.data("plugin-options");
                                if ((n && (e = n), "string" == typeof e))
                                    try {
                                        e = JSON.parse(e.replace(/'/g, '"').replace(";", ""));
                                    } catch (t) {}
                                i.themePluginFloatElement(e);
                            });
                    });
                },
                animPlayBtn: function () {
                    t(document).on("click", ".anim-play-btn", function () {
                        var e,
                            i = t(this).closest(".anim-pane").find("[data-animation-name]");
                        (e = i.attr("data-animation-name")),
                            i.removeClass(e),
                            setTimeout(function () {
                                i.addClass(e);
                            }, 200);
                    });
                },
                checkMobile: function () {
                    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (this.mobile = !0) : (this.mobile = !1);
                },
                initCollapsibleWidget: function () {
                    t(".sidebar-wrapper .widget-title").on("click", function (t) {
                        setTimeout(function () {
                            c.stickySidebar();
                        }, 320);
                    });
                },
                countDown: function () {
                    t(".product-countdown")
                        .add(".countdown")
                        .each(function () {
                            var e = t(this),
                                i = e.data("until"),
                                n = e.data("compact"),
                                o = e.data("format") ? e.data("format") : "DHMS",
                                s = e.data("labels-short") ? ["Years", "Months", "Weeks", "Days", "Hours", "Mins", "Secs"] : ["Years", "Months", "Weeks", "Days", "Hours", "Minutes", "Seconds"],
                                a = e.data("labels-short") ? ["Year", "Month", "Week", "Day", "Hour", "Min", "Sec"] : ["Year", "Month", "Week", "Day", "Hour", "Minute", "Second"];
                            if (e.data("relative")) l = i;
                            else
                                var r = i.split(", "),
                                    l = new Date(r[0], r[1] - 1, r[2]);
                            e.countdown({ until: l, format: o, padZeroes: !0, compact: n, compactLabels: ["y", "m", "w", " days,"], timeSeparator: " : ", labels: s, labels1: a });
                        });
                },
                appearAnimate: function () {
                    var e = new Array();
                    t('.owl-item [data-animation-name="splitRight"]').each(function () {
                        var e = t(this).text(),
                            i = t(this).data("animation-delay") ? t(this).data("animation-delay") : "0";
                        t(this).text("");
                        for (var n = e.length - 1; n >= 0; n--) t(this).prepend('<div class="d-inline-block appear-animate" data-animation-delay="' + (i + 90 * n) + '">' + (" " === e[n] ? "&nbsp" : e[n]) + "</div>");
                    }),
                        this.intObs(
                            ".appear-animate",
                            function () {
                                if (!t(this).hasClass("animated")) {
                                    var i,
                                        n,
                                        o,
                                        s = t(this);
                                    if (s.closest(".owl-carousel.slide-animate").length > 0 && 0 === s.closest(".owl-item.active").length) return;
                                    (i = s.data("animation-name") ? s.data("animation-name") : "fadeIn"),
                                        (o = s.data("animation-duration") ? s.data("animation-duration") : "1000"),
                                        (n = s.data("animation-delay") ? s.data("animation-delay") : "0"),
                                        s.addClass("animated");
                                    var a = setTimeout(function () {
                                        s.addClass(i), s.css("animationDuration", o + "ms"), s.addClass("appear-animation-visible");
                                    }, parseInt(n || 0));
                                    s.closest(".owl-carousel.slide-animate").length > 0 && e.push(a);
                                }
                            },
                            {}
                        ),
                        t(".appear-animate-svg").each(function () {
                            t(this).hasClass("animated") ||
                                t(this).appear(
                                    function () {
                                        var i,
                                            n,
                                            o,
                                            s = t(this);
                                        (i = s.data("animation-name") ? s.data("animation-name") : "customLineAnim"),
                                            (o = s.data("animation-duration") ? s.data("animation-duration") : "1000"),
                                            (n = s.data("animation-delay") ? s.data("animation-delay") : "0"),
                                            s.addClass("animated");
                                        var a = setTimeout(function () {
                                            s.addClass(i), s.css("animationDuration", o + "ms"), s.addClass("appear-animation-visible");
                                        }, parseInt(n || 0));
                                        e.push(a);
                                    },
                                    { accX: t(this).data("x") ? t(this).data("x") : 0, accY: t(this).data("y") ? t(this).data("y") : -50 }
                                );
                        }),
                        t(".owl-carousel.slide-animate").each(function () {
                            var i;
                            t(this).on("translate.owl.carousel", function (e) {
                                i = t(this).find(".owl-item.active");
                            }),
                                t(this).on("translated.owl.carousel", function (n) {
                                    var o = t(this);
                                    if (t(this).find(".owl-item.active")[0] !== i[0]) {
                                        for (var s = 0; s < e.length; s++) clearTimeout(e[s]);
                                        (e = e.splice()),
                                            i.find(".appear-animate").removeClass("appear-animation-visible"),
                                            i.find(".appear-animate").css("animationDelay", ""),
                                            i.find(".appear-animate").css("animationDuration", ""),
                                            i.find(".appear-animate").removeClass("animated"),
                                            i.find(".appear-animate").each(function () {
                                                var e,
                                                    i = t(this);
                                                (e = i.data("animation-name") ? i.data("animation-name") : "fadeIn"), i.removeClass(e);
                                            });
                                    }
                                    o.find(".owl-item.active .appear-animate").each(function () {
                                        var i,
                                            n,
                                            o,
                                            s = t(this);
                                        (i = s.data("animation-name") ? s.data("animation-name") : "fadeIn"),
                                            (o = s.data("animation-duration") ? s.data("animation-duration") : "1000"),
                                            (n = s.data("animation-delay") ? s.data("animation-delay") : "0"),
                                            s.addClass(i),
                                            "splitRight" != i && (s.css("animationDelay", n + "ms"), s.css("animationDuration", o + "ms")),
                                            s.addClass("animated");
                                        var a = setTimeout(function () {
                                            s.addClass("appear-animation-visible");
                                        }, parseInt(n || 0));
                                        e.push(a);
                                    });
                                });
                        });
                },
                initProductsScrollLoad: function (e) {
                    var i,
                        n = t(e),
                        o = function (e) {
                            window.pageYOffset > i + n.outerHeight() - window.innerHeight - 150 &&
                                "loading" != n.data("load-state") &&
                                t.ajax({
                                    url: "ajax/category-ajax-products.html",
                                    success: function (e) {
                                        var i = t(e);
                                        n.data("load-state", "loading"),
                                            n.next().hasClass("bounce-loader") || t('<div class="bounce-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>').insertAfter(n),
                                            setTimeout(function () {
                                                n.append(i),
                                                    setTimeout(function () {
                                                        n.find(".col-6.fade:not(.in)").addClass("in");
                                                    }, 200),
                                                    n.data("load-state", "loaded"),
                                                    s >= 2 && n.next().css("display", "none");
                                            }, 1500);
                                        var s = parseInt(n.data("load-count") ? n.data("load-count") : 0);
                                        n.data("load-count", ++s), s >= 2 && window.removeEventListener("scroll", o, { passive: !0 });
                                    },
                                    failure: function () {
                                        $this.text("Sorry something went wrong.");
                                    },
                                });
                        };
                    n.length > 0 && ((i = n.offset().top), window.addEventListener("scroll", o, { passive: !0 }));
                },
                menuInit: function () {
                    t(".menu:not(.menu-vertical):not(.no-superfish)").superfish({ popUpSelector: "ul, .megamenu", hoverClass: "show", delay: 0, speed: 80, speedOut: 80, autoArrows: !0 }),
                        t(".menu.menu-vertical.no-animation").superfish({ popUpSelector: "ul, .megamenu", hoverClass: "show", delay: 0, speed: 200, speedOut: 200, autoArrows: !0 }),
                        t(".menu.menu-vertical:not(.no-superfish)").superfish({
                            popUpSelector: "ul, .megamenu",
                            hoverClass: "show",
                            delay: 0,
                            speed: 200,
                            speedOut: 200,
                            autoArrows: !0,
                            animation: { left: "100%", opacity: "show" },
                            animationOut: { left: "90%", opacity: "hide" },
                        });
                    var e = function () {
                        t(".menu:not(.menu-vertical):not(.no-superfish) .megamenu-fixed-width").each(function () {
                            var e = t(this),
                                i = e.parent().offset().left - 15,
                                n = e.outerWidth(),
                                o = t(window).width() - 45 - i - n;
                            o < 0 ? e.css("left", o + "px") : e.css("left", "-15px");
                        });
                    };
                    e(), t.fn.smartresize ? t(window).smartresize(e) : t(window).on("resize", e);
                },
                stickyHeader: function () {
                    var e = !1,
                        i = null,
                        n = null,
                        o = 992 > t(window).width(),
                        s = function (e, n, o) {
                            e.hasClass("fixed") ||
                                (e.parent().css("min-height", n.height),
                                i.filter(".fixed").each(function () {
                                    o += t(this).outerHeight();
                                }),
                                e.addClass("fixed").css("top", -n.height).animate({ top: o }),
                                e.find(".product-action").removeClass("d-none"));
                        },
                        a = function (t, e) {
                            t.hasClass("fixed") && (t.removeClass("fixed"), t.css("top", ""), t.parent().css("min-height", ""), !t.find(".product-action").hasClass("d-none") > 0 && t.find(".product-action").addClass("d-none"));
                        },
                        r = function () {
                            e
                                ? n.forEach(function (e, n) {
                                      if (e.mobile === !o) {
                                          var s = t(i[n]),
                                              r = JSON.parse(s.data("sticky-options").replace(/'/g, '"').replace(";", ""));
                                          (e.height = s.outerHeight(!0)), (e.offset = r.offset ? r.offset : s.offset().top), (e.paddingTop = parseInt(s.css("padding-top")));
                                      } else if (e.mobile === o) {
                                          s = t(i[n]);
                                          a(s);
                                      }
                                  })
                                : ((n = []),
                                  (i = t(".sticky-header").each(function () {
                                      var e = t(this),
                                          i = e.data("sticky-options"),
                                          o = {};
                                      i && (o = JSON.parse(i.replace(/'/g, '"').replace(";", ""))),
                                          (o.height = e.outerHeight(!0)),
                                          (o.offset = o.offset || e.offset().top),
                                          (o.paddingTop = parseInt(e.css("padding-top"))),
                                          n.push(o),
                                          e.parent().hasClass("sticky-wrapper") || e.wrap('<div class="sticky-wrapper"></div>');
                                  })),
                                  (e = !0));
                        },
                        l = function () {
                            if (992 > t(window).width()) {
                                (o && e) || r(), (o = !0);
                                var l = t(window).scrollTop(),
                                    c = 0;
                                if (
                                    (i.each(function (i) {
                                        var o = t(this),
                                            r = n[i];
                                        !1 !== r.mobile && l + c > r.offset + r.paddingTop ? o.hasClass("fixed") || s(o, r, c) : (!0 !== r.mobile && !o.hasClass("fixed") && e) || a(o);
                                    }),
                                    t(".sticky-navbar") && 576 > t(window).width())
                                )
                                    (l = t(window).scrollTop()) >= 300 ? t(".sticky-navbar").addClass("fixed") : t(".sticky-navbar").removeClass("fixed");
                            } else {
                                (!o && e) || r(), (o = !1);
                                (l = t(window).scrollTop()), (c = 0);
                                i.each(function (i) {
                                    var o = t(this),
                                        r = n[i];
                                    !0 !== r.mobile && l + c > r.offset + r.paddingTop ? o.hasClass("fixed") || s(o, r, c) : (!1 !== r.mobile && !o.hasClass("fixed") && e) || a(o);
                                });
                            }
                        };
                    setTimeout(l, 500), t(window).smartresize(l), t(window).on("scroll", l);
                },
                headerSearchToggle: function () {
                    t(".header-search").length &&
                        t("body")
                            .on("click", ".header-search", function (t) {
                                t.stopPropagation();
                            })
                            .on("click", ".search-toggle", function (e) {
                                var i = t(this).closest(".header-search");
                                i.toggleClass("show"), t(".header-search-wrapper").toggleClass("show"), i.hasClass("show") && i.find("input.form-control").focus(), e.preventDefault();
                            })
                            .on("click", function (e) {
                                t(".header-search").removeClass("show"), t(".header-search-wrapper").removeClass("show"), t("body").removeClass("is-search-active");
                            });
                    var e = function () {
                        t(".header-search").each(function () {
                            var e = t(this);
                            e.find(".header-search-wrapper").css(t(window).width() < 576 ? { left: 15 - e.offset().left + "px", right: 25 + e.offset().left + e.width() - t(window).width() + "px" } : { left: "", right: "" });
                        });
                    };
                    e(), t.fn.smartresize ? t(window).smartresize(e) : t(window).on("resize", e);
                },
                mMenuToggle: function () {
                    t(".sidebar-home").find(".menu-vertical").length > 0 &&
                        t(".menu-vertical .menu-btn").on("click", function (e) {
                            if (window.innerWidth < 992) {
                                var i = t(this);
                                e.preventDefault(), e.stopPropagation(), i.closest("li").find(">ul, .megamenu").slideToggle();
                            }
                        }),
                        t(".mobile-menu-toggler").on("click", function (e) {
                            t("body").toggleClass("mmenu-active"), t(this).toggleClass("active"), e.preventDefault();
                        }),
                        t(".menu-toggler").on("click", function (e) {
                            t(window).width() >= 992 ? t(".main-dropdown-menu").toggleClass("show") : t("body").toggleClass("mmenu-active"), e.preventDefault();
                        }),
                        t(".mobile-menu-overlay, .mobile-menu-close").on("click", function (e) {
                            t("body").removeClass("mmenu-active"), t(".menu-toggler").removeClass("active"), e.preventDefault();
                        }),
                        t(".menu-item > a").on("click", function (e) {
                            t("body").toggleClass("mmenu-depart-active"), t(this).siblings(".menu-depart").toggleClass("opened"), e.preventDefault();
                        });
                },
                mMenuIcons: function () {
                    t(".mobile-menu")
                        .find("li")
                        .each(function () {
                            var e = t(this);
                            e.find("ul").length && t("<span/>", { class: "mmenu-btn" }).appendTo(e.children("a"));
                        });
                },
                mobileMenu: function () {
                    t(".mmenu-btn").on("click", function (e) {
                        var i = t(this).closest("li"),
                            n = i.find("ul").eq(0);
                        i.hasClass("open")
                            ? n.slideUp(300, function () {
                                  i.removeClass("open");
                              })
                            : n.slideDown(300, function () {
                                  i.addClass("open");
                              }),
                            e.stopPropagation(),
                            e.preventDefault();
                    });
                },
                owlCarousels: function () {
                    var e = { loop: !0, margin: 0, responsiveClass: !0, nav: !1, navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'], dots: !0, autoplay: !1, autoplayTimeout: 15e3, items: 1 },
                        i = function (i, o) {
                            var s;
                            (s = o ? t.extend(!0, {}, e, o) : e), i.hasClass("nav-thin") && (s.navText = ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">']);
                            var a = i.data("owl-options");
                            "string" == typeof a && ((a = JSON.parse(a.replace(/'/g, '"').replace(";", ""))), (s = t.extend(!0, {}, s, a))), i.on("initialize.owl.carousel", n), i.owlCarousel(s);
                        },
                        n = function (t) {
                            var e,
                                i,
                                n = ["", "-xs", "-sm", "-md", "-lg", "-xl", "-xxl"];
                            for (this.classList.remove("row"), e = 0; e < 7; ++e) for (i = 1; i <= 12; ++i) this.classList.remove("cols" + n[e] + "-" + i);
                            this.classList.remove("gutter-no"), this.classList.remove("gutter-sm"), this.classList.remove("gutter-lg");
                        },
                        o = {
                            ".home-slider": { lazyLoad: !1, autoplay: !1, dots: !1, nav: !0, autoplayTimeout: 12e3, animateOut: "fadeOut", navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'], loop: !0 },
                            ".testimonials-carousel": { lazyLoad: !1, autoHeight: !0, responsive: { 992: { items: 2 } } },
                            ".featured-products": { loop: !1, margin: 30, autoplay: !1, responsive: { 0: { items: 2 }, 700: { items: 3, margin: 15 }, 1200: { items: 4 } } },
                            ".cats-slider": { loop: !1, margin: 20, autoplay: !1, nav: !0, dots: !1, items: 2, responsive: { 576: { items: 3 }, 992: { items: 4 }, 1200: { items: 5 }, 1400: { items: 6 } } },
                            ".products-slider.5col": { loop: !1, margin: 20, autoplay: !1, dots: !1, items: 2, responsive: { 576: { items: 3 }, 768: { items: 4 }, 992: { items: 5 } } },
                            ".products-slider": { loop: !1, margin: 20, autoplay: !1, dots: !0, items: 2, responsive: { 576: { items: 3 }, 992: { items: 4 } } },
                            ".categories-slider": { loop: !1, margin: 20, autoplay: !1, nav: !0, dots: !1, items: 2, responsive: { 576: { items: 3 }, 992: { items: 5 } } },
                            ".quantity-inputs": {
                                items: 2,
                                margin: 20,
                                dots: !1,
                                nav: !0,
                                responsive: { 992: { items: 4 }, 768: { items: 3 } },
                                onInitialized: function () {
                                    this.$element.find(".horizontal-quantity").val(1);
                                },
                            },
                            ".banners-slider": { dots: !0, loop: !1, margin: 20, responsive: { 576: { items: 2 }, 992: { items: 3 } } },
                            ".brands-slider": {
                                loop: !1,
                                margin: 20,
                                autoHeight: !0,
                                autoplay: !1,
                                dots: !1,
                                navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                                items: 2,
                                responsive: { 0: { items: 2 }, 480: { items: 3 }, 768: { items: 4 }, 991: { items: 5 }, 1200: { items: 6 } },
                            },
                            ".instagram-feed-carousel": {
                                loop: !0,
                                dots: !1,
                                autoplay: !1,
                                responsive: { 0: { items: 2 }, 480: { items: 3 }, 768: { items: 5 }, 992: { items: 6 }, 1200: { items: 7 }, 1400: { items: 8 }, 1600: { items: 9 }, 1800: { items: 10 } },
                            },
                            ".widget-featured-products": { margin: 20, lazyLoad: !0, nav: !0, navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'], dots: !1, autoHeight: !0 },
                            ".entry-slider": { margin: 0, lazyLoad: !0 },
                            ".related-posts-carousel": { loop: !1, margin: 30, autoplay: !1, responsive: { 480: { items: 2 }, 1200: { items: 3 } } },
                            ".boxed-slider": { lazyLoad: !0, autoplayTimeout: 2e4, animateOut: "fadeOut", dots: !1 },
                            ".about-slider": { margin: 0, lazyLoad: !0 },
                            ".product-single-default .product-single-carousel": {
                                margin: 0,
                                nav: !0,
                                loop: !1,
                                dotsContainer: "#carousel-custom-dots",
                                autoplay: !1,
                                onResized: function () {
                                    var e = this.$element;
                                    t.fn.elevateZoom &&
                                        e.find("img").each(function () {
                                            var e = t(this),
                                                i = { responsive: !0, zoomWindowFadeIn: 350, zoomWindowFadeOut: 200, borderSize: 0, zoomContainer: e.parent(), zoomType: "inner", cursor: "grab" };
                                            e.elevateZoom(i);
                                        });
                                },
                                onInitialized: function () {
                                    var e = this.$element;
                                    t.fn.elevateZoom &&
                                        e.find("img").each(function () {
                                            var e = t(this),
                                                i = { responsive: !0, zoomWindowFadeIn: 350, zoomWindowFadeOut: 200, borderSize: 0, zoomContainer: e.parent(), zoomType: "inner", cursor: "grab" };
                                            e.elevateZoom(i);
                                        });
                                },
                            },
                            ".product-single-extended .product-single-carousel": { dots: !1, autoplay: !1, center: !0, items: 1, responsive: { 768: { items: 3 } } },
                        };
                    Object.keys(o).forEach(function (e) {
                        t(e).each(function () {
                            i(t(this), o[e]);
                        });
                    }),
                        t(".owl-carousel").each(function () {
                            t(this).data("owl.carousel") || i(t(this), i);
                        }),
                        t(".home-slider").on("loaded.owl.lazy", function (e) {
                            t(e.element).closest(".home-slide").addClass("loaded"), t(e.element).closest(".home-slider").addClass("loaded");
                        }),
                        t(".boxed-slider").on("loaded.owl.lazy", function (e) {
                            t(e.element).closest(".category-slide").addClass("loaded");
                        }),
                        t(".about-slider").on("loaded.owl.lazy", function (e) {
                            t(e.element).closest("div").addClass("loaded");
                        }),
                        t(".home-slider.with-dots-container").each(function () {
                            var e = t(this),
                                i = e.parent().find(".home-slider-thumbs"),
                                n = i.children();
                            n.eq(0).addClass("active"),
                                i.addClass("owl-carousel owl-theme").owlCarousel({ nav: !1, dots: !1, items: 3, margin: 10 }),
                                n.click(function () {
                                    var n = t(this),
                                        o = (n.parent().filter(i).length ? n : n.parent()).index();
                                    e.trigger("to.owl.carousel", o);
                                }),
                                e.on("translate.owl.carousel", function (e) {
                                    var o = (e.item.index - t(e.currentTarget).find(".cloned").length / 2 + e.item.count) % e.item.count,
                                        s = n.eq(o);
                                    n.filter(".active").removeClass("active"), s.addClass("active"), i.trigger("to.owl.carousel", o);
                                });
                        }),
                        t(".home-slider-sidebar").each(function () {
                            var e = t(this),
                                i = e.parent().find(".home-slider"),
                                n = e.find("li");
                            n.click(function () {
                                var e = t(this).index();
                                i.trigger("to.owl.carousel", e);
                            }),
                                i.on("translate.owl.carousel", function (i) {
                                    var o = (i.item.index - t(i.currentTarget).find(".cloned").length / 2 + i.item.count) % i.item.count,
                                        s = n.eq(o);
                                    n.filter(".active").removeClass("active"), s.addClass("active"), e.trigger("to.owl.carousel", o);
                                });
                        });
                },
                filterSlider: function () {
                    var e = document.getElementById("price-slider");
                    null != e &&
                        (noUiSlider.create(e, { start: [0, 1e3], connect: !0, step: 100, margin: 100, range: { min: 0, max: 1e3 } }),
                        e.noUiSlider.on("update", function (e, i) {
                            e = e.map(function (t) {
                                return "$" + parseInt(t);
                            });
                            t("#filter-price-range").text(e.join(" - "));
                        }));
                },
                stickySidebar: function () {
                    var e = 10,
                        i = 992;
                    t(".header-bottom.sticky-header").each(function () {
                        e += t(this).height();
                    }),
                        t(".sidebar-wrapper").each(function () {
                            t(this).data("sticky-sidebar-options") && ((e = t(this).data("sticky-sidebar-options").offsetTop), (i = t(this).data("sticky-sidebar-options").minWidth));
                        }),
                        t(".sidebar-wrapper, .sticky-slider").themeSticky({ autoInit: !0, minWidth: i, containerSelector: ".row, .container", paddingOffsetBottom: 10, paddingOffsetTop: e });
                },
                countTo: function () {
                    t.fn.numerator &&
                        t(".count-to").each(function () {
                            var e = t(this),
                                i = { fromValue: e.data("fromvalue"), toValue: e.data("tovalue"), duration: e.data("duration"), delimiter: e.data("delimiter"), rounding: e.data("round") };
                            t.extend(i, {
                                onComplete: function () {
                                    e.data("append") && e.html(e.html() + e.data("append")), e.data("prepend") && e.html(e.data("prepend") + e.html());
                                },
                            }),
                                e.appear(function () {
                                    setTimeout(function () {
                                        e.numerator(i);
                                    }, 300);
                                });
                        });
                },
                alert: function () {
                    t(".alert-dismissible").each(function () {
                        t(this).append('<button class="alert-close" />');
                    }),
                        t(".alert-dismissible .alert-close").on("click", function (e) {
                            var i = t(this).closest(".alert-dismissible");
                            i.fadeOut(function () {
                                i.remove();
                            });
                        });
                },
                tooltip: function () {
                    t.fn.tooltip && t('[data-toggle="tooltip"]').tooltip({ trigger: "hover focus" });
                },
                popover: function () {
                    t.fn.popover && t('[data-toggle="popover"]').popover({ trigger: "focus" });
                },
                changePassToggle: function () {
                    t("#change-pass-checkbox").on("change", function () {
                        t("#account-chage-pass").toggleClass("show");
                    });
                },
                changeBillToggle: function () {
                    t("#change-bill-address").on("change", function () {
                        t("#checkout-shipping-address").toggleClass("show"), t("#new-checkout-address").toggleClass("show");
                    });
                },
                catAccordion: function () {
                    t(".catAccordion")
                        .on("shown.bs.collapse", function (e) {
                            var i = t(e.target).closest("li");
                            i.hasClass("open") || i.addClass("open");
                        })
                        .on("hidden.bs.collapse", function (e) {
                            var i = t(e.target).closest("li");
                            i.hasClass("open") && i.removeClass("open");
                        });
                },
                scrollBtnAppear: function () {
                    t(window).scrollTop() >= 400 ? t("#scroll-top").addClass("fixed") : t("#scroll-top").removeClass("fixed");
                },
                scrollToTop: function () {
                    t("#scroll-top").on("click", function (e) {
                        t("html, body").animate({ scrollTop: 0 }, 1200), e.preventDefault();
                    });
                },
                newsletterPopup: function () {
                    t.magnificPopup.open({
                        items: { src: "#newsletter-popup-form" },
                        type: "inline",
                        mainClass: "mfp-newsletter",
                        removalDelay: 350,
                        callbacks: {
                            open: function () {
                                t(".sticky-header.fixed").css("padding-right") &&
                                    (t(".sticky-header.fixed").css("padding-right", window.innerWidth - document.body.clientWidth),
                                    t(".sticky-header.fixed-nav").css("padding-right", window.innerWidth - document.body.clientWidth),
                                    t("#scroll-top").css("margin-right", window.innerWidth - document.body.clientWidth),
                                    t(".minipopup-area").css("padding-right", window.innerWidth - document.body.clientWidth),
                                    t(".wishlist-popup").css("padding-right", window.innerWidth - document.body.clientWidth));
                            },
                            afterClose: function () {
                                t(".sticky-header.fixed").css("padding-right") &&
                                    (t(".sticky-header.fixed").css("padding-right", ""),
                                    t(".sticky-header.fixed-nav").css("padding-right", ""),
                                    t("#scroll-top").css("margin-right", ""),
                                    t(".minipopup-area").css("padding-right", ""),
                                    t(".wishlist-popup").css("padding-right", ""));
                            },
                        },
                    });
                },
                lightBox: function () {
                    document.getElementById("newsletter-popup-form") &&
                        setTimeout(function () {
                            var e = t.magnificPopup.instance;
                            e.isOpen
                                ? (e.close(),
                                  setTimeout(function () {
                                      c.newsletterPopup();
                                  }, 360))
                                : c.newsletterPopup();
                        }, 5e3);
                    var e,
                        i = [];
                    (e = t(".product-slider-container").length > 0 ? t(".product-single-carousel .owl-item:not(.cloned) img") : t(".product-single-gallery img")),
                        t(".media-with-zoom").length > 0 && (e = t(".media-with-zoom .owl-carousel .owl-item:not(.cloned) img")),
                        t(".team-section").length > 0 && (e = t(".team-section img")),
                        e.each(function () {
                            i.push({ src: t(this).attr("data-zoom-image") });
                        }),
                        t(".prod-full-screen").click(function (e) {
                            var n;
                            (n = e.currentTarget.closest(".product-slider-container") ? t(".product-single-carousel").data("owl.carousel").current() : t(e.currentTarget).closest(".product-item").index()),
                                t(e.currentTarget).closest(".post").length > 0 && (n = t(e.currentTarget).closest(".owl-item:not(.cloned)").index()),
                                t(e.currentTarget).closest(".team-info").length > 0 && (n = t(e.currentTarget).closest(".team-info").parent().index()),
                                t.magnificPopup.open({ items: i, navigateByImgClick: !0, type: "image", gallery: { enabled: !0 } }, n);
                        }),
                        t("body").on("click", "a.btn-quickview", function (e) {
                            // e.preventDefault();
                            // var i = t(this);
                            // i.closest(".product-default").find("figure").hasClass("load-more-overlay") ||
                            //     (i.closest(".product-default").find("figure").addClass("load-more-overlay"), i.closest(".product-default").find("figure").append('<i class="porto-loading-icon"></i>'));
                            // var n = t(this).attr("href");
                            // setTimeout(function () {
                            //     t.magnificPopup.open({
                            //         type: "ajax",
                            //         mainClass: "mfp-ajax-product",
                            //         tLoading: "",
                            //         preloader: !1,
                            //         removalDelay: 350,
                            //         items: { src: n },
                            //         callbacks: {
                            //             open: function () {
                            //                 t(".sticky-header.fixed").css("padding-right") &&
                            //                     (t(".sticky-header.fixed").css("padding-right", window.innerWidth - document.body.clientWidth),
                            //                     t(".sticky-header.fixed-nav").css("padding-right", window.innerWidth - document.body.clientWidth),
                            //                     t("#scroll-top").css("margin-right", window.innerWidth - document.body.clientWidth));
                            //             },
                            //             ajaxContentAdded: function () {
                            //                 c.ajaxLoading(),
                            //                     i.closest(".product-default").find("figure").removeClass("load-more-overlay"),
                            //                     i.closest(".product-default").find("figure .porto-loading-icon").remove(),
                            //                     c.quantityInputs(t(".mfp-ajax-product")),
                            //                     c.initProductSinglePage(),
                            //                     c.owlCarousels();
                            //             },
                            //             beforeClose: function () {
                            //                 t(".ajax-overlay").remove();
                            //             },
                            //             afterClose: function () {
                            //                 t(".sticky-header.fixed").css("padding-right") &&
                            //                     (t(".sticky-header.fixed").css("padding-right", ""), t(".sticky-header.fixed-nav").css("padding-right", ""), t("#scroll-top").css("margin-right", ""));
                            //             },
                            //         },
                            //         ajax: { tError: "" },
                            //     });
                            // }, 300);
                        });
                },
                videoModal: function () {
                    t.fn.magnificPopup && t(".btn-iframe").magnificPopup({ type: "iframe", preloader: !1, fixedContentPos: !1, closeBtnInside: !1 });
                },
                linkToTab: function () {
                    t("body")
                        .on("click", ".nav .nav-link", function (e) {
                            t(".nav .nav-link").hasClass("address") && t(".nav .nav-link").removeClass("address");
                        })
                        .on("click", ".link-to-tab", function (e) {
                            var i = t(this).attr("href"),
                                n = t(i),
                                o = n.parent().parent().find(".nav");
                            e.preventDefault(),
                                n.siblings().removeClass("active show"),
                                n.addClass("active show"),
                                o.find(".nav-link").removeClass("active"),
                                "#shipping" == i || "#billing" == i ? o.find('[href="#address"]').hasClass("address") || o.find('[href="#address"]').addClass("address") : o.find('[href="' + i + '"]').addClass("active"),
                                t("html").animate({ scrollTop: n.offset().top - 150 });
                        });
                },
                productTabSroll: function () {
                    t(".rating-link").on("click", function (e) {
                        if (t(".product-single-tabs").length) t("#product-tab-reviews").tab("show");
                        else {
                            if (!t(".product-single-collapse").length) return;
                            t("#product-reviews-content").collapse("show");
                        }
                        t("#product-reviews-content").length &&
                            setTimeout(function () {
                                var e = t("#product-reviews-content").offset().top - 60;
                                t("html, body").stop().animate({ scrollTop: e }, 800);
                            }, 250),
                            e.preventDefault();
                    });
                },
                quantityInputs: function (e = "body") {
                    t.fn.TouchSpin &&
                        (t(e)
                            .find(".vertical-quantity")
                            .TouchSpin({
                                verticalbuttons: !0,
                                verticalup: "",
                                verticaldown: "",
                                verticalupclass: "icon-up-dir",
                                verticaldownclass: "icon-down-dir",
                                buttondown_class: "btn btn-outline",
                                buttonup_class: "btn btn-outline",
                                initval: 1,
                                min: 1,
                            }),
                        t(e)
                            .find(".horizontal-quantity")
                            .TouchSpin({ verticalbuttons: !1, buttonup_txt: "", buttondown_txt: "", buttondown_class: "btn btn-outline btn-down-icon", buttonup_class: "btn btn-outline btn-up-icon", initval: 1, min: 1 }));
                },
                ajaxLoading: function () {
                    t("body").append("<div class='ajax-overlay'></div>");
                },
                wordRotate: function () {
                    t.isFunction(t.fn.themePluginWordRotator) &&
                        t(function () {
                            t("[data-plugin-wort-rotator], .wort-rotator:not(.manual)").each(function () {
                                var e = t(this),
                                    i = {},
                                    n = e.data("plugin-options");
                                n && (i = n), e.themePluginWordRotator(i);
                            });
                        });
                },
                toggleFilter: function () {
                    t(".filter-toggle a").click(function (e) {
                        e.preventDefault(), t(".filter-toggle").toggleClass("opened"), t("body").toggleClass("sidebar-opened");
                    }),
                        t(".sidebar-overlay").click(function (e) {
                            t(".filter-toggle").removeClass("opened"), t("body").removeClass("sidebar-opened");
                        }),
                        t(".sort-menu-trigger").click(function (e) {
                            e.preventDefault(), t(".select-custom").removeClass("opened"), t(e.target).closest(".select-custom").toggleClass("opened");
                        });
                },
                toggleSidebar: function () {
                    t(".sidebar-toggle").click(function (e) {
                        e.preventDefault(), t("body").toggleClass("sidebar-opened");
                    });
                },
                toggleCart: function () {
                    t(".cart-toggle").click(function () {
                        t("body").toggleClass("cart-opened");
                    }),
                        t(".btn-close").click(function () {
                            t("body").toggleClass("cart-opened");
                        }),
                        t(".box-close").click(function () {
                            t(this).parent().remove();
                        }),
                        t(".cart-overlay").click(function (e) {
                            t("body").removeClass("cart-opened");
                        });
                },
                scrollToElement: function () {
                    t('.scrolling-box a[href^="#"]').on("click", function (e) {
                        var i = t(this.getAttribute("href"));
                        i.length &&
                            (e.preventDefault(),
                            t("html, body")
                                .stop()
                                .animate({ scrollTop: i.offset().top - 69 }, 700));
                    });
                },
                loginPopup: function () {
                    t(".login-link").click(function (e) {
                        e.preventDefault(), c.ajaxLoading();
                        t.magnificPopup.open({
                            type: "ajax",
                            mainClass: "login-popup",
                            tLoading: "",
                            preloader: !1,
                            removalDelay: 350,
                            items: { src: "ajax/login-popup.html" },
                            callbacks: {
                                open: function () {
                                    t(".sticky-header.fixed").css("padding-right") &&
                                        (t(".sticky-header.fixed").css("padding-right", window.innerWidth - document.body.clientWidth),
                                        t(".sticky-header.fixed-nav").css("padding-right", window.innerWidth - document.body.clientWidth),
                                        t("#scroll-top").css("margin-right", window.innerWidth - document.body.clientWidth));
                                },
                                beforeClose: function () {
                                    t(".ajax-overlay").remove();
                                },
                                afterClose: function () {
                                    t(".sticky-header.fixed").css("padding-right") && (t(".sticky-header.fixed").css("padding-right", ""), t(".sticky-header.fixed-nav").css("padding-right", ""), t("#scroll-top").css("margin-right", ""));
                                },
                            },
                            ajax: { tError: "" },
                        });
                    });
                },
                productManage: function () {
                    t(".product-select").click(function (e) {
                        t(this).parents(".product-default").find("figure img").attr("src", t(this).data("src")), t(this).addClass("checked").siblings().removeClass("checked");
                    });
                },
                ratingTooltip: function () {
                    t("body").on("mouseenter touchstart", ".product-ratings", function (e) {
                        var i = (t(this).find(".ratings").width() / t(this).width()) * 5;
                        t(this)
                            .find(".tooltiptext")
                            .text(i ? i.toFixed(2) : i);
                    });
                },
                windowClick: function () {
                    t(document).click(function (e) {
                        t(e.target).closest(".toolbox-item.select-custom").length || t(".select-custom").removeClass("opened");
                    });
                },
                popupMenu: function () {
                    if (!(t(".popup-menu").length <= 0)) {
                        var e = t(".popup-menu-ul"),
                            i = e.parent().width() - e.children().width();
                        i >= 0 && e.css("margin-right", "-" + i + "px"),
                            e.css("margin-top", i + "px"),
                            t(".popup-menu-toggler").on("click", function (e) {
                                e.preventDefault(),
                                    t(this).siblings(".popup-menu").addClass("open"),
                                    t(document).on("keydown.popup-menu", function (e) {
                                        27 == e.which && (t(".popup-menu").removeClass("open"), t(document).off("keydown.popup-menu"));
                                    });
                            }),
                            t("body").on("click", ".popup-menu-close", function (e) {
                                t(".popup-menu").removeClass("open"), t(document).off("keydown.popup-menu"), e.preventDefault();
                            }),
                            t("body").on("click", ".popup-menu-ul li a", function (e) {
                                var i = t(this).siblings("ul");
                                i.length > 0 && (i.length && i.toggleClass("open"), e.preventDefault());
                            });
                    }
                },
                topNotice: function () {
                    t(".top-notice .mfp-close").length &&
                        t("body").on("click", ".top-notice .mfp-close", function () {
                            t(this).height();
                            t(this)
                                .closest(".top-notice")
                                .fadeOut(function () {
                                    t(this).addClass("closed");
                                });
                        });
                },
                ratingForm: function () {
                    t("body").on("click", ".rating-form .rating-stars > a", function (e) {
                        var i = t(this);
                        i.addClass("active").siblings().removeClass("active"), i.parent().addClass("selected"), i.closest(".rating-form").find("select").val(i.text()), e.preventDefault();
                    });
                },
                parallax: function () {
                    var e = t("[data-parallax]"),
                        i = { speed: 1.5, horizontalPosition: "50%", offset: 0, enableOnMobile: !0 };
                    e.length &&
                        e.each(function () {
                            var e = t(this),
                                n = e.data("parallax");
                            n && (n = JSON.parse(n.replace(/'/g, '"').replace(";", "")));
                            var o,
                                s,
                                a,
                                r,
                                l = t.extend(!0, {}, i, n),
                                d = t(window);
                            r = t('<div class="parallax-background"></div>');
                            var u = e.data("image-src") ? "url(" + e.data("image-src") + ")" : e.css("background-image");
                            if (
                                (r.css({ "background-image": u, "background-size": "cover", "background-position": "50% 0%", position: "absolute", top: 0, left: 0, width: "100%", height: 100 * l.speed + "%" }),
                                e.prepend(r),
                                e.css({ position: "relative", overflow: "hidden" }),
                                !c.mobile || l.enableOnMobile)
                            ) {
                                var p = function () {
                                    (o = e.offset()),
                                        (s = -(d.scrollTop() - (o.top - 100)) / (l.speed + 2)),
                                        (a = s < 0 ? Math.abs(s) : -Math.abs(s)),
                                        r.css({ transform: "translate3d(0, " + (a - 50 + l.offset) + "px, 0)", "background-position-x": l.horizontalPosition });
                                };
                                t(window).on("scroll resize", p), p();
                            } else e.addClass("parallax-disabled");
                        });
                },
                isotopes: function () {
                    var e = { itemsSelector: ".grid-item", masonry: { columnWidth: ".grid-col-sizer" }, percentPosition: !0, sortBy: "original-order", getSortData: { "md-order": "[data-md-order] parseInt" }, sortReorder: !1 };
                    t(".grid").each(function () {
                        var i = t(this),
                            n = i.data("grid-options");
                        n && (n = JSON.parse(n.replace(/'/g, '"').replace(";", "")));
                        var o = t.extend(!0, {}, e, n),
                            s = i.isotope(o);
                        "function" == typeof imagesLoaded &&
                            t.fn.isotope &&
                            imagesLoaded(".grid", { background: !0 }).on("done", function (e, n) {
                                window.innerWidth < 768 && window.innerWidth > 400 && s.isotope({ sortBy: "md-order" });
                                var o = i.find(".grid-item.height-xl").outerHeight();
                                i.find(".grid-item.height-xxl").css("height", 2 * o),
                                    t(window).resize(function () {
                                        var t = i.find(".grid-item.height-xl").outerHeight();
                                        i.find(".grid-item.height-xxl").css("height", 2 * t), s.isotope("layout");
                                    }),
                                    s.isotope("layout");
                            });
                        if (o.sortReorder) {
                            var a = function () {
                                var e = t(window).width();
                                s.isotope({ sortBy: e < 768 && e > 400 ? "md-order" : "original-order" });
                            };
                            t.fn.smartresize ? t(window).smartresize(a) : t(window).on("resize", a);
                        }
                    });
                },
                zoomImage: function () {
                    t(window).resize(function () {
                        t(".product-single-grid .product-single-gallery img").each(function () {
                            var e = t(this),
                                i = { responsive: !0, zoomWindowFadeIn: 350, zoomWindowFadeOut: 200, borderSize: 0, zoomContainer: e.parent(), zoomType: "inner", cursor: "grab" };
                            e.elevateZoom(i);
                        });
                    });
                },
                sideMenu: function () {
                    t(".side-menu").length &&
                        t("body").on("click", ".side-menu-toggle", function (e) {
                            t(this).siblings("ul").slideToggle("fast"), t(this).parent().toggleClass("show"), e.stopPropagation();
                        });
                },
                productsCartAction: function () {
                    t("body").on("click", ".btn-add-cart.product-type-simple", function (e) {
                        var i;
                         e.preventDefault(),
                            (i = t(this).closest(".product-default").length > 0 ? t(this).closest(".product-default") : t(this).closest(".product-row")),
                            c.miniPopup.open({ name: i.find(".product-title").text(), nameLink: i.find(".product-title > a").attr("href"), imageSrc: i.find("figure img").attr("src"), imageLink: i.find(".product-title > a").attr("href") });
                    });
                },
                productsWishlistAction: function () {
                    t("body").on("click", ".btn-icon-wish:not(.added-wishlist)", function (e) {
                        e.preventDefault();
                        var i = t(this);
                        i.addClass("load-more-overlay loading"),
                            setTimeout(function () {
                                i.removeClass("load-more-overlay loading"),
                                    i.addClass("added-wishlist "),
                                    "" !== i.find("span").text() && i.find("span").text("BROWSE WISHLIST"),
                                    i.attr("title", "Go to Wishlist"),
                                    t(".wishlist-popup").addClass("active");
                            }, 1e3),
                            setTimeout(function () {
                                t(".wishlist-popup").removeClass("active");
                            }, 3e3);
                    });
                },
                initPurchasedMinipopup: function () {
                    (t(".product-single").length || t(".main-content").length) &&
                        setInterval(function () {
                            c.miniPopup.open({
                                name: "Mobile Speaker",
                                nameLink: "product.html",
                                imageSrc: "assets/images/products/small/product-1.jpg",
                                content: "Someone Purchased",
                                action: '<span class="text-primary" style="font-size: 11px;">12 MINUTES AGO</span>',
                            });
                        }, 6e4);
                },
                initJqueryParallax: function () {
                    t(".home-slider ul.scene").parallax(), t(".bg-parallax ul.scene").parallax();
                },
                ajaxLoadProducts: function () {
                    var e = 0;
                    t(".loadmore").click(function (i) {
                        i.preventDefault();
                        var n = t(this),
                            o = n.text();
                        n.text("Loading ..."),
                            t.ajax({
                                url: n.attr("href"),
                                success: function (i) {
                                    var s = t(".product-ajax-grid"),
                                        a = t(i);
                                    setTimeout(function () {
                                        a.hide().appendTo(s).fadeIn(), n.text(o), ++e >= 2 && n.hide();
                                    }, 350);
                                },
                                failure: function () {
                                    n.text("Sorry something went wrong.");
                                },
                            });
                    });
                },
                categoryNavScroll: function () {
                    t(".category-list-nav")
                        .find("a")
                        .on("click", function (e) {
                            var i = t(this).attr("href"),
                                n = t(i);
                            if (n.length) {
                                var o = n.offset().top - 70;
                                t("html, body").animate({ scrollTop: o }, 700), e.preventDefault();
                            }
                        });
                },
                footerReveal: function () {
                    var e = t(".footer-reveal");
                    if (e.length) {
                        var i = function () {
                            t(window).width() >= 992 ? (e.parent().css("margin-bottom", e.outerHeight()), e.css("position", "fixed")) : (e.parent().css("margin-bottom", ""), e.css("position", "static"));
                        };
                        t(window).resize(i), i();
                    }
                },
                intObs: function (e, i, n, o) {
                    var s = document.querySelectorAll(e),
                        a = { rootMargin: "0px 0px 200px 0px" };
                    Object.keys(n).length && (a = t.extend(a, n));
                    var r = new IntersectionObserver(function (e) {
                        for (var n = 0; n < e.length; n++) {
                            var s = e[n];
                            if (s.intersectionRatio > 0) {
                                if ("string" == typeof i) Function("return " + i)();
                                else i.call(t(s.target));
                                o || r.unobserve(s.target);
                            }
                        }
                    }, a);
                    t(s).each(function () {
                        r.observe(t(this)[0]);
                    });
                },
            };
        (c.initProductSingle = (function () {
            function e(t) {
                return this.init(t);
            }
            var i = function (t) {
                    var e = t.$thumbsWrap.offset().top,
                        i = t.$thumbs.offset().top;
                    i <= e - t.$productThumb[0].offsetHeight
                        ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) + t.$productThumb[0].offsetHeight), t.$thumbDown.removeClass("disabled"))
                        : i < e
                        ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - Math.ceil(i - e)), t.$thumbDown.removeClass("disabled"), t.$thumbUp.addClass("disabled"))
                        : t.$thumbUp.addClass("disabled");
                },
                n = function (t) {
                    var e = t.$thumbsWrap.offset().top + t.$thumbsWrap[0].offsetHeight,
                        i = t.$thumbs.offset().top + t.$thumbsHeight;
                    i >= e + t.$productThumb[0].offsetHeight
                        ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - t.$productThumb[0].offsetHeight), t.$thumbUp.removeClass("disabled"))
                        : i > e
                        ? (t.$thumbs.css("top", parseInt(t.$thumbs.css("top")) - Math.ceil(i - e)), t.$thumbUp.removeClass("disabled"), t.$thumbDown.addClass("disabled"))
                        : t.$thumbDown.addClass("disabled");
                },
                o = function (e) {
                    void 0 !== e.$thumbs &&
                        (e.$isPgVertical.length > 0
                            ? ((e.$thumbsHeight = e.$productThumb[0].offsetHeight * e.$thumbsCount + parseInt(e.$productThumb.css("margin-bottom")) * (e.$thumbsCount - 1)),
                              e.$thumbUp.addClass("disabled"),
                              e.$thumbDown.toggleClass("disabled", e.thumbsHeight <= e.$thumbsWrap[0].offsetHeight))
                            : e.$thumbs.hasClass("owl-carousel") ||
                              e.$thumbs.hasClass("transparent-dots") ||
                              e.$thumbs.hasClass("thumb-vertical") ||
                              e.$thumbs
                                  .addClass("owl-carousel owl-theme show-nav-hover")
                                  .owlCarousel(t.extend(!0, (e.isQuickview, {}), { margin: 8, items: 4, dots: !1, nav: !0, navText: ['<i class="fas fa-chevron-left">', '<i class="fas fa-chevron-right">'] })));
                };
            return (
                (e.prototype.init = function (e) {
                    var s = this,
                        a = e.find(".product-single-carousel");
                    (s.$wrapper = e),
                        (s.isQuickview = !!e.closest(".mfp-content").length),
                        (s.$isPgVertical = s.$wrapper.find(".pg-vertical")),
                        e.find(".owl-dots").children().eq(0).addClass("active"),
                        a
                            .on("initialized.owl.carousel", function () {
                                !(function (e) {
                                    e.$wrapper.find(".product-thumbs").length > 0 ? (e.$thumbs = e.$wrapper.find(".product-thumbs")) : (e.$thumbs = e.$wrapper.find(".prod-thumbnail")),
                                        (e.$thumbsWrap = e.$thumbs.parent()),
                                        (e.$thumbsDots = e.$thumbs.children()),
                                        (e.$thumbsCount = e.$thumbsDots.length),
                                        (e.$thumbUp = e.$thumbsWrap.parent().find(".thumb-up")),
                                        (e.$thumbDown = e.$thumbsWrap.parent().find(".thumb-down")),
                                        (e.$productThumb = e.$thumbsDots.eq(0)),
                                        e.$thumbUp.on("click", function (t) {
                                            e.$isPgVertical && i(e);
                                        }),
                                        e.$thumbDown.on("click", function (t) {
                                            e.$isPgVertical && n(e);
                                        }),
                                        e.$thumbsDots.on("click", function () {
                                            var i = t(this),
                                                n = (i.parent().filter(e.$thumbs).length ? i : i.parent()).index();
                                            e.$wrapper.find(".product-single-carousel").trigger("to.owl.carousel", n);
                                        }),
                                        o(e),
                                        t(window).on("resize", function () {
                                            o(e);
                                        });
                                })(s);
                            })
                            .on("translate.owl.carousel", function (e) {
                                var i = (e.item.index - t(e.currentTarget).find(".cloned").length / 2 + e.item.count) % e.item.count;
                                s.thumbsSetActive(i);
                            }),
                        (function (e) {
                            (e.$selects = e.$wrapper.find(".product-single-filter select")),
                                (e.$items = e.$wrapper.find(".product-single-filter:not(:last-child)")),
                                (e.$priceWrap = e.$wrapper.find(".product-filtered-price")),
                                (e.$clean = e.$wrapper.find(".product-single-filter:last-child")),
                                (e.$btnCart = e.$wrapper.find(".add-cart")),
                                (e.$btnView = e.$wrapper.find(".view-cart")),
                                (e.$cartMessage = e.$wrapper.find(".cart-message")),
                                e.variationCheck(),
                                e.$selects.on("change", function (t) {
                                    e.variationCheck();
                                }),
                                e.$items.find("li").on("click", function (i) {
                                    t(this).children().hasClass("disabled") || (t(this).toggleClass("active").siblings().removeClass("active"), i.preventDefault(), e.variationCheck());
                                }),
                                e.$clean.find(".clear-btn").on("click", function (t) {
                                    t.preventDefault(), e.variationClean(!0);
                                }),
                                e.$btnCart.on("click", function (t) {
                                    t.preventDefault(), e.$btnCart.hasClass("disabled") || (e.$btnCart.addClass("added-to-cart"), e.$btnView.removeClass("d-none"), e.$cartMessage.removeClass("d-none"));
                                });
                        })(this);
                }),
                (e.prototype.thumbsSetActive = function (t) {
                    var e = this,
                        i = e.$thumbsDots.eq(t);
                    if ((e.$thumbsDots.filter(".active").removeClass("active"), i.addClass("active"), e.$isPgVertical.length > 0)) {
                        var n = parseInt(e.$thumbs.css("top")) + t * e.$thumbsHeight;
                        n < 0
                            ? (e.$thumbUp.hasClass("disabled") || e.$thumbUp.addClass("disabled"), e.$thumbDown.hasClass("disabled") && e.$thumbDown.removeClass("disabled"), e.$thumbs.css("top", parseInt(e.$thumbs.css("top")) - n))
                            : (n = e.$thumbs.offset().top + e.$thumbs[0].offsetHeight - i.offset().top - i[0].offsetHeight) < 0 &&
                              (e.$thumbUp.hasClass("disabled") && e.$thumbUp.removeClass("disabled"), e.$thumbDown.hasClass("disabled") || e.$thumbDown.addClass("disabled"), e.$thumbs.css("top", parseInt(e.$thumbs.css("top")) + n));
                    } else e.$thumbs.trigger("to.owl.carousel", t, 100);
                }),
                (e.prototype.variationCheck = function () {
                    var e = this,
                        i = !0;
                    e.$selects.each(function () {
                        return this.value || (i = !1);
                    }),
                        e.$items.each(function () {
                            var e = t(this);
                            e.find("li").length && (e.find(".active").length || (i = !1));
                        }),
                        i ? e.variationMatch() : e.variationClean();
                }),
                (e.prototype.variationMatch = function () {
                    var t = this;
                    t.$priceWrap.find("span").text("$" + (Math.round(50 * Math.random()) + 170) + ".00"),
                        t.$priceWrap.find("del span").text("$" + (Math.round(50 * Math.random()) + 200) + ".00"),
                        t.$priceWrap.slideDown(),
                        t.$clean.slideDown(),
                        t.$btnCart.removeClass("disabled");
                }),
                (e.prototype.variationClean = function (t) {
                    t && this.$items.find(".active").removeClass("active"),
                        t && this.$selects.val(""),
                        this.$btnCart.hasClass("added-to-cart") && this.$btnCart.removeClass("added-to-cart"),
                        this.$priceWrap.slideUp(),
                        this.$clean.slideUp(),
                        this.$btnView.addClass("d-none"),
                        this.$cartMessage.addClass("d-none"),
                        this.$wrapper.find(".product-single-filter").length > 0 && this.$btnCart.addClass("disabled");
                }),
                function (t, i) {
                    return t ? new e(t.eq(0), i) : null;
                }
            );
        })()),
            (c.initProductSinglePage = function () {
                return (e = t(".product-single-container")).length ? (null === c.initProductSingle(e) ? null : void 0) : null;
            }),
            (c.miniPopup =
                ((n = 0),
                (o = []),
                (s = !1),
                (a = []),
                (r = !1),
                (l = function () {
                    if (!s) for (var t = 0; t < a.length; ++t) (a[t] -= 200) <= 0 && this.close(t--);
                }),
                {
                    init: function () {
                        var e = document.createElement("div");
                        (e.className = "minipopup-area"),
                            t(".page-wrapper")[0].appendChild(e),
                            (i = t(e)).on("click", ".mfp-close", function (e) {
                                self.close(t(this).closest(".minipopup-box").index());
                            });
                        var n = document.createElement("div"),
                            o = document.createElement("div");
                        (n.className = "wishlist-popup"),
                            (o.className = "wishlist-popup-msg"),
                            (o.innerText = "Product added!"),
                            t(".page-wrapper")[0].appendChild(n),
                            t(".wishlist-popup").append(o),
                            (this.close = this.close.bind(this)),
                            (l = l.bind(this));
                    },
                    open: function (e, s) {
                        var u,
                            p = this,
                            h = t.extend(!0, {}, c.minipopup, e);
                        (u = t(d(h.template, h))),
                            (p.space = h.space),
                            (u.appendTo(i).css("top", -n).find("img")[0].onload = function () {
                                (n += u[0].offsetHeight + p.space),
                                    u.addClass("active"),
                                    u.offset().top - window.pageYOffset < 0 && (p.close(), u.css("top", -n + u[0].offsetHeight + p.space)),
                                    u
                                        .on("mouseenter", function () {
                                            p.pause();
                                        })
                                        .on("mouseleave", function () {
                                            p.resume();
                                        })
                                        .on("touchstart", function (t) {
                                            p.pause(), t.stopPropagation();
                                        })
                                        .on("mousedown", function () {
                                            t(this).addClass("focus");
                                        })
                                        .on("mouseup", function () {
                                            p.close(t(this).index());
                                        }),
                                    t("body").on("touchstart", function () {
                                        p.resume();
                                    }),
                                    o.push(u),
                                    a.push(h.delay),
                                    a.length > 1 || (r = setInterval(l, 200)),
                                    s && s(u);
                            });
                    },
                    close: function (t) {
                        var e = void 0 === t ? 0 : t,
                            i = o.splice(e, 1)[0];
                        a.splice(e, 1)[0],
                            (n -= i[0].offsetHeight + this.space),
                            i.removeClass("active"),
                            setTimeout(function () {
                                i.remove();
                            }, 300),
                            o.forEach(function (t, i) {
                                i >= e && t.hasClass("active") && t.stop(!0, !0).animate({ top: parseInt(t.css("top")) + t[0].offsetHeight + 20 }, 600, "easeOutQuint");
                            }),
                            o.length || clearTimeout(r);
                    },
                    pause: function () {
                        s = !0;
                    },
                    resume: function () {
                        s = !1;
                    },
                }));
        var d = function (t, e) {
            return t.replace(/\{\{(\w+)\}\}/g, function () {
                return e[arguments[1]];
            });
        };
        jQuery(document).ready(function () {
            c.init(),
                setTimeout(() => {
                    c.appearAnimate(), c.scrollBtnAppear();
                }, 500);
        }),
            t(window).on("load", function () {
                t("body").addClass("loaded");
            }),
            t(window).on("scroll", function () {
                c.scrollBtnAppear();
            });
    })(jQuery);
