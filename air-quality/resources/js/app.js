require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

/**
 * MENU burger Top Navbar
 */

$("#test").on("click", function (event) {
    $("#navbarSupportedContent").toggleClass("collapse open");
});
