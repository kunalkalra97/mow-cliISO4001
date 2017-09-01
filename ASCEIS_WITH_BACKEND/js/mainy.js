/* * OPAL - Exclusive Coming Soon Template
 *
 * This is a premium product available exclusively at this address http://themeforest.net/user/madeon08/portfolio
 *
 * The demo files are minified/crypted for copyright reasons, you will find them, expanded, commented and coded accurately in your download pack.
 *
 * Thanks for your support!
 *
 * */
$(document).ready(function ($) {
    var e = jQuery("#bgndVideo").YTPlayer();
    $("a.expand-player").click(function () {
        $(".full-play").addClass("display-none"), $(".comp-play").removeClass("display-none")
    }), $("a.compress-player").click(function () {
        $(".full-play").removeClass("display-none"), $(".comp-play").addClass("display-none")
    });
    var t = !1;
    /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) && (t = !0), t === !1 ? ($(".player").mb_YTPlayer(), e.on("YTPReady", function () {
        setTimeout(function () {
            $("#loading").addClass("animated-middle slideOutUp").removeClass("opacity-0")
        }, 200), setTimeout(function () {
            $("#home").addClass("animated-middle fadeInUp").removeClass("opacity-0")
        }, 0), setTimeout(function () {
            setTimeout(function () {
                $(".text-intro").each(function (e) {
                    ! function (t) {
                        setTimeout(function () {
                            $(t).addClass("animated-middle fadeInUp").removeClass("opacity-0")
                        }, 150 * e + 150)
                    }(this)
                })
            }, 0)
        }, 200), setTimeout(function () {
            $("#home").removeClass("animated-middle fadeInUp")
        }, 1201)
    })) : ($(window).load(function () {
        "use strict";
        setTimeout(function () {
            $("#loading").addClass("animated-middle slideOutUp").removeClass("opacity-0")
        }, 1e3), setTimeout(function () {
            $("#home").addClass("animated-middle fadeInUp").removeClass("opacity-0"), $("body").vegas({
                slides: [{
                    src: "img/slide-1.jpg"
                }, {
                    src: "img/slide-2.jpg"
                }, {
                    src: "img/slide-3.jpg"
                }]
                , delay: 5e3
                , transition: "fade"
            })
        }, 800), setTimeout(function () {
            setTimeout(function () {
                $(".text-intro").each(function (e) {
                    ! function (t) {
                        setTimeout(function () {
                            $(t).addClass("animated-middle fadeInUp").removeClass("opacity-0")
                        }, 150 * e + 150)
                    }(this)
                })
            }, 0)
        }, 1e3), setTimeout(function () {
            $("#home").removeClass("animated-middle fadeInUp")
        }, 2001)
    }), $("#player-nav").addClass("display-none").removeClass(""))
}), equalheight = function (e) {
    var t = 0
        , i = 0
        , n = new Array
        , o, a = 0;
    $(e).each(function () {
        if (o = $(this), $(o).height("auto"), topPostion = o.position().top, i != topPostion) {
            for (currentDiv = 0; currentDiv < n.length; currentDiv++) n[currentDiv].height(t);
            n.length = 0, i = topPostion, t = o.height(), n.push(o)
        }
        else n.push(o), t = t < o.height() ? o.height() : t;
        for (currentDiv = 0; currentDiv < n.length; currentDiv++) n[currentDiv].height(t)
    })
}, $(window).load(function () {
    equalheight(".equalizer")
}), $(window).resize(function () {
    equalheight(".equalizer")
}), $(document).ready(function () {
    "use strict";

    function e() {
        t ? ($("body").addClass("scroll-touch"), $("a#open-more-info").on("click", function () {
            event.preventDefault();
            var e = "#" + this.getAttribute("data-target");
            $("body").animate({
                scrollTop: $(e).offset().top
            }, 500)
        })) : $("body").mCustomScrollbar({
            scrollInertia: 150
            , axis: "y"
        })
    }
    $("a#open-more-info").on("click", function () {
        $(".layer-left").toggleClass("hide-layer-left"), $("#home").toggleClass("minimize-left"), $("#right-side").toggleClass("hide-right"), $(".border-right-side").toggleClass("hide-border"), $("#close-more-info").toggleClass("hide-close"), $(".mCSB_scrollTools").toggleClass("mCSB_scrollTools-left"), setTimeout(function () {
            $("#mcs_container").mCustomScrollbar("scrollTo", "#right-side", {
                scrollInertia: 500
                , callbacks: !1
            })
        }, 350)
    }), $(".close-right-part").on("click", function () {
        $(".layer-left").addClass("hide-layer-left"), $("#right-side").addClass("hide-right"), $("#home").removeClass("minimize-left"), $(".border-right-side").addClass("hide-border"), $("#close-more-info").addClass("hide-close"), $(".mCSB_scrollTools").removeClass("mCSB_scrollTools-left"), setTimeout(function () {
            $("#mcs_container").mCustomScrollbar("scrollTo", "#right-side", {
                scrollInertia: 500
                , callbacks: !1
            })
        }, 350)
    }), $(".expand-player").on("click", function () {
        $(".global-overlay").fadeOut(), $(".text-intro").each(function (e) {
            ! function (t) {
                setTimeout(function () {
                    $(t).addClass("fadeOutDown").removeClass("fadeInUp")
                }, 150 * e + 150)
            }(this)
        })
    }), $(".compress-player").on("click", function () {
        $(".global-overlay").fadeIn(), $(".text-intro").each(function (e) {
            ! function (t) {
                setTimeout(function () {
                    $(t).addClass("fadeInUp").removeClass("fadeOutDown")
                }, 150 * e + 150)
            }(this)
        })
    }), $(function () {
        $("body").bind("mousewheel", function (e) {
            e.preventDefault();
            var t = this.scrollTop;
            this.scrollTop = t + e.deltaY * e.deltaFactor * -1
        })
    });
    var t = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);
    e(), window.matchMedia("(min-width: 1025px)").matches && $(function () {
            $("[data-toggle='tooltip']").tooltip()
        }), $("#notifyMe").notifyMe()
        , function () {
            var e = document.querySelector("[data-dialog]")
                , t = document.getElementById(e.getAttribute("data-dialog"))
                , i = new DialogFx(t);
            e.addEventListener("click", i.toggle.bind(i))
        }();
    var i = function (e) {
        for (var t = function (e) {
                for (var t = e.childNodes, i = t.length, n = [], o, a, l, r, s = 0; i > s; s++) o = t[s], 1 === o.nodeType && (a = o.children[0], l = a.getAttribute("data-size").split("x"), r = {
                    src: a.getAttribute("href")
                    , w: parseInt(l[0], 10)
                    , h: parseInt(l[1], 10)
                }, o.children.length > 1 && (r.title = o.children[1].innerHTML), a.children.length > 0 && (r.msrc = a.children[0].getAttribute("src")), r.el = o, n.push(r));
                return n
            }, i = function c(e, t) {
                return e && (t(e) ? e : c(e.parentNode, t))
            }, n = function (e) {
                e = e || window.event, e.preventDefault ? e.preventDefault() : e.returnValue = !1;
                var t = e.target || e.srcElement
                    , n = i(t, function (e) {
                        return e.tagName && "FIGURE" === e.tagName.toUpperCase()
                    });
                if (n) {
                    for (var o = n.parentNode, l = n.parentNode.childNodes, r = l.length, s = 0, d, c = 0; r > c; c++)
                        if (1 === l[c].nodeType) {
                            if (l[c] === n) {
                                d = s;
                                break
                            }
                            s++
                        }
                    return d >= 0 && a(d, o), !1
                }
            }, o = function () {
                var e = window.location.hash.substring(1)
                    , t = {};
                if (e.length < 5) return t;
                for (var i = e.split("&"), n = 0; n < i.length; n++)
                    if (i[n]) {
                        var o = i[n].split("=");
                        o.length < 2 || (t[o[0]] = o[1])
                    }
                return t.gid && (t.gid = parseInt(t.gid, 10)), t
            }, a = function (e, i, n, o) {
                var a = document.querySelectorAll(".pswp")[0]
                    , l, r, s;
                if (s = t(i), r = {
                        galleryUID: i.getAttribute("data-pswp-uid")
                        , getThumbBoundsFn: function (e) {
                            var t = s[e].el.getElementsByTagName("img")[0]
                                , i = window.pageYOffset || document.documentElement.scrollTop
                                , n = t.getBoundingClientRect();
                            return {
                                x: n.left
                                , y: n.top + i
                                , w: n.width
                            }
                        }
                    }, o)
                    if (r.galleryPIDs) {
                        for (var d = 0; d < s.length; d++)
                            if (s[d].pid === e) {
                                r.index = d;
                                break
                            }
                    }
                    else r.index = parseInt(e, 10) - 1;
                else r.index = parseInt(e, 10);
                isNaN(r.index) || (n && (r.showAnimationDuration = 0), l = new PhotoSwipe(a, PhotoSwipeUI_Default, s, r), l.init())
            }, l = document.querySelectorAll(e), r = 0, s = l.length; s > r; r++) l[r].setAttribute("data-pswp-uid", r + 1), l[r].onclick = n;
        var d = o();
        d.pid && d.gid && a(d.pid, l[d.gid - 1], !0, !0)
    };
    i(".my-gallery")
});