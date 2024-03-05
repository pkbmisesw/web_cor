$(window).on("scroll", () => {
    var scrolled = document.documentElement.scrollTop;
    if(scrolled > 45){
        $(".floating-button").addClass("active-progress")
    }
    if(scrolled < 45){
        $(".floating-button").removeClass("active-progress")
    }
});