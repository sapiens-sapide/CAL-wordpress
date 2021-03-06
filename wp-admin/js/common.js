var showNotice, adminMenu, columns, validateForm, screenMeta, autofold_menu;
(function (a) {
    adminMenu = {init:function () {
    }, fold:function () {
    }, restoreMenuState:function () {
    }, toggle:function () {
    }, favorites:function () {
    }};
    columns = {init:function () {
        var b = this;
        a(".hide-column-tog", "#adv-settings").click(function () {
            var d = a(this), c = d.val();
            if (d.prop("checked")) {
                b.checked(c)
            }
            else {
                b.unchecked(c)
            }
            columns.saveManageColumnsState()
        })
    }, saveManageColumnsState:function () {
        var b = this.hidden();
        a.post(ajaxurl, {action:"hidden-columns", hidden:b, screenoptionnonce:a("#screenoptionnonce").val(), page:pagenow})
    }, checked:function (b) {
        a(".column-" + b).show();
        this.colSpanChange(+1)
    }, unchecked:function (b) {
        a(".column-" + b).hide();
        this.colSpanChange(-1)
    }, hidden:function () {
        return a(".manage-column").filter(":hidden").map(
                function () {
                    return this.id
                }).get().join(",")
    }, useCheckboxesForHidden:function () {
        this.hidden = function () {
            return a(".hide-column-tog").not(":checked").map(
                    function () {
                        var b = this.id;
                        return b.substring(b, b.length - 5)
                    }).get().join(",")
        }
    }, colSpanChange:function (b) {
        var d = a("table").find(".colspanchange"), c;
        if (!d.length) {
            return
        }
        c = parseInt(d.attr("colspan"), 10) + b;
        d.attr("colspan", c.toString())
    }};
    a(document).ready(function () {
        columns.init()
    });
    validateForm = function (b) {
        return !a(b).find(".form-required").filter(
                function () {
                    return a("input:visible", this).val() == ""
                }).addClass("form-invalid").find("input:visible").change(
                function () {
                    a(this).closest(".form-invalid").removeClass("form-invalid")
                }).size()
    };
    showNotice = {warn:function () {
        var b = commonL10n.warnDelete || "";
        if (confirm(b)) {
            return true
        }
        return false
    }, note:function (b) {
        alert(b)
    }};
    screenMeta = {element:null, toggles:null, page:null, init:function () {
        this.element = a("#screen-meta");
        this.toggles = a(".screen-meta-toggle a");
        this.page = a("#wpcontent");
        this.toggles.click(this.toggleEvent)
    }, toggleEvent:function (c) {
        var b = a(this.href.replace(/.+#/, "#"));
        c.preventDefault();
        if (!b.length) {
            return
        }
        if (b.is(":visible")) {
            screenMeta.close(b, a(this))
        }
        else {
            screenMeta.open(b, a(this))
        }
    }, open:function (b, c) {
        a(".screen-meta-toggle").not(c.parent()).css("visibility", "hidden");
        b.parent().show();
        b.slideDown("fast", function () {
            c.addClass("screen-meta-active")
        })
    }, close:function (b, c) {
        b.slideUp("fast", function () {
            c.removeClass("screen-meta-active");
            a(".screen-meta-toggle").css("visibility", "");
            b.parent().hide()
        })
    }};
    a(".contextual-help-tabs").delegate("a", "click focus", function (d) {
        var c = a(this), b;
        d.preventDefault();
        if (c.is(".active a")) {
            return false
        }
        a(".contextual-help-tabs .active").removeClass("active");
        c.parent("li").addClass("active");
        b = a(c.attr("href"));
        a(".help-tab-content").not(b).removeClass("active").hide();
        b.addClass("active").show()
    });
    a(document).ready(function () {
        var j = false, c, e, k, i, b = a("#adminmenu"), d = a("input.current-page"), f = d.val(), h, g;
        g = function (l, n) {
            var o = a(n), m = o.attr("tabindex");
            if (m) {
                o.attr("tabindex", "0").attr("tabindex", m)
            }
        };
        a("#collapse-menu", b).click(function () {
            var l = a(document.body);
            if (l.hasClass("folded")) {
                l.removeClass("folded");
                setUserSetting("mfold", "o")
            }
            else {
                l.addClass("folded");
                setUserSetting("mfold", "f")
            }
            return false
        });
        a("li.wp-has-submenu", b).hoverIntent({over:function (t) {
            var u, r, l, s, n = a(this).find(".wp-submenu"), v, p, q;
            if (!a(document.body).hasClass("folded") && a(this).hasClass("wp-menu-open")) {
                return
            }
            v = a(this).offset().top;
            p = a(window).scrollTop();
            q = v - p - 30;
            u = v + n.height() + 1;
            r = a("#wpwrap").height();
            l = 60 + u - r;
            s = a(window).height() + p - 15;
            if (s < (u - l)) {
                l = u - s
            }
            if (l > q) {
                l = q
            }
            if (l > 1) {
                n.css({marginTop:"-" + l + "px"})
            }
            else {
                if (n.css("marginTop")) {
                    n.css({marginTop:""})
                }
            }
            b.find(".wp-submenu").removeClass("sub-open");
            n.addClass("sub-open")
        }, out:function () {
            a(this).find(".wp-submenu").removeClass("sub-open")
        }, timeout:200, sensitivity:7, interval:90});
        a("li.wp-has-submenu > a.wp-not-current-submenu", b).bind("keydown.adminmenu",
                function (m) {
                    if (m.which != 13) {
                        return
                    }
                    var l = a(m.target);
                    m.stopPropagation();
                    m.preventDefault();
                    b.find(".wp-submenu").removeClass("sub-open");
                    l.siblings(".wp-submenu").toggleClass("sub-open").find('a[role="menuitem"]').each(g)
                }).each(g);
        a('a[role="menuitem"]', b).bind("keydown.adminmenu", function (m) {
            if (m.which != 27) {
                return
            }
            var l = a(m.target);
            m.stopPropagation();
            m.preventDefault();
            l.add(l.siblings()).closest(".sub-open").removeClass("sub-open").siblings("a.wp-not-current-submenu").focus()
        });
        a("div.wrap h2:first").nextAll("div.updated, div.error").addClass("below-h2");
        a("div.updated, div.error").not(".below-h2, .inline").insertAfter(a("div.wrap h2:first"));
        screenMeta.init();
        a("tbody").children().children(".check-column").find(":checkbox").click(function (l) {
            if ("undefined" == l.shiftKey) {
                return true
            }
            if (l.shiftKey) {
                if (!j) {
                    return true
                }
                c = a(j).closest("form").find(":checkbox");
                e = c.index(j);
                k = c.index(this);
                i = a(this).prop("checked");
                if (0 < e && 0 < k && e != k) {
                    c.slice(e, k).prop("checked", function () {
                        if (a(this).closest("tr").is(":visible")) {
                            return i
                        }
                        return false
                    })
                }
            }
            j = this;
            return true
        });
        a("thead, tfoot").find(".check-column :checkbox").click(function (n) {
            var o = a(this).prop("checked"), m = "undefined" == typeof toggleWithKeyboard ? false : toggleWithKeyboard, l = n.shiftKey || m;
            a(this).closest("table").children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked", function () {
                if (a(this).closest("tr").is(":hidden")) {
                    return false
                }
                if (l) {
                    return a(this).prop("checked")
                }
                else {
                    if (o) {
                        return true
                    }
                }
                return false
            });
            a(this).closest("table").children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked", function () {
                if (l) {
                    return false
                }
                else {
                    if (o) {
                        return true
                    }
                }
                return false
            })
        });
        a("#default-password-nag-no").click(function () {
            setUserSetting("default_password_nag", "hide");
            a("div.default-password-nag").hide();
            return false
        });
        a("#newcontent").bind("keydown.wpevent_InsertTab", function (q) {
            if (q.keyCode != 9) {
                return true
            }
            var n = q.target, s = n.selectionStart, m = n.selectionEnd, r = n.value, l, p;
            try {
                this.lastKey = 9
            } catch (o) {
            }
            if (document.selection) {
                n.focus();
                p = document.selection.createRange();
                p.text = "\t"
            }
            else {
                if (s >= 0) {
                    l = this.scrollTop;
                    n.value = r.substring(0, s).concat("\t", r.substring(m));
                    n.selectionStart = n.selectionEnd = s + 1;
                    this.scrollTop = l
                }
            }
            if (q.stopPropagation) {
                q.stopPropagation()
            }
            if (q.preventDefault) {
                q.preventDefault()
            }
        });
        a("#newcontent").bind("blur.wpevent_InsertTab", function (l) {
            if (this.lastKey && 9 == this.lastKey) {
                this.focus()
            }
        });
        if (d.length) {
            d.closest("form").submit(function (l) {
                if (a('select[name="action"]').val() == -1 && a('select[name="action2"]').val() == -1 && d.val() == f) {
                    d.val("1")
                }
            })
        }
        a(window).bind("resize.autofold",
                function () {
                    if (getUserSetting("mfold") == "f") {
                        return
                    }
                    var l = a(window).width();
                    if (l <= 800) {
                        if (!h) {
                            a(document.body).addClass("folded");
                            h = true
                        }
                    }
                    else {
                        if (h) {
                            a(document.body).removeClass("folded");
                            h = false
                        }
                    }
                }).triggerHandler("resize")
    });
    a(document).bind("wp_CloseOnEscape", function (c, b) {
        if (typeof(b.cb) != "function") {
            return
        }
        if (typeof(b.condition) != "function" || b.condition()) {
            b.cb()
        }
        return true
    })
})(jQuery);