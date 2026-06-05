(function () {
  function initShell() {
    var buttons = Array.from(document.querySelectorAll(".nav-btn"));
    var defaultRoute = "dashboard";
    var frame = document.getElementById("IF_m");
    var navMap = new Map(
      buttons.map(function (btn) {
        return [btn.dataset.nav, btn];
      }),
    );

    function parseLegacyHash() {
      var raw = (window.location.hash || "").replace(/^#/, "").trim();
      return raw || defaultRoute;
    }

    function normalizeSrc(href) {
      return href || "";
    }

    function buildState(button) {
      return {
        shell: true,
        navKey: button.dataset.nav || defaultRoute,
        frameSrc: normalizeSrc(button.getAttribute("href")),
        scrollMode: button.getAttribute("data-scroll") || "auto",
      };
    }

    function getButtonByNav(navKey) {
      return navMap.get(navKey) || null;
    }

    function getButtonBySrc(frameSrc) {
      if (!frameSrc) return null;
      var normalized = normalizeSrc(frameSrc).split("?")[0].split("/").pop();
      return (
        buttons.find(function (btn) {
          return (
            normalizeSrc(btn.getAttribute("href")).split("?")[0].split("/").pop() ===
            normalized
          );
        }) || null
      );
    }

    function applyActive(button) {
      buttons.forEach(function (btn) {
        btn.classList.toggle("active", btn === button);
      });
    }

    function applyView(button, options) {
      var opts = options || {};
      if (!button || !frame) return;
      applyActive(button);
      frame.setAttribute(
        "scrolling",
        button.getAttribute("data-scroll") || "auto",
      );
      if (opts.forceSrc === false) return;
      var nextSrc = normalizeSrc(button.getAttribute("href"));
      var currentSrc = normalizeSrc(frame.getAttribute("src")).split("?")[0];
      if (currentSrc !== nextSrc || opts.reloadSame) {
        if (frame.contentWindow && frame.contentWindow.location) {
          frame.contentWindow.location.replace(nextSrc);
        } else {
          frame.setAttribute("src", nextSrc);
        }
      }
    }

    function syncFromFrame() {
      if (!frame) return;
      var framePath = "";
      try {
        framePath = frame.contentWindow.location.pathname || "";
      } catch (err) {
        framePath = frame.getAttribute("src") || "";
      }
      var matched = getButtonBySrc(framePath);
      if (matched) {
        applyActive(matched);
        frame.setAttribute(
          "scrolling",
          matched.getAttribute("data-scroll") || "auto",
        );
      }
    }

    buttons.forEach(function (btn) {
      btn.addEventListener("click", function (event) {
        var nextState;
        var currentState;
        event.preventDefault();
        nextState = buildState(btn);
        currentState = window.history.state || {};
        applyView(btn, { reloadSame: true });
        if (
          currentState.navKey === nextState.navKey &&
          currentState.frameSrc === nextState.frameSrc
        ) {
          window.history.replaceState(
            Object.assign({}, currentState, nextState),
            document.title,
            "/#",
          );
          return;
        }
        window.history.pushState(nextState, document.title, "/#");
      });
    });

    window.addEventListener("popstate", function (event) {
      var state = event.state || {};
      var targetButton =
        getButtonByNav(state.navKey) ||
        getButtonBySrc(state.frameSrc) ||
        getButtonByNav(parseLegacyHash()) ||
        getButtonByNav(defaultRoute);
      applyView(targetButton);
    });

    if (frame) {
      frame.addEventListener("load", syncFromFrame);
    }

    var initialState = window.history.state || {};
    var initialButton =
      getButtonByNav(initialState.navKey) ||
      getButtonBySrc(initialState.frameSrc) ||
      getButtonByNav(parseLegacyHash()) ||
      getButtonByNav(defaultRoute);

    if (initialButton) {
      applyView(initialButton);
      window.history.replaceState(
        Object.assign({}, buildState(initialButton), initialState),
        document.title,
        "/#",
      );
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initShell);
  } else {
    initShell();
  }
})();
