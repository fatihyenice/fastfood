document.addEventListener('DOMContentLoaded', () => {
    AOS.init(); 

    const pages = Array.from(document.querySelectorAll(".page")).map(section => section.id); 
    const loader = document.getElementById('loader');

    function showLoader(duration = 500, scrollToTop = true) {
        loader.style.display = 'flex';
        setTimeout(() => {
            loader.style.display = 'none';
            if (scrollToTop) {
                window.scrollTo({
                    top: -1000,
                    behavior: "smooth",
                });
            }
        }, duration);
    }

    function changePage(NameOfSection){
        if(pages.includes(NameOfSection)){
            pages.forEach(page => {
                document.getElementById(page).classList.add("hidden");
            });
             
            document.getElementById(NameOfSection).classList.remove("hidden");  
        }  
    }
    
    function setupNavigation() {
        const links = document.querySelectorAll("[data-page]");
        links.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const page = link.getAttribute("data-page"); 
                window.location.hash = page;
            });
        });
    }

    function handleHashChange() {
        const currentPage = location.hash.replace("#", "") || pages[0];
     
        const shouldScrollTop = currentPage !== "nos-restaurants_section";
        showLoader(200, shouldScrollTop);
    
        setTimeout(() => {
            changePage(currentPage);
            rechargeProduitsAccueil();
        }, 200);
    }

    function rechargeProduitsAccueil(){
        fetch("/fetch/refresh/refreshProduits.php")
        .then(response => response.text())
        .then(data => {
            document.querySelector(".container--menus").innerHTML = data;
            menuAccueil();
        });
    }
 
    window.addEventListener("hashchange", handleHashChange);

    // Initialisation
    setupNavigation();
    handleHashChange();

    function menuAccueil(){
        const listMenuAccueil = document.querySelectorAll("#home .menus"); 
        listMenuAccueil.forEach((menu) => {
            menu.addEventListener('click', () => { 
                showLoader(200); 
                setTimeout(function(){
                    const form = new FormData();
                    form.append("id-produits", menu.getAttribute("data-id-produit"));

                    fetch("/fetch/recupererDetailProduits.php", {
                        method: "POST",
                        body: form,
                    })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("detail-menu").innerHTML = data; 
                        backArriere();
                    });
                    location.hash = "detail-menu";
                }, 300);    
            });
        })
    }
    
    function backArriere(){
        const menubtnarriere = document.querySelector('.retourner-arriere');
        if(menubtnarriere){
            menubtnarriere.addEventListener('click', () => {
                history.back();
            });
        }
    }

    const voirsixmenu = document.querySelector('.voirmenu')
    voirsixmenu.addEventListener('click', () => { 
        document.getElementById('nos-restaurants_section').scrollIntoView();
    });
    
    backArriere();
    menuAccueil();
});
