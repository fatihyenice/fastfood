document.querySelector('.jecommande').addEventListener('click', () => {
    document.getElementById('modalcommande').style.display = "block";
    document.body.classList.add('decalage-gauche');
    document.body.style.overflow = "hidden";
    document.getElementById('modalcommande--droite').scrollTop = "0px";
});

document.querySelector('.modalcommande-close').addEventListener('click', () => {
    document.getElementById('modalcommande').style.display = "none";
    document.body.classList.replace('decalage-gauche', "decalage-droite");
    document.body.style.overflowY = "scroll";
});