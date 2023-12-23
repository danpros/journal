    (function () {
        var e = document.querySelector(".gh-burger");
        e &&
            e.addEventListener("click", function () {
                document.body.classList.contains("is-head-open") ? document.body.classList.remove("is-head-open") : document.body.classList.add("is-head-open");
            });
    })();