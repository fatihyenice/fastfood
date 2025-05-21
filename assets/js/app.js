document.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    const logo = document.querySelector('header .logo');
    const nav = document.querySelector('nav');

    if (window.scrollY >= 150) {
        header.style.transition = "all 0.2s";
        header.style.height = "60px";
        logo.style.height = "60px";
        nav.style.top = "59px";
    } else {
        header.style.transition = "all 0.2s";
        header.style.height = "100px";
        logo.style.transition = "all 0.2s";
        logo.style.height = "100px";
        nav.style.transition = "all 0.2s";
        nav.style.top = "99px"; // <- Ajout important
    }
});
