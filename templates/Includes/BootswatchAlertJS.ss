document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelectorAll('.alert-dismissible').forEach(alert => {
        alert.addEventListener('closed.bs.alert', dismissed => {
            const name = dismissed.target.id,
                relURL = window.location.pathname;

            document.cookie = name + '=' + 1 + ";" + relURL;
        });
    });
});
