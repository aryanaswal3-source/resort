
    "use strict";

    /*==============================
            STICKY NAVBAR
    ===============================*/

    window.addEventListener("scroll", function() {

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

    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    const navbarCollapse = document.querySelector(".navbar-collapse");

    navLinks.forEach(link => {

        link.addEventListener("click", () => {

            if (window.innerWidth < 992) {

                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);

                if (bsCollapse) {

                    bsCollapse.hide();

                }

            }

        });

    });


    /*==============================
        MOBILE DROPDOWN
    ===============================*/

    if (window.innerWidth < 992) {

        document.querySelectorAll(".dropdown-toggle").forEach(function(item) {

            item.addEventListener("click", function(e) {

                e.preventDefault();

                let submenu = this.nextElementSibling;

                if (submenu.style.display === "block") {

                    submenu.style.display = "none";

                } else {

                    document.querySelectorAll(".dropdown-menu").forEach(function(menu) {

                        menu.style.display = "none";

                    });

                    submenu.style.display = "block";

                }

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
