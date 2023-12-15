
    // mobile menu
 
    var l = document.querySelector(".menu-icon.open"),
        s = document.querySelector(".menu-mobile"),
        a = document.querySelector(".menu-icon.close"),
        r = document.querySelector("body"),
        d = document.querySelectorAll(".menu-link");
    
    /////////////
    // Events
    /////////////
 
    l.addEventListener("click", function() {
        s.classList.add("open-menu"),
        d.forEach(function(e) {
            e.classList.add("anime-menu-items")
        }),
        s.classList.remove("close-menu"),
        r.classList.add("noscroll");
    }),
 
    a.addEventListener("click", function() {
        s.classList.remove("open-menu"),
        d.forEach(function(e){
            e.classList.remove("anime-menu-items")
        }),
        s.classList.add("close-menu"),
        r.classList.remove("noscroll")
    });