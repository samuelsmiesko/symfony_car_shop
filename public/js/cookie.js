let cookieModal = document.querySelector('#modalCookie');
let cancelCookieBtn = document.querySelector('#CancelBtn');
let acceptCookieBtn = document.querySelector('#AcceptBtn');
let spinnerWrapper = document.querySelector('.spinner-wrapper');

console.log(document.cookie,"document.cookie");
// @ts-ignore
if (document.cookie != "reject=30" || document.cookie != "accept=30") {
    cookieModal.classList.add("d-block");
    spinnerWrapper.classList.add("d-block");
}


cancelCookieBtn.addEventListener("click", function () {
    cookieModal.classList.add("d-none");
    spinnerWrapper.classList.add("d-none");
    let CookieValue = 'reject';
    setCookie(CookieValue, 30);
});

acceptCookieBtn.addEventListener("click", function () {
    cookieModal.classList.add("d-none");
    localStorage.setItem("AcceptCookie", "yes");
    spinnerWrapper.classList.add("d-none");
    let CookieValue = 'accept';
    setCookie(CookieValue, 30);
});

console.log(document.cookie);
console.log(document.cookie === "reject=30");


// Set a Cookie
function setCookie(cName, cValue, expDays) {
    let date = new Date();
    
    date.setTime(date.getTime() + ( 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}
// Apply setCookie