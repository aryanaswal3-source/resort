
"use strict";

/*==============================
        STICKY NAVBAR
===============================*/

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".custom-navbar");

    if (window.scrollY > 100) {

        navbar.classList.add("sticky");

    } else {

        navbar.classList.remove("sticky");

    }

});


/*==============================
    CLOSE MOBILE MENU
===============================*/

/*==============================
CLOSE MOBILE MENU
===============================*/

const navbarCollapse = document.querySelector("#mainNavbar");

document.querySelectorAll(".dropdown-menu .dropdown-item, .navbar-nav > .nav-item > .nav-link:not(.dropdown-toggle)")
    .forEach(link => {

        link.addEventListener("click", function () {

            if (window.innerWidth < 992) {

                const bsCollapse = bootstrap.Collapse.getOrCreateInstance(navbarCollapse);
                bsCollapse.hide();

            }

        });

    });


/*==============================
    MOBILE DROPDOWN
===============================*/

/*==============================
 MOBILE DROPDOWN
===============================*/

if (window.innerWidth < 992) {

    document.querySelectorAll(".dropdown-toggle").forEach(function (item) {

        item.addEventListener("click", function (e) {

            e.preventDefault();
            e.stopPropagation();

            const submenu = this.nextElementSibling;

            // Close other open dropdowns
            document.querySelectorAll(".dropdown-menu.show").forEach(function (menu) {
                if (menu !== submenu) {
                    menu.classList.remove("show");
                }
            });

            // Toggle current dropdown
            submenu.classList.toggle("show");

        });

    });

}


/*==============================
        ACTIVE LINK
===============================*/

const currentLocation = window.location.href;

const menuItem = document.querySelectorAll(".navbar-nav .nav-link");

menuItem.forEach(link => {

    if (link.href === currentLocation) {

        link.classList.add("active");

    }

});


/*==============================
    SCROLL TO TOP (Future Use)
===============================*/

window.addEventListener("load", () => {

    document.body.classList.add("loaded");

});
