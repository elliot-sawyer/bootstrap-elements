document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelectorAll('.accordion-collapse').forEach(accordionitem => {
        accordionitem.addEventListener('hidden.bs.collapse', collapsed => {
            const name = collapsed.target.id,
                relURL = window.location.pathname;

            document.cookie = name + '=' + 0 + ";" + relURL;
        });

        accordionitem.addEventListener('shown.bs.collapse', uncollapsed => {
            const name = uncollapsed.target.id,
                relURL = window.location.pathname;

            document.cookie = name + '=' + 1 + ";" + relURL;
        });


    });
});
