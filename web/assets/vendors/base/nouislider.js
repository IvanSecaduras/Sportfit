var noUiSliderDemos = function () {
    var e = function () {
        var e = document.getElementById("m_nouislider_1");
        noUiSlider.create(e, {start: [0], step: 2, range: {min: [0], max: [10]}, format: wNumb({decimals: 0})});
        var n = document.getElementById("m_nouislider_1_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        })
    }, n = function () {
        var e = document.getElementById("m_nouislider_2");
        noUiSlider.create(e, {
            start: [2e4],
            connect: [!0, !1],
            step: 1e3,
            range: {min: [2e4], max: [8e4]},
            format: wNumb({decimals: 3, thousand: ".", postfix: " (US $)"})
        });
        var n = document.getElementById("m_nouislider_2_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        })
    }, t = function () {
        var e = document.getElementById("m_nouislider_3");
        noUiSlider.create(e, {
            start: [20, 80],
            connect: !0,
            direction: "rtl",
            tooltips: [!0, wNumb({decimals: 1})],
            range: {min: [0], "10%": [10, 10], "50%": [80, 50], "80%": 150, max: 200}
        });
        var n = document.getElementById("m_nouislider_3_input"),
            t = [document.getElementById("m_nouislider_3.1_input"), n];
        e.noUiSlider.on("update", function (e, n) {
            t[n].value = e[n]
        })
    }, i = function () {
        for (var e = document.getElementById("m_nouislider_input_select"), n = -20; n <= 40; n++) {
            var t = document.createElement("option");
            t.text = n, t.value = n, e.appendChild(t)
        }
        var i = document.getElementById("m_nouislider_4");
        noUiSlider.create(i, {start: [10, 30], connect: !0, range: {min: -20, max: 40}});
        var o = document.getElementById("m_nouislider_input_number");
        i.noUiSlider.on("update", function (n, t) {
            var i = n[t];
            t ? o.value = i : e.value = Math.round(i)
        }), e.addEventListener("change", function () {
            i.noUiSlider.set([this.value, null])
        }), o.addEventListener("change", function () {
            i.noUiSlider.set([null, this.value])
        })
    }, o = function () {
        var e = document.getElementById("m_nouislider_5");
        noUiSlider.create(e, {
            start: 20,
            range: {min: 0, max: 100},
            pips: {mode: "values", values: [20, 80], density: 4}
        });
        var n = document.getElementById("m_nouislider_5_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        }), e.noUiSlider.on("change", function (n, t) {
            n[t] < 20 ? e.noUiSlider.set(20) : n[t] > 80 && e.noUiSlider.set(80)
        })
    }, d = function () {
        var e = document.getElementById("m_nouislider_6");
        noUiSlider.create(e, {start: 40, orientation: "vertical", range: {min: 0, max: 100}});
        var n = document.getElementById("m_nouislider_6_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        })
    }, a = function () {
        var e = document.getElementById("m_nouislider_modal1");
        noUiSlider.create(e, {start: [0], step: 2, range: {min: [0], max: [10]}, format: wNumb({decimals: 0})});
        var n = document.getElementById("m_nouislider_modal1_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        })
    }, u = function () {
        var e = document.getElementById("m_nouislider_modal2");
        noUiSlider.create(e, {
            start: [2e4],
            connect: [!0, !1],
            step: 1e3,
            range: {min: [2e4], max: [8e4]},
            format: wNumb({decimals: 3, thousand: ".", postfix: " (US $)"})
        });
        var n = document.getElementById("m_nouislider_modal2_input");
        e.noUiSlider.on("update", function (e, t) {
            n.value = e[t]
        }), n.addEventListener("change", function () {
            e.noUiSlider.set(this.value)
        })
    }, r = function () {
        var e = document.getElementById("m_nouislider_modal3");
        noUiSlider.create(e, {
            start: [20, 80],
            connect: !0,
            direction: "rtl",
            tooltips: [!0, wNumb({decimals: 1})],
            range: {min: [0], "10%": [10, 10], "50%": [80, 50], "80%": 150, max: 200}
        });
        var n = document.getElementById("m_nouislider_modal1.1_input"),
            t = [document.getElementById("m_nouislider_modal1.2_input"), n];
        e.noUiSlider.on("update", function (e, n) {
            t[n].value = e[n]
        })
    };
    return {
        init: function () {
            e(), n(), t(), i(), o(), d(), a(), u(), r()
        }
    }
}();
jQuery(document).ready(function () {
    noUiSliderDemos.init()
});