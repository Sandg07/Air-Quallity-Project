require("./bootstrap");

import Alpine from "alpinejs";
import { isEmpty } from "lodash";

window.Alpine = Alpine;

Alpine.start();

/**
 * MENU burger Top Navbar
 */
$("#burgerMenu").on("click", function (event) {
    $("#navbarSupportedContent").toggleClass("collapse open");
});

/**
 * Form validation js
 */

(function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();
