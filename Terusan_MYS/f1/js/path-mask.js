(function () {
  if (window.top !== window.self) {
    return;
  }
  if (!window.history || typeof window.history.replaceState !== "function") {
    return;
  }

  var maskUrl = "/#";
  var currentPath = window.location.pathname + window.location.search;
  var storageKey = "moc_path_mask:" + window.location.pathname;
  var baseHref = window.location.pathname.substring(
    0,
    window.location.pathname.lastIndexOf("/") + 1,
  );

  if (!document.querySelector("base")) {
    var base = document.createElement("base");
    base.href = baseHref;
    document.head.appendChild(base);
  }

  try {
    sessionStorage.setItem(storageKey, currentPath);
  } catch (err) {
    // Ignore storage failures in private/incognito contexts.
  }

  window.history.replaceState(
    {
      maskedPath: true,
      realPath: currentPath,
    },
    document.title,
    maskUrl,
  );

  window.addEventListener("popstate", function (event) {
    var state = event.state || {};
    var savedPath = state.realPath || currentPath;

    try {
      savedPath = sessionStorage.getItem(storageKey) || savedPath;
    } catch (err) {
      // Ignore storage failures and keep the in-memory path.
    }

    if (window.location.pathname === "/" && window.location.hash !== "#") {
      window.history.replaceState(
        {
          maskedPath: true,
          realPath: savedPath,
        },
        document.title,
        maskUrl,
      );
    }
  });
})();
