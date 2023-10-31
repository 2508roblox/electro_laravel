(() => {
    var e = {
            802: e => {
                var n = {
                    exports: {}
                };

                function t(e) {
                    return e instanceof Map ? e.clear = e.delete = e.set = function() {
                        throw new Error("map is read-only")
                    } : e instanceof Set && (e.add = e.clear = e.delete = function() {
                        throw new Error("set is read-only")
                    }), Object.freeze(e), Object.getOwnPropertyNames(e).forEach((function(n) {
                        var i = e[n];
                        "object" != typeof i || Object.isFrozen(i) || t(i)
                    })), e
                }
                n.exports = t, n.exports.default = t;
                var i = n.exports;
                class a {
                    constructor(e) {
                        void 0 === e.data && (e.data = {}), this.data = e.data, this.isMatchIgnored = !1
                    }
                    ignoreMatch() {
                        this.isMatchIgnored = !0
                    }
                }

                function r(e) {
                    return e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#x27;")
                }

                function o(e, ...n) {
                    const t = Object.create(null);
                    for (const n in e) t[n] = e[n];
                    return n.forEach((function(e) {
                        for (const n in e) t[n] = e[n]
                    })), t
                }
                const s = e => !!e.kind;
                class c {
                    constructor(e, n) {
                        this.buffer = "", this.classPrefix = n.classPrefix, e.walk(this)
                    }
                    addText(e) {
                        this.buffer += r(e)
                    }
                    openNode(e) {
                        if (!s(e)) return;
                        let n = e.kind;
                        n = e.sublanguage ? `language-${n}` : ((e, {
                            prefix: n
                        }) => {
                            if (e.includes(".")) {
                                const t = e.split(".");
                                return [`${n}${t.shift()}`, ...t.map(((e, n) => `${e}${"_".repeat(n+1)}`))].join(" ")
                            }
                            return `${n}${e}`
                        })(n, {
                            prefix: this.classPrefix
                        }), this.span(n)
                    }
                    closeNode(e) {
                        s(e) && (this.buffer += "</span>")
                    }
                    value() {
                        return this.buffer
                    }
                    span(e) {
                        this.buffer += `<span class="${e}">`
                    }
                }
                class l {
                    constructor() {
                        this.rootNode = {
                            children: []
                        }, this.stack = [this.rootNode]
                    }
                    get top() {
                        return this.stack[this.stack.length - 1]
                    }
                    get root() {
                        return this.rootNode
                    }
                    add(e) {
                        this.top.children.push(e)
                    }
                    openNode(e) {
                        const n = {
                            kind: e,
                            children: []
                        };
                        this.add(n), this.stack.push(n)
                    }
                    closeNode() {
                        if (this.stack.length > 1) return this.stack.pop()
                    }
                    closeAllNodes() {
                        for (; this.closeNode(););
                    }
                    toJSON() {
                        return JSON.stringify(this.rootNode, null, 4)
                    }
                    walk(e) {
                        return this.constructor._walk(e, this.rootNode)
                    }
                    static _walk(e, n) {
                        return "string" == typeof n ? e.addText(n) : n.children && (e.openNode(n), n.children.forEach((n => this._walk(e, n))), e.closeNode(n)), e
                    }
                    static _collapse(e) {
                        "string" != typeof e && e.children && (e.children.every((e => "string" == typeof e)) ? e.children = [e.children.join("")] : e.children.forEach((e => {
                            l._collapse(e)
                        })))
                    }
                }
                class d extends l {
                    constructor(e) {
                        super(), this.options = e
                    }
                    addKeyword(e, n) {
                        "" !== e && (this.openNode(n), this.addText(e), this.closeNode())
                    }
                    addText(e) {
                        "" !== e && this.add(e)
                    }
                    addSublanguage(e, n) {
                        const t = e.root;
                        t.kind = n, t.sublanguage = !0, this.add(t)
                    }
                    toHTML() {
                        return new c(this, this.options).value()
                    }
                    finalize() {
                        return !0
                    }
                }

                function g(e) {
                    return e ? "string" == typeof e ? e : e.source : null
                }

                function u(...e) {
                    return e.map((e => g(e))).join("")
                }

                function h(...e) {
                    return "(" + (function(e) {
                        const n = e[e.length - 1];
                        return "object" == typeof n && n.constructor === Object ? (e.splice(e.length - 1, 1), n) : {}
                    }(e).capture ? "" : "?:") + e.map((e => g(e))).join("|") + ")"
                }

                function b(e) {
                    return new RegExp(e.toString() + "|").exec("").length - 1
                }
                const f = /\[(?:[^\\\]]|\\.)*\]|\(\??|\\([1-9][0-9]*)|\\./;

                function p(e, {
                    joinWith: n
                }) {
                    let t = 0;
                    return e.map((e => {
                        t += 1;
                        const n = t;
                        let i = g(e),
                            a = "";
                        for (; i.length > 0;) {
                            const e = f.exec(i);
                            if (!e) {
                                a += i;
                                break
                            }
                            a += i.substring(0, e.index), i = i.substring(e.index + e[0].length), "\\" === e[0][0] && e[1] ? a += "\\" + String(Number(e[1]) + n) : (a += e[0], "(" === e[0] && t++)
                        }
                        return a
                    })).map((e => `(${e})`)).join(n)
                }
                const m = "[a-zA-Z]\\w*",
                    y = "[a-zA-Z_]\\w*",
                    E = "\\b\\d+(\\.\\d+)?",
                    w = "(-?)(\\b0[xX][a-fA-F0-9]+|(\\b\\d+(\\.\\d*)?|\\.\\d+)([eE][-+]?\\d+)?)",
                    _ = "\\b(0b[01]+)",
                    x = {
                        begin: "\\\\[\\s\\S]",
                        relevance: 0
                    },
                    v = {
                        scope: "string",
                        begin: "'",
                        end: "'",
                        illegal: "\\n",
                        contains: [x]
                    },
                    N = {
                        scope: "string",
                        begin: '"',
                        end: '"',
                        illegal: "\\n",
                        contains: [x]
                    },
                    O = function(e, n, t = {}) {
                        const i = o({
                            scope: "comment",
                            begin: e,
                            end: n,
                            contains: []
                        }, t);
                        i.contains.push({
                            scope: "doctag",
                            begin: "[ ]*(?=(TODO|FIXME|NOTE|BUG|OPTIMIZE|HACK|XXX):)",
                            end: /(TODO|FIXME|NOTE|BUG|OPTIMIZE|HACK|XXX):/,
                            excludeBegin: !0,
                            relevance: 0
                        });
                        const a = h("I", "a", "is", "so", "us", "to", "at", "if", "in", "it", "on", /[A-Za-z]+['](d|ve|re|ll|t|s|n)/, /[A-Za-z]+[-][a-z]+/, /[A-Za-z][a-z]{2,}/);
                        return i.contains.push({
                            begin: u(/[ ]+/, "(", a, /[.]?[:]?([.][ ]|[ ])/, "){3}")
                        }), i
                    },
                    k = O("//", "$"),
                    A = O("/\\*", "\\*/"),
                    S = O("#", "$"),
                    M = {
                        scope: "number",
                        begin: E,
                        relevance: 0
                    },
                    R = {
                        scope: "number",
                        begin: w,
                        relevance: 0
                    },
                    T = {
                        scope: "number",
                        begin: _,
                        relevance: 0
                    },
                    I = {
                        begin: /(?=\/[^/\n]*\/)/,
                        contains: [{
                            scope: "regexp",
                            begin: /\//,
                            end: /\/[gimuy]*/,
                            illegal: /\n/,
                            contains: [x, {
                                begin: /\[/,
                                end: /\]/,
                                relevance: 0,
                                contains: [x]
                            }]
                        }]
                    },
                    j = {
                        scope: "title",
                        begin: m,
                        relevance: 0
                    },
                    B = {
                        scope: "title",
                        begin: y,
                        relevance: 0
                    };
                var C = Object.freeze({
                    __proto__: null,
                    MATCH_NOTHING_RE: /\b\B/,
                    IDENT_RE: m,
                    UNDERSCORE_IDENT_RE: y,
                    NUMBER_RE: E,
                    C_NUMBER_RE: w,
                    BINARY_NUMBER_RE: _,
                    RE_STARTERS_RE: "!|!=|!==|%|%=|&|&&|&=|\\*|\\*=|\\+|\\+=|,|-|-=|/=|/|:|;|<<|<<=|<=|<|===|==|=|>>>=|>>=|>=|>>>|>>|>|\\?|\\[|\\{|\\(|\\^|\\^=|\\||\\|=|\\|\\||~",
                    SHEBANG: (e = {}) => {
                        const n = /^#![ ]*\//;
                        return e.binary && (e.begin = u(n, /.*\b/, e.binary, /\b.*/)), o({
                            scope: "meta",
                            begin: n,
                            end: /$/,
                            relevance: 0,
                            "on:begin": (e, n) => {
                                0 !== e.index && n.ignoreMatch()
                            }
                        }, e)
                    },
                    BACKSLASH_ESCAPE: x,
                    APOS_STRING_MODE: v,
                    QUOTE_STRING_MODE: N,
                    PHRASAL_WORDS_MODE: {
                        begin: /\b(a|an|the|are|I'm|isn't|don't|doesn't|won't|but|just|should|pretty|simply|enough|gonna|going|wtf|so|such|will|you|your|they|like|more)\b/
                    },
                    COMMENT: O,
                    C_LINE_COMMENT_MODE: k,
                    C_BLOCK_COMMENT_MODE: A,
                    HASH_COMMENT_MODE: S,
                    NUMBER_MODE: M,
                    C_NUMBER_MODE: R,
                    BINARY_NUMBER_MODE: T,
                    REGEXP_MODE: I,
                    TITLE_MODE: j,
                    UNDERSCORE_TITLE_MODE: B,
                    METHOD_GUARD: {
                        begin: "\\.\\s*[a-zA-Z_]\\w*",
                        relevance: 0
                    },
                    END_SAME_AS_BEGIN: function(e) {
                        return Object.assign(e, {
                            "on:begin": (e, n) => {
                                n.data._beginMatch = e[1]
                            },
                            "on:end": (e, n) => {
                                n.data._beginMatch !== e[1] && n.ignoreMatch()
                            }
                        })
                    }
                });

                function L(e, n) {
                    "." === e.input[e.index - 1] && n.ignoreMatch()
                }

                function D(e, n) {
                    void 0 !== e.className && (e.scope = e.className, delete e.className)
                }

                function P(e, n) {
                    n && e.beginKeywords && (e.begin = "\\b(" + e.beginKeywords.split(" ").join("|") + ")(?!\\.)(?=\\b|\\s)", e.__beforeBegin = L, e.keywords = e.keywords || e.beginKeywords, delete e.beginKeywords, void 0 === e.relevance && (e.relevance = 0))
                }

                function z(e, n) {
                    Array.isArray(e.illegal) && (e.illegal = h(...e.illegal))
                }

                function $(e, n) {
                    if (e.match) {
                        if (e.begin || e.end) throw new Error("begin & end are not supported with match");
                        e.begin = e.match, delete e.match
                    }
                }

                function U(e, n) {
                    void 0 === e.relevance && (e.relevance = 1)
                }
                const H = (e, n) => {
                        if (!e.beforeMatch) return;
                        if (e.starts) throw new Error("beforeMatch cannot be used with starts");
                        const t = Object.assign({}, e);
                        Object.keys(e).forEach((n => {
                            delete e[n]
                        })), e.keywords = t.keywords, e.begin = u(t.beforeMatch, u("(?=", t.begin, ")")), e.starts = {
                            relevance: 0,
                            contains: [Object.assign(t, {
                                endsParent: !0
                            })]
                        }, e.relevance = 0, delete t.beforeMatch
                    },
                    Z = ["of", "and", "for", "in", "not", "or", "if", "then", "parent", "list", "value"];

                function G(e, n, t = "keyword") {
                    const i = Object.create(null);
                    return "string" == typeof e ? a(t, e.split(" ")) : Array.isArray(e) ? a(t, e) : Object.keys(e).forEach((function(t) {
                        Object.assign(i, G(e[t], n, t))
                    })), i;

                    function a(e, t) {
                        n && (t = t.map((e => e.toLowerCase()))), t.forEach((function(n) {
                            const t = n.split("|");
                            i[t[0]] = [e, K(t[0], t[1])]
                        }))
                    }
                }

                function K(e, n) {
                    return n ? Number(n) : function(e) {
                        return Z.includes(e.toLowerCase())
                    }(e) ? 0 : 1
                }
                const F = {},
                    W = e => {
                        console.error(e)
                    },
                    X = (e, ...n) => {
                        console.log(`WARN: ${e}`, ...n)
                    },
                    q = (e, n) => {
                        F[`${e}/${n}`] || (console.log(`Deprecated as of ${e}. ${n}`), F[`${e}/${n}`] = !0)
                    },
                    Q = new Error;

                function V(e, n, {
                    key: t
                }) {
                    let i = 0;
                    const a = e[t],
                        r = {},
                        o = {};
                    for (let e = 1; e <= n.length; e++) o[e + i] = a[e], r[e + i] = !0, i += b(n[e - 1]);
                    e[t] = o, e[t]._emit = r, e[t]._multi = !0
                }

                function J(e) {
                    ! function(e) {
                        e.scope && "object" == typeof e.scope && null !== e.scope && (e.beginScope = e.scope, delete e.scope)
                    }(e), "string" == typeof e.beginScope && (e.beginScope = {
                            _wrap: e.beginScope
                        }), "string" == typeof e.endScope && (e.endScope = {
                            _wrap: e.endScope
                        }),
                        function(e) {
                            if (Array.isArray(e.begin)) {
                                if (e.skip || e.excludeBegin || e.returnBegin) throw W("skip, excludeBegin, returnBegin not compatible with beginScope: {}"), Q;
                                if ("object" != typeof e.beginScope || null === e.beginScope) throw W("beginScope must be object"), Q;
                                V(e, e.begin, {
                                    key: "beginScope"
                                }), e.begin = p(e.begin, {
                                    joinWith: ""
                                })
                            }
                        }(e),
                        function(e) {
                            if (Array.isArray(e.end)) {
                                if (e.skip || e.excludeEnd || e.returnEnd) throw W("skip, excludeEnd, returnEnd not compatible with endScope: {}"), Q;
                                if ("object" != typeof e.endScope || null === e.endScope) throw W("endScope must be object"), Q;
                                V(e, e.end, {
                                    key: "endScope"
                                }), e.end = p(e.end, {
                                    joinWith: ""
                                })
                            }
                        }(e)
                }

                function Y(e) {
                    function n(n, t) {
                        return new RegExp(g(n), "m" + (e.case_insensitive ? "i" : "") + (t ? "g" : ""))
                    }
                    class t {
                        constructor() {
                            this.matchIndexes = {}, this.regexes = [], this.matchAt = 1, this.position = 0
                        }
                        addRule(e, n) {
                            n.position = this.position++, this.matchIndexes[this.matchAt] = n, this.regexes.push([n, e]), this.matchAt += b(e) + 1
                        }
                        compile() {
                            0 === this.regexes.length && (this.exec = () => null);
                            const e = this.regexes.map((e => e[1]));
                            this.matcherRe = n(p(e, {
                                joinWith: "|"
                            }), !0), this.lastIndex = 0
                        }
                        exec(e) {
                            this.matcherRe.lastIndex = this.lastIndex;
                            const n = this.matcherRe.exec(e);
                            if (!n) return null;
                            const t = n.findIndex(((e, n) => n > 0 && void 0 !== e)),
                                i = this.matchIndexes[t];
                            return n.splice(0, t), Object.assign(n, i)
                        }
                    }
                    class i {
                        constructor() {
                            this.rules = [], this.multiRegexes = [], this.count = 0, this.lastIndex = 0, this.regexIndex = 0
                        }
                        getMatcher(e) {
                            if (this.multiRegexes[e]) return this.multiRegexes[e];
                            const n = new t;
                            return this.rules.slice(e).forEach((([e, t]) => n.addRule(e, t))), n.compile(), this.multiRegexes[e] = n, n
                        }
                        resumingScanAtSamePosition() {
                            return 0 !== this.regexIndex
                        }
                        considerAll() {
                            this.regexIndex = 0
                        }
                        addRule(e, n) {
                            this.rules.push([e, n]), "begin" === n.type && this.count++
                        }
                        exec(e) {
                            const n = this.getMatcher(this.regexIndex);
                            n.lastIndex = this.lastIndex;
                            let t = n.exec(e);
                            if (this.resumingScanAtSamePosition())
                                if (t && t.index === this.lastIndex);
                                else {
                                    const n = this.getMatcher(0);
                                    n.lastIndex = this.lastIndex + 1, t = n.exec(e)
                                }
                            return t && (this.regexIndex += t.position + 1, this.regexIndex === this.count && this.considerAll()), t
                        }
                    }
                    if (e.compilerExtensions || (e.compilerExtensions = []), e.contains && e.contains.includes("self")) throw new Error("ERR: contains `self` is not supported at the top-level of a language.  See documentation.");
                    return e.classNameAliases = o(e.classNameAliases || {}),
                        function t(a, r) {
                            const s = a;
                            if (a.isCompiled) return s;
                            [D, $, J, H].forEach((e => e(a, r))), e.compilerExtensions.forEach((e => e(a, r))), a.__beforeBegin = null, [P, z, U].forEach((e => e(a, r))), a.isCompiled = !0;
                            let c = null;
                            return "object" == typeof a.keywords && a.keywords.$pattern && (a.keywords = Object.assign({}, a.keywords), c = a.keywords.$pattern, delete a.keywords.$pattern), c = c || /\w+/, a.keywords && (a.keywords = G(a.keywords, e.case_insensitive)), s.keywordPatternRe = n(c, !0), r && (a.begin || (a.begin = /\B|\b/), s.beginRe = n(a.begin), a.end || a.endsWithParent || (a.end = /\B|\b/), a.end && (s.endRe = n(a.end)), s.terminatorEnd = g(a.end) || "", a.endsWithParent && r.terminatorEnd && (s.terminatorEnd += (a.end ? "|" : "") + r.terminatorEnd)), a.illegal && (s.illegalRe = n(a.illegal)), a.contains || (a.contains = []), a.contains = [].concat(...a.contains.map((function(e) {
                                return function(e) {
                                    return e.variants && !e.cachedVariants && (e.cachedVariants = e.variants.map((function(n) {
                                        return o(e, {
                                            variants: null
                                        }, n)
                                    }))), e.cachedVariants ? e.cachedVariants : ee(e) ? o(e, {
                                        starts: e.starts ? o(e.starts) : null
                                    }) : Object.isFrozen(e) ? o(e) : e
                                }("self" === e ? a : e)
                            }))), a.contains.forEach((function(e) {
                                t(e, s)
                            })), a.starts && t(a.starts, r), s.matcher = function(e) {
                                const n = new i;
                                return e.contains.forEach((e => n.addRule(e.begin, {
                                    rule: e,
                                    type: "begin"
                                }))), e.terminatorEnd && n.addRule(e.terminatorEnd, {
                                    type: "end"
                                }), e.illegal && n.addRule(e.illegal, {
                                    type: "illegal"
                                }), n
                            }(s), s
                        }(e)
                }

                function ee(e) {
                    return !!e && (e.endsWithParent || ee(e.starts))
                }
                const ne = r,
                    te = o,
                    ie = Symbol("nomatch");
                var ae = function(e) {
                    const n = Object.create(null),
                        t = Object.create(null),
                        r = [];
                    let o = !0;
                    const s = "Could not find the language '{}', did you forget to load/include a language module?",
                        c = {
                            disableAutodetect: !0,
                            name: "Plain text",
                            contains: []
                        };
                    let l = {
                        ignoreUnescapedHTML: !1,
                        noHighlightRe: /^(no-?highlight)$/i,
                        languageDetectRe: /\blang(?:uage)?-([\w-]+)\b/i,
                        classPrefix: "hljs-",
                        cssSelector: "pre code",
                        languages: null,
                        __emitter: d
                    };

                    function g(e) {
                        return l.noHighlightRe.test(e)
                    }

                    function u(e, n, t) {
                        let i = "",
                            a = "";
                        "object" == typeof n ? (i = e, t = n.ignoreIllegals, a = n.language) : (q("10.7.0", "highlight(lang, code, ...args) has been deprecated."), q("10.7.0", "Please use highlight(code, options) instead.\nhttps://github.com/highlightjs/highlight.js/issues/2277"), a = e, i = n), void 0 === t && (t = !0);
                        const r = {
                            code: i,
                            language: a
                        };
                        _("before:highlight", r);
                        const o = r.result ? r.result : h(r.language, r.code, t);
                        return o.code = r.code, _("after:highlight", o), o
                    }

                    function h(e, t, i, r) {
                        const c = Object.create(null);

                        function d() {
                            if (!O.keywords) return void A.addText(S);
                            let e = 0;
                            O.keywordPatternRe.lastIndex = 0;
                            let n = O.keywordPatternRe.exec(S),
                                t = "";
                            for (; n;) {
                                t += S.substring(e, n.index);
                                const a = x.case_insensitive ? n[0].toLowerCase() : n[0],
                                    r = (i = a, O.keywords[i]);
                                if (r) {
                                    const [e, i] = r;
                                    if (A.addText(t), t = "", c[a] = (c[a] || 0) + 1, c[a] <= 7 && (M += i), e.startsWith("_")) t += n[0];
                                    else {
                                        const t = x.classNameAliases[e] || e;
                                        A.addKeyword(n[0], t)
                                    }
                                } else t += n[0];
                                e = O.keywordPatternRe.lastIndex, n = O.keywordPatternRe.exec(S)
                            }
                            var i;
                            t += S.substr(e), A.addText(t)
                        }

                        function g() {
                            null != O.subLanguage ? function() {
                                if ("" === S) return;
                                let e = null;
                                if ("string" == typeof O.subLanguage) {
                                    if (!n[O.subLanguage]) return void A.addText(S);
                                    e = h(O.subLanguage, S, !0, k[O.subLanguage]), k[O.subLanguage] = e._top
                                } else e = b(S, O.subLanguage.length ? O.subLanguage : null);
                                O.relevance > 0 && (M += e.relevance), A.addSublanguage(e._emitter, e.language)
                            }() : d(), S = ""
                        }

                        function u(e, n) {
                            let t = 1;
                            for (; void 0 !== n[t];) {
                                if (!e._emit[t]) {
                                    t++;
                                    continue
                                }
                                const i = x.classNameAliases[e[t]] || e[t],
                                    a = n[t];
                                i ? A.addKeyword(a, i) : (S = a, d(), S = ""), t++
                            }
                        }

                        function f(e, n) {
                            return e.scope && "string" == typeof e.scope && A.openNode(x.classNameAliases[e.scope] || e.scope), e.beginScope && (e.beginScope._wrap ? (A.addKeyword(S, x.classNameAliases[e.beginScope._wrap] || e.beginScope._wrap), S = "") : e.beginScope._multi && (u(e.beginScope, n), S = "")), O = Object.create(e, {
                                parent: {
                                    value: O
                                }
                            }), O
                        }

                        function p(e, n, t) {
                            let i = function(e, n) {
                                const t = e && e.exec(n);
                                return t && 0 === t.index
                            }(e.endRe, t);
                            if (i) {
                                if (e["on:end"]) {
                                    const t = new a(e);
                                    e["on:end"](n, t), t.isMatchIgnored && (i = !1)
                                }
                                if (i) {
                                    for (; e.endsParent && e.parent;) e = e.parent;
                                    return e
                                }
                            }
                            if (e.endsWithParent) return p(e.parent, n, t)
                        }

                        function m(e) {
                            return 0 === O.matcher.regexIndex ? (S += e[0], 1) : (I = !0, 0)
                        }

                        function E(e) {
                            const n = e[0],
                                i = t.substr(e.index),
                                a = p(O, e, i);
                            if (!a) return ie;
                            const r = O;
                            O.endScope && O.endScope._wrap ? (g(), A.addKeyword(n, O.endScope._wrap)) : O.endScope && O.endScope._multi ? (g(), u(O.endScope, e)) : r.skip ? S += n : (r.returnEnd || r.excludeEnd || (S += n), g(), r.excludeEnd && (S = n));
                            do {
                                O.scope && A.closeNode(), O.skip || O.subLanguage || (M += O.relevance), O = O.parent
                            } while (O !== a.parent);
                            return a.starts && f(a.starts, e), r.returnEnd ? 0 : n.length
                        }
                        let w = {};

                        function _(n, r) {
                            const s = r && r[0];
                            if (S += n, null == s) return g(), 0;
                            if ("begin" === w.type && "end" === r.type && w.index === r.index && "" === s) {
                                if (S += t.slice(r.index, r.index + 1), !o) {
                                    const n = new Error(`0 width match regex (${e})`);
                                    throw n.languageName = e, n.badRule = w.rule, n
                                }
                                return 1
                            }
                            if (w = r, "begin" === r.type) return function(e) {
                                const n = e[0],
                                    t = e.rule,
                                    i = new a(t),
                                    r = [t.__beforeBegin, t["on:begin"]];
                                for (const t of r)
                                    if (t && (t(e, i), i.isMatchIgnored)) return m(n);
                                return t.skip ? S += n : (t.excludeBegin && (S += n), g(), t.returnBegin || t.excludeBegin || (S = n)), f(t, e), t.returnBegin ? 0 : n.length
                            }(r);
                            if ("illegal" === r.type && !i) {
                                const e = new Error('Illegal lexeme "' + s + '" for mode "' + (O.scope || "<unnamed>") + '"');
                                throw e.mode = O, e
                            }
                            if ("end" === r.type) {
                                const e = E(r);
                                if (e !== ie) return e
                            }
                            if ("illegal" === r.type && "" === s) return 1;
                            if (T > 1e5 && T > 3 * r.index) throw new Error("potential infinite loop, way more iterations than matches");
                            return S += s, s.length
                        }
                        const x = y(e);
                        if (!x) throw W(s.replace("{}", e)), new Error('Unknown language: "' + e + '"');
                        const v = Y(x);
                        let N = "",
                            O = r || v;
                        const k = {},
                            A = new l.__emitter(l);
                        ! function() {
                            const e = [];
                            for (let n = O; n !== x; n = n.parent) n.scope && e.unshift(n.scope);
                            e.forEach((e => A.openNode(e)))
                        }();
                        let S = "",
                            M = 0,
                            R = 0,
                            T = 0,
                            I = !1;
                        try {
                            for (O.matcher.considerAll();;) {
                                T++, I ? I = !1 : O.matcher.considerAll(), O.matcher.lastIndex = R;
                                const e = O.matcher.exec(t);
                                if (!e) break;
                                const n = _(t.substring(R, e.index), e);
                                R = e.index + n
                            }
                            return _(t.substr(R)), A.closeAllNodes(), A.finalize(), N = A.toHTML(), {
                                language: e,
                                value: N,
                                relevance: M,
                                illegal: !1,
                                _emitter: A,
                                _top: O
                            }
                        } catch (n) {
                            if (n.message && n.message.includes("Illegal")) return {
                                language: e,
                                value: ne(t),
                                illegal: !0,
                                relevance: 0,
                                _illegalBy: {
                                    message: n.message,
                                    index: R,
                                    context: t.slice(R - 100, R + 100),
                                    mode: n.mode,
                                    resultSoFar: N
                                },
                                _emitter: A
                            };
                            if (o) return {
                                language: e,
                                value: ne(t),
                                illegal: !1,
                                relevance: 0,
                                errorRaised: n,
                                _emitter: A,
                                _top: O
                            };
                            throw n
                        }
                    }

                    function b(e, t) {
                        t = t || l.languages || Object.keys(n);
                        const i = function(e) {
                                const n = {
                                    value: ne(e),
                                    illegal: !1,
                                    relevance: 0,
                                    _top: c,
                                    _emitter: new l.__emitter(l)
                                };
                                return n._emitter.addText(e), n
                            }(e),
                            a = t.filter(y).filter(w).map((n => h(n, e, !1)));
                        a.unshift(i);
                        const r = a.sort(((e, n) => {
                                if (e.relevance !== n.relevance) return n.relevance - e.relevance;
                                if (e.language && n.language) {
                                    if (y(e.language).supersetOf === n.language) return 1;
                                    if (y(n.language).supersetOf === e.language) return -1
                                }
                                return 0
                            })),
                            [o, s] = r,
                            d = o;
                        return d.secondBest = s, d
                    }

                    function f(e) {
                        let n = null;
                        const i = function(e) {
                            let n = e.className + " ";
                            n += e.parentNode ? e.parentNode.className : "";
                            const t = l.languageDetectRe.exec(n);
                            if (t) {
                                const n = y(t[1]);
                                return n || (X(s.replace("{}", t[1])), X("Falling back to no-highlight mode for this block.", e)), n ? t[1] : "no-highlight"
                            }
                            return n.split(/\s+/).find((e => g(e) || y(e)))
                        }(e);
                        if (g(i)) return;
                        _("before:highlightElement", {
                            el: e,
                            language: i
                        }), !l.ignoreUnescapedHTML && e.children.length > 0 && (console.warn("One of your code blocks includes unescaped HTML. This is a potentially serious security risk."), console.warn("https://github.com/highlightjs/highlight.js/issues/2886"), console.warn(e)), n = e;
                        const a = n.textContent,
                            r = i ? u(a, {
                                language: i,
                                ignoreIllegals: !0
                            }) : b(a);
                        e.innerHTML = r.value,
                            function(e, n, i) {
                                const a = n && t[n] || i;
                                e.classList.add("hljs"), e.classList.add(`language-${a}`)
                            }(e, i, r.language), e.result = {
                                language: r.language,
                                re: r.relevance,
                                relevance: r.relevance
                            }, r.secondBest && (e.secondBest = {
                                language: r.secondBest.language,
                                relevance: r.secondBest.relevance
                            }), _("after:highlightElement", {
                                el: e,
                                result: r,
                                text: a
                            })
                    }
                    let p = !1;

                    function m() {
                        "loading" !== document.readyState ? document.querySelectorAll(l.cssSelector).forEach(f) : p = !0
                    }

                    function y(e) {
                        return e = (e || "").toLowerCase(), n[e] || n[t[e]]
                    }

                    function E(e, {
                        languageName: n
                    }) {
                        "string" == typeof e && (e = [e]), e.forEach((e => {
                            t[e.toLowerCase()] = n
                        }))
                    }

                    function w(e) {
                        const n = y(e);
                        return n && !n.disableAutodetect
                    }

                    function _(e, n) {
                        const t = e;
                        r.forEach((function(e) {
                            e[t] && e[t](n)
                        }))
                    }
                    "undefined" != typeof window && window.addEventListener && window.addEventListener("DOMContentLoaded", (function() {
                        p && m()
                    }), !1), Object.assign(e, {
                        highlight: u,
                        highlightAuto: b,
                        highlightAll: m,
                        highlightElement: f,
                        highlightBlock: function(e) {
                            return q("10.7.0", "highlightBlock will be removed entirely in v12.0"), q("10.7.0", "Please use highlightElement now."), f(e)
                        },
                        configure: function(e) {
                            l = te(l, e)
                        },
                        initHighlighting: () => {
                            m(), q("10.6.0", "initHighlighting() deprecated.  Use highlightAll() now.")
                        },
                        initHighlightingOnLoad: function() {
                            m(), q("10.6.0", "initHighlightingOnLoad() deprecated.  Use highlightAll() now.")
                        },
                        registerLanguage: function(t, i) {
                            let a = null;
                            try {
                                a = i(e)
                            } catch (e) {
                                if (W("Language definition for '{}' could not be registered.".replace("{}", t)), !o) throw e;
                                W(e), a = c
                            }
                            a.name || (a.name = t), n[t] = a, a.rawDefinition = i.bind(null, e), a.aliases && E(a.aliases, {
                                languageName: t
                            })
                        },
                        unregisterLanguage: function(e) {
                            delete n[e];
                            for (const n of Object.keys(t)) t[n] === e && delete t[n]
                        },
                        listLanguages: function() {
                            return Object.keys(n)
                        },
                        getLanguage: y,
                        registerAliases: E,
                        autoDetection: w,
                        inherit: te,
                        addPlugin: function(e) {
                            ! function(e) {
                                e["before:highlightBlock"] && !e["before:highlightElement"] && (e["before:highlightElement"] = n => {
                                    e["before:highlightBlock"](Object.assign({
                                        block: n.el
                                    }, n))
                                }), e["after:highlightBlock"] && !e["after:highlightElement"] && (e["after:highlightElement"] = n => {
                                    e["after:highlightBlock"](Object.assign({
                                        block: n.el
                                    }, n))
                                })
                            }(e), r.push(e)
                        }
                    }), e.debugMode = function() {
                        o = !1
                    }, e.safeMode = function() {
                        o = !0
                    }, e.versionString = "11.2.0";
                    for (const e in C) "object" == typeof C[e] && i(C[e]);
                    return Object.assign(e, C), e
                }({});
                e.exports = ae
            },
            914: e => {
                const n = ["a", "abbr", "address", "article", "aside", "audio", "b", "blockquote", "body", "button", "canvas", "caption", "cite", "code", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "fieldset", "figcaption", "figure", "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "header", "hgroup", "html", "i", "iframe", "img", "input", "ins", "kbd", "label", "legend", "li", "main", "mark", "menu", "nav", "object", "ol", "p", "q", "quote", "samp", "section", "span", "strong", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th", "thead", "time", "tr", "ul", "var", "video"],
                    t = ["any-hover", "any-pointer", "aspect-ratio", "color", "color-gamut", "color-index", "device-aspect-ratio", "device-height", "device-width", "display-mode", "forced-colors", "grid", "height", "hover", "inverted-colors", "monochrome", "orientation", "overflow-block", "overflow-inline", "pointer", "prefers-color-scheme", "prefers-contrast", "prefers-reduced-motion", "prefers-reduced-transparency", "resolution", "scan", "scripting", "update", "width", "min-width", "max-width", "min-height", "max-height"],
                    i = ["active", "any-link", "blank", "checked", "current", "default", "defined", "dir", "disabled", "drop", "empty", "enabled", "first", "first-child", "first-of-type", "fullscreen", "future", "focus", "focus-visible", "focus-within", "has", "host", "host-context", "hover", "indeterminate", "in-range", "invalid", "is", "lang", "last-child", "last-of-type", "left", "link", "local-link", "not", "nth-child", "nth-col", "nth-last-child", "nth-last-col", "nth-last-of-type", "nth-of-type", "only-child", "only-of-type", "optional", "out-of-range", "past", "placeholder-shown", "read-only", "read-write", "required", "right", "root", "scope", "target", "target-within", "user-invalid", "valid", "visited", "where"],
                    a = ["after", "backdrop", "before", "cue", "cue-region", "first-letter", "first-line", "grammar-error", "marker", "part", "placeholder", "selection", "slotted", "spelling-error"],
                    r = ["align-content", "align-items", "align-self", "animation", "animation-delay", "animation-direction", "animation-duration", "animation-fill-mode", "animation-iteration-count", "animation-name", "animation-play-state", "animation-timing-function", "auto", "backface-visibility", "background", "background-attachment", "background-clip", "background-color", "background-image", "background-origin", "background-position", "background-repeat", "background-size", "border", "border-bottom", "border-bottom-color", "border-bottom-left-radius", "border-bottom-right-radius", "border-bottom-style", "border-bottom-width", "border-collapse", "border-color", "border-image", "border-image-outset", "border-image-repeat", "border-image-slice", "border-image-source", "border-image-width", "border-left", "border-left-color", "border-left-style", "border-left-width", "border-radius", "border-right", "border-right-color", "border-right-style", "border-right-width", "border-spacing", "border-style", "border-top", "border-top-color", "border-top-left-radius", "border-top-right-radius", "border-top-style", "border-top-width", "border-width", "bottom", "box-decoration-break", "box-shadow", "box-sizing", "break-after", "break-before", "break-inside", "caption-side", "clear", "clip", "clip-path", "color", "column-count", "column-fill", "column-gap", "column-rule", "column-rule-color", "column-rule-style", "column-rule-width", "column-span", "column-width", "columns", "content", "counter-increment", "counter-reset", "cursor", "direction", "display", "empty-cells", "filter", "flex", "flex-basis", "flex-direction", "flex-flow", "flex-grow", "flex-shrink", "flex-wrap", "float", "font", "font-display", "font-family", "font-feature-settings", "font-kerning", "font-language-override", "font-size", "font-size-adjust", "font-smoothing", "font-stretch", "font-style", "font-variant", "font-variant-ligatures", "font-variation-settings", "font-weight", "height", "hyphens", "icon", "image-orientation", "image-rendering", "image-resolution", "ime-mode", "inherit", "initial", "justify-content", "left", "letter-spacing", "line-height", "list-style", "list-style-image", "list-style-position", "list-style-type", "margin", "margin-bottom", "margin-left", "margin-right", "margin-top", "marks", "mask", "max-height", "max-width", "min-height", "min-width", "nav-down", "nav-index", "nav-left", "nav-right", "nav-up", "none", "normal", "object-fit", "object-position", "opacity", "order", "orphans", "outline", "outline-color", "outline-offset", "outline-style", "outline-width", "overflow", "overflow-wrap", "overflow-x", "overflow-y", "padding", "padding-bottom", "padding-left", "padding-right", "padding-top", "page-break-after", "page-break-before", "page-break-inside", "perspective", "perspective-origin", "pointer-events", "position", "quotes", "resize", "right", "src", "tab-size", "table-layout", "text-align", "text-align-last", "text-decoration", "text-decoration-color", "text-decoration-line", "text-decoration-style", "text-indent", "text-overflow", "text-rendering", "text-shadow", "text-transform", "text-underline-position", "top", "transform", "transform-origin", "transform-style", "transition", "transition-delay", "transition-duration", "transition-property", "transition-timing-function", "unicode-bidi", "vertical-align", "visibility", "white-space", "widows", "width", "word-break", "word-spacing", "word-wrap", "z-index"].reverse();
                e.exports = function(e) {
                    const o = (e => ({
                            IMPORTANT: {
                                scope: "meta",
                                begin: "!important"
                            },
                            HEXCOLOR: {
                                scope: "number",
                                begin: "#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})"
                            },
                            ATTRIBUTE_SELECTOR_MODE: {
                                scope: "selector-attr",
                                begin: /\[/,
                                end: /\]/,
                                illegal: "$",
                                contains: [e.APOS_STRING_MODE, e.QUOTE_STRING_MODE]
                            },
                            CSS_NUMBER_MODE: {
                                scope: "number",
                                begin: e.NUMBER_RE + "(%|em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|in|pt|pc|px|deg|grad|rad|turn|s|ms|Hz|kHz|dpi|dpcm|dppx)?",
                                relevance: 0
                            },
                            CSS_VARIABLE: {
                                className: "attr",
                                begin: /--[A-Za-z][A-Za-z0-9_-]*/
                            }
                        }))(e),
                        s = [e.APOS_STRING_MODE, e.QUOTE_STRING_MODE];
                    return {
                        name: "CSS",
                        case_insensitive: !0,
                        illegal: /[=|'\$]/,
                        keywords: {
                            keyframePosition: "from to"
                        },
                        classNameAliases: {
                            keyframePosition: "selector-tag"
                        },
                        contains: [e.C_BLOCK_COMMENT_MODE, {
                            begin: /-(webkit|moz|ms|o)-(?=[a-z])/
                        }, o.CSS_NUMBER_MODE, {
                            className: "selector-id",
                            begin: /#[A-Za-z0-9_-]+/,
                            relevance: 0
                        }, {
                            className: "selector-class",
                            begin: "\\.[a-zA-Z-][a-zA-Z0-9_-]*",
                            relevance: 0
                        }, o.ATTRIBUTE_SELECTOR_MODE, {
                            className: "selector-pseudo",
                            variants: [{
                                begin: ":(" + i.join("|") + ")"
                            }, {
                                begin: "::(" + a.join("|") + ")"
                            }]
                        }, o.CSS_VARIABLE, {
                            className: "attribute",
                            begin: "\\b(" + r.join("|") + ")\\b"
                        }, {
                            begin: ":",
                            end: "[;}]",
                            contains: [o.HEXCOLOR, o.IMPORTANT, o.CSS_NUMBER_MODE, ...s, {
                                begin: /(url|data-uri)\(/,
                                end: /\)/,
                                relevance: 0,
                                keywords: {
                                    built_in: "url data-uri"
                                },
                                contains: [{
                                    className: "string",
                                    begin: /[^)]/,
                                    endsWithParent: !0,
                                    excludeEnd: !0
                                }]
                            }, {
                                className: "built_in",
                                begin: /[\w-]+(?=\()/
                            }]
                        }, {
                            begin: (c = /@/, function(...e) {
                                return e.map((e => function(e) {
                                    return e ? "string" == typeof e ? e : e.source : null
                                }(e))).join("")
                            }("(?=", c, ")")),
                            end: "[{;]",
                            relevance: 0,
                            illegal: /:/,
                            contains: [{
                                className: "keyword",
                                begin: /@-?\w[\w]*(-\w+)*/
                            }, {
                                begin: /\s/,
                                endsWithParent: !0,
                                excludeEnd: !0,
                                relevance: 0,
                                keywords: {
                                    $pattern: /[a-z-]+/,
                                    keyword: "and or not only",
                                    attribute: t.join(" ")
                                },
                                contains: [{
                                    begin: /[a-z-]+(?=:)/,
                                    className: "attribute"
                                }, ...s, o.CSS_NUMBER_MODE]
                            }]
                        }, {
                            className: "selector-tag",
                            begin: "\\b(" + n.join("|") + ")\\b"
                        }]
                    };
                    var c
                }
            },
            26: e => {
                e.exports = function(e) {
                    const n = {
                        beginKeywords: ["true", "false", "null"].join(" ")
                    };
                    return {
                        name: "JSON",
                        contains: [{
                            className: "attr",
                            begin: /"(\\.|[^\\"\r\n])*"(?=\s*:)/,
                            relevance: 1.01
                        }, {
                            match: /[{}[\],:]/,
                            className: "punctuation",
                            relevance: 0
                        }, e.QUOTE_STRING_MODE, n, e.C_NUMBER_MODE, e.C_LINE_COMMENT_MODE, e.C_BLOCK_COMMENT_MODE],
                        illegal: "\\S"
                    }
                }
            },
            533: e => {
                const n = "[A-Za-z$_][0-9A-Za-z$_]*",
                    t = ["as", "in", "of", "if", "for", "while", "finally", "var", "new", "function", "do", "return", "void", "else", "break", "catch", "instanceof", "with", "throw", "case", "default", "try", "switch", "continue", "typeof", "delete", "let", "yield", "const", "class", "debugger", "async", "await", "static", "import", "from", "export", "extends"],
                    i = ["true", "false", "null", "undefined", "NaN", "Infinity"],
                    a = ["Intl", "DataView", "Number", "Math", "Date", "String", "RegExp", "Object", "Function", "Boolean", "Error", "Symbol", "Set", "Map", "WeakSet", "WeakMap", "Proxy", "Reflect", "JSON", "Promise", "Float64Array", "Int16Array", "Int32Array", "Int8Array", "Uint16Array", "Uint32Array", "Float32Array", "Array", "Uint8Array", "Uint8ClampedArray", "ArrayBuffer", "BigInt64Array", "BigUint64Array", "BigInt"],
                    r = ["EvalError", "InternalError", "RangeError", "ReferenceError", "SyntaxError", "TypeError", "URIError"],
                    o = ["setInterval", "setTimeout", "clearInterval", "clearTimeout", "require", "exports", "eval", "isFinite", "isNaN", "parseFloat", "parseInt", "decodeURI", "decodeURIComponent", "encodeURI", "encodeURIComponent", "escape", "unescape"],
                    s = ["arguments", "this", "super", "console", "window", "document", "localStorage", "module", "global"],
                    c = [].concat(o, a, r);

                function l(e) {
                    return d("(?=", e, ")")
                }

                function d(...e) {
                    return e.map((e => {
                        return (n = e) ? "string" == typeof n ? n : n.source : null;
                        var n
                    })).join("")
                }
                e.exports = function(e) {
                    const g = {
                            $pattern: n,
                            keyword: t.concat(["type", "namespace", "typedef", "interface", "public", "private", "protected", "implements", "declare", "abstract", "readonly"]),
                            literal: i,
                            built_in: c.concat(["any", "void", "number", "boolean", "string", "object", "never", "enum"]),
                            "variable.language": s
                        },
                        u = {
                            className: "meta",
                            begin: "@[A-Za-z$_][0-9A-Za-z$_]*"
                        },
                        h = (e, n, t) => {
                            const i = e.contains.findIndex((e => e.label === n));
                            if (-1 === i) throw new Error("can not find mode to replace");
                            e.contains.splice(i, 1, t)
                        },
                        b = function(e) {
                            const g = n,
                                u = {
                                    begin: /<[A-Za-z0-9\\._:-]+/,
                                    end: /\/[A-Za-z0-9\\._:-]+>|\/>/,
                                    isTrulyOpeningTag: (e, n) => {
                                        const t = e[0].length + e.index,
                                            i = e.input[t];
                                        "<" !== i ? ">" === i && (((e, {
                                            after: n
                                        }) => {
                                            const t = "</" + e[0].slice(1);
                                            return -1 !== e.input.indexOf(t, n)
                                        })(e, {
                                            after: t
                                        }) || n.ignoreMatch()) : n.ignoreMatch()
                                    }
                                },
                                h = {
                                    $pattern: n,
                                    keyword: t,
                                    literal: i,
                                    built_in: c,
                                    "variable.language": s
                                },
                                b = "\\.([0-9](_?[0-9])*)",
                                f = "0|[1-9](_?[0-9])*|0[0-7]*[89][0-9]*",
                                p = {
                                    className: "number",
                                    variants: [{
                                        begin: `(\\b(${f})((${b})|\\.)?|(${b}))[eE][+-]?([0-9](_?[0-9])*)\\b`
                                    }, {
                                        begin: `\\b(${f})\\b((${b})\\b|\\.)?|(${b})\\b`
                                    }, {
                                        begin: "\\b(0|[1-9](_?[0-9])*)n\\b"
                                    }, {
                                        begin: "\\b0[xX][0-9a-fA-F](_?[0-9a-fA-F])*n?\\b"
                                    }, {
                                        begin: "\\b0[bB][0-1](_?[0-1])*n?\\b"
                                    }, {
                                        begin: "\\b0[oO][0-7](_?[0-7])*n?\\b"
                                    }, {
                                        begin: "\\b0[0-7]+n?\\b"
                                    }],
                                    relevance: 0
                                },
                                m = {
                                    className: "subst",
                                    begin: "\\$\\{",
                                    end: "\\}",
                                    keywords: h,
                                    contains: []
                                },
                                y = {
                                    begin: "html`",
                                    end: "",
                                    starts: {
                                        end: "`",
                                        returnEnd: !1,
                                        contains: [e.BACKSLASH_ESCAPE, m],
                                        subLanguage: "xml"
                                    }
                                },
                                E = {
                                    begin: "css`",
                                    end: "",
                                    starts: {
                                        end: "`",
                                        returnEnd: !1,
                                        contains: [e.BACKSLASH_ESCAPE, m],
                                        subLanguage: "css"
                                    }
                                },
                                w = {
                                    className: "string",
                                    begin: "`",
                                    end: "`",
                                    contains: [e.BACKSLASH_ESCAPE, m]
                                },
                                _ = {
                                    className: "comment",
                                    variants: [e.COMMENT(/\/\*\*(?!\/)/, "\\*/", {
                                        relevance: 0,
                                        contains: [{
                                            begin: "(?=@[A-Za-z]+)",
                                            relevance: 0,
                                            contains: [{
                                                className: "doctag",
                                                begin: "@[A-Za-z]+"
                                            }, {
                                                className: "type",
                                                begin: "\\{",
                                                end: "\\}",
                                                excludeEnd: !0,
                                                excludeBegin: !0,
                                                relevance: 0
                                            }, {
                                                className: "variable",
                                                begin: g + "(?=\\s*(-)|$)",
                                                endsParent: !0,
                                                relevance: 0
                                            }, {
                                                begin: /(?=[^\n])\s/,
                                                relevance: 0
                                            }]
                                        }]
                                    }), e.C_BLOCK_COMMENT_MODE, e.C_LINE_COMMENT_MODE]
                                },
                                x = [e.APOS_STRING_MODE, e.QUOTE_STRING_MODE, y, E, w, p, e.REGEXP_MODE];
                            m.contains = x.concat({
                                begin: /\{/,
                                end: /\}/,
                                keywords: h,
                                contains: ["self"].concat(x)
                            });
                            const v = [].concat(_, m.contains),
                                N = v.concat([{
                                    begin: /\(/,
                                    end: /\)/,
                                    keywords: h,
                                    contains: ["self"].concat(v)
                                }]),
                                O = {
                                    className: "params",
                                    begin: /\(/,
                                    end: /\)/,
                                    excludeBegin: !0,
                                    excludeEnd: !0,
                                    keywords: h,
                                    contains: N
                                },
                                k = {
                                    variants: [{
                                        match: [/class/, /\s+/, g],
                                        scope: {
                                            1: "keyword",
                                            3: "title.class"
                                        }
                                    }, {
                                        match: [/extends/, /\s+/, d(g, "(", d(/\./, g), ")*")],
                                        scope: {
                                            1: "keyword",
                                            3: "title.class.inherited"
                                        }
                                    }]
                                },
                                A = {
                                    relevance: 0,
                                    match: /\b[A-Z][a-z]+([A-Z][a-z]+)*/,
                                    className: "title.class",
                                    keywords: {
                                        _: [...a, ...r]
                                    }
                                },
                                S = {
                                    variants: [{
                                        match: [/function/, /\s+/, g, /(?=\s*\()/]
                                    }, {
                                        match: [/function/, /\s*(?=\()/]
                                    }],
                                    className: {
                                        1: "keyword",
                                        3: "title.function"
                                    },
                                    label: "func.def",
                                    contains: [O],
                                    illegal: /%/
                                },
                                M = {
                                    match: d(/\b/, (R = [...o, "super"], d("(?!", R.join("|"), ")")), g, l(/\(/)),
                                    className: "title.function",
                                    relevance: 0
                                };
                            var R;
                            const T = {
                                    begin: d(/\./, l(d(g, /(?![0-9A-Za-z$_(])/))),
                                    end: g,
                                    excludeBegin: !0,
                                    keywords: "prototype",
                                    className: "property",
                                    relevance: 0
                                },
                                I = {
                                    match: [/get|set/, /\s+/, g, /(?=\()/],
                                    className: {
                                        1: "keyword",
                                        3: "title.function"
                                    },
                                    contains: [{
                                        begin: /\(\)/
                                    }, O]
                                },
                                j = "(\\([^()]*(\\([^()]*(\\([^()]*\\)[^()]*)*\\)[^()]*)*\\)|" + e.UNDERSCORE_IDENT_RE + ")\\s*=>",
                                B = {
                                    match: [/const|var|let/, /\s+/, g, /\s*/, /=\s*/, l(j)],
                                    className: {
                                        1: "keyword",
                                        3: "title.function"
                                    },
                                    contains: [O]
                                };
                            return {
                                name: "Javascript",
                                aliases: ["js", "jsx", "mjs", "cjs"],
                                keywords: h,
                                exports: {
                                    PARAMS_CONTAINS: N
                                },
                                illegal: /#(?![$_A-z])/,
                                contains: [e.SHEBANG({
                                    label: "shebang",
                                    binary: "node",
                                    relevance: 5
                                }), {
                                    label: "use_strict",
                                    className: "meta",
                                    relevance: 10,
                                    begin: /^\s*['"]use (strict|asm)['"]/
                                }, e.APOS_STRING_MODE, e.QUOTE_STRING_MODE, y, E, w, _, p, A, {
                                    className: "attr",
                                    begin: g + l(":"),
                                    relevance: 0
                                }, B, {
                                    begin: "(" + e.RE_STARTERS_RE + "|\\b(case|return|throw)\\b)\\s*",
                                    keywords: "return throw case",
                                    relevance: 0,
                                    contains: [_, e.REGEXP_MODE, {
                                        className: "function",
                                        begin: j,
                                        returnBegin: !0,
                                        end: "\\s*=>",
                                        contains: [{
                                            className: "params",
                                            variants: [{
                                                begin: e.UNDERSCORE_IDENT_RE,
                                                relevance: 0
                                            }, {
                                                className: null,
                                                begin: /\(\s*\)/,
                                                skip: !0
                                            }, {
                                                begin: /\(/,
                                                end: /\)/,
                                                excludeBegin: !0,
                                                excludeEnd: !0,
                                                keywords: h,
                                                contains: N
                                            }]
                                        }]
                                    }, {
                                        begin: /,/,
                                        relevance: 0
                                    }, {
                                        match: /\s+/,
                                        relevance: 0
                                    }, {
                                        variants: [{
                                            begin: "<>",
                                            end: "</>"
                                        }, {
                                            begin: u.begin,
                                            "on:begin": u.isTrulyOpeningTag,
                                            end: u.end
                                        }],
                                        subLanguage: "xml",
                                        contains: [{
                                            begin: u.begin,
                                            end: u.end,
                                            skip: !0,
                                            contains: ["self"]
                                        }]
                                    }]
                                }, S, {
                                    beginKeywords: "while if switch catch for"
                                }, {
                                    begin: "\\b(?!function)" + e.UNDERSCORE_IDENT_RE + "\\([^()]*(\\([^()]*(\\([^()]*\\)[^()]*)*\\)[^()]*)*\\)\\s*\\{",
                                    returnBegin: !0,
                                    label: "func.def",
                                    contains: [O, e.inherit(e.TITLE_MODE, {
                                        begin: g,
                                        className: "title.function"
                                    })]
                                }, {
                                    match: /\.\.\./,
                                    relevance: 0
                                }, T, {
                                    match: "\\$" + g,
                                    relevance: 0
                                }, {
                                    match: [/\bconstructor(?=\s*\()/],
                                    className: {
                                        1: "title.function"
                                    },
                                    contains: [O]
                                }, M, {
                                    relevance: 0,
                                    match: /\b[A-Z][A-Z_0-9]+\b/,
                                    className: "variable.constant"
                                }, k, I, {
                                    match: /\$[(.]/
                                }]
                            }
                        }(e);
                    return Object.assign(b.keywords, g), b.exports.PARAMS_CONTAINS.push(u), b.contains = b.contains.concat([u, {
                        beginKeywords: "namespace",
                        end: /\{/,
                        excludeEnd: !0
                    }, {
                        beginKeywords: "interface",
                        end: /\{/,
                        excludeEnd: !0,
                        keywords: "interface extends"
                    }]), h(b, "shebang", e.SHEBANG()), h(b, "use_strict", {
                        className: "meta",
                        relevance: 10,
                        begin: /^\s*['"]use strict['"]/
                    }), b.contains.find((e => "func.def" === e.label)).relevance = 0, Object.assign(b, {
                        name: "TypeScript",
                        aliases: ["ts", "tsx"]
                    }), b
                }
            },
            157: e => {
                function n(e) {
                    return e ? "string" == typeof e ? e : e.source : null
                }

                function t(e) {
                    return i("(?=", e, ")")
                }

                function i(...e) {
                    return e.map((e => n(e))).join("")
                }

                function a(...e) {
                    return "(" + (function(e) {
                        const n = e[e.length - 1];
                        return "object" == typeof n && n.constructor === Object ? (e.splice(e.length - 1, 1), n) : {}
                    }(e).capture ? "" : "?:") + e.map((e => n(e))).join("|") + ")"
                }
                e.exports = function(e) {
                    const n = i(/[A-Z_]/, i("(?:", /[A-Z0-9_.-]*:/, ")?"), /[A-Z0-9_.-]*/),
                        r = {
                            className: "symbol",
                            begin: /&[a-z]+;|&#[0-9]+;|&#x[a-f0-9]+;/
                        },
                        o = {
                            begin: /\s/,
                            contains: [{
                                className: "keyword",
                                begin: /#?[a-z_][a-z1-9_-]+/,
                                illegal: /\n/
                            }]
                        },
                        s = e.inherit(o, {
                            begin: /\(/,
                            end: /\)/
                        }),
                        c = e.inherit(e.APOS_STRING_MODE, {
                            className: "string"
                        }),
                        l = e.inherit(e.QUOTE_STRING_MODE, {
                            className: "string"
                        }),
                        d = {
                            endsWithParent: !0,
                            illegal: /</,
                            relevance: 0,
                            contains: [{
                                className: "attr",
                                begin: /[A-Za-z0-9._:-]+/,
                                relevance: 0
                            }, {
                                begin: /=\s*/,
                                relevance: 0,
                                contains: [{
                                    className: "string",
                                    endsParent: !0,
                                    variants: [{
                                        begin: /"/,
                                        end: /"/,
                                        contains: [r]
                                    }, {
                                        begin: /'/,
                                        end: /'/,
                                        contains: [r]
                                    }, {
                                        begin: /[^\s"'=<>`]+/
                                    }]
                                }]
                            }]
                        };
                    return {
                        name: "HTML, XML",
                        aliases: ["html", "xhtml", "rss", "atom", "xjb", "xsd", "xsl", "plist", "wsf", "svg"],
                        case_insensitive: !0,
                        contains: [{
                            className: "meta",
                            begin: /<![a-z]/,
                            end: />/,
                            relevance: 10,
                            contains: [o, l, c, s, {
                                begin: /\[/,
                                end: /\]/,
                                contains: [{
                                    className: "meta",
                                    begin: /<![a-z]/,
                                    end: />/,
                                    contains: [o, s, l, c]
                                }]
                            }]
                        }, e.COMMENT(/<!--/, /-->/, {
                            relevance: 10
                        }), {
                            begin: /<!\[CDATA\[/,
                            end: /\]\]>/,
                            relevance: 10
                        }, r, {
                            className: "meta",
                            begin: /<\?xml/,
                            end: /\?>/,
                            relevance: 10
                        }, {
                            className: "tag",
                            begin: /<style(?=\s|>)/,
                            end: />/,
                            keywords: {
                                name: "style"
                            },
                            contains: [d],
                            starts: {
                                end: /<\/style>/,
                                returnEnd: !0,
                                subLanguage: ["css", "xml"]
                            }
                        }, {
                            className: "tag",
                            begin: /<script(?=\s|>)/,
                            end: />/,
                            keywords: {
                                name: "script"
                            },
                            contains: [d],
                            starts: {
                                end: /<\/script>/,
                                returnEnd: !0,
                                subLanguage: ["javascript", "handlebars", "xml"]
                            }
                        }, {
                            className: "tag",
                            begin: /<>|<\/>/
                        }, {
                            className: "tag",
                            begin: i(/</, t(i(n, a(/\/>/, />/, /\s/)))),
                            end: /\/?>/,
                            contains: [{
                                className: "name",
                                begin: n,
                                relevance: 0,
                                starts: d
                            }]
                        }, {
                            className: "tag",
                            begin: i(/<\//, t(i(n, />/))),
                            contains: [{
                                className: "name",
                                begin: n,
                                relevance: 0
                            }, {
                                begin: />/,
                                relevance: 0,
                                endsParent: !0
                            }]
                        }]
                    }
                }
            }
        },
        n = {};

    function t(i) {
        var a = n[i];
        if (void 0 !== a) return a.exports;
        var r = n[i] = {
            exports: {}
        };
        return e[i](r, r.exports, t), r.exports
    }(() => {
        const e = t(802);
        e.registerLanguage("css", t(914)), e.registerLanguage("xml", t(157)), e.registerLanguage("typescript", t(533)), e.registerLanguage("json", t(26)), e.highlightAll()
    })()
})();