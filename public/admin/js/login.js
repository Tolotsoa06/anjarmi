function getLogin() {
    if (window.sessionStorage.getItem('id_user')) {

    } else {
        window.location.href = 'login.html';
    }
}

function logOut() {
    window.localStorage.clear();
    window.location.href = 'login.php';
}

$(".logOut").on('click', function() {
    logOut();
})