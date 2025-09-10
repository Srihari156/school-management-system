window.addEventListener("load", function () {
    const loader = document.getElementById("spinner-load");
     if (loader) {
        loader.classList.add("fade-out");
        setTimeout(() => loader.style.display = "none", 500);
    }
});
