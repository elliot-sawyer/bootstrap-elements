document.addEventListener("DOMContentLoaded", function(event) {
    Fancybox.bind('[data-fancybox="gallery"]', {
        Slideshow: {
            progressParentEl: (slideshow) => {
                return slideshow.instance.container;
            }
        }
    });
});
