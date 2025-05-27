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

    const categorie = document.querySelectorAll(".categorie");
    if(categorie){
        categorie.forEach(categorie => {
            categorie.addEventListener("click", () => {
                showLoader(400); 
                
                const categorieid = categorie.getAttribute('data-categorie-id');
                const formdatap = new FormData();
                formdatap.append("categorie-id", categorieid);
                
                fetch("/fetch/recupererDetailProduitCategorie.php", {
                    method: "POST",
                    body: formdatap
                })
                .then(response => response.text())
                .then(data => {
                     document.querySelector("#produit-categorie").innerHTML = data;
                     navbarCategorie();
                });

                location.hash = "produit-categorie";
            });
        });
    }

    function navbarCategorie(){
        const navbarCat = document.querySelectorAll(".navigation-container > ul li");
        navbarCat.forEach(liencategorie => {
            liencategorie.addEventListener("click", () => {
                const catId = liencategorie.getAttribute("data-navcatid");

                const formdatanav = new FormData();
                formdatanav.append("categorie-id", catId);
                
                fetch("/fetch/recupererDetailProduitCategorie.php", {
                    method: "POST",
                    body: formdatanav
                })
                .then(response => response.text())
                .then(data => {
                     document.querySelector("#produit-categorie").innerHTML = data;
                     navbarCategorie();
                });
            });
        });
    }

    function ouvrirMenuBurger(){ 
        const navbar = document.getElementById("navigation");
        const isActive = navbar.classList.toggle("nav-burger_active");
            document.querySelector(".icon-burger").style.justifyContent = isActive ? "end" : "center";     
            document.querySelector(".icon-burger").querySelector("i").classList.replace(isActive ? "ri-menu-line" : "ri-close-large-line", isActive ? "ri-close-large-line" : "ri-menu-line") 
    }

    const boutonBurgerMenu = document.querySelector(".icon-burger");

    if(boutonBurgerMenu){
        boutonBurgerMenu.addEventListener("click", function() { 
            ouvrirMenuBurger();
        });
    } 
    
    window.document.body.addEventListener('click', (e) => {
        const navbar = document.getElementById("navigation");
        const isActive = navbar.classList.contains("nav-burger_active"); 

        if (isActive && !e.target.closest("#navigation") && !e.target.closest(".icon-burger")) {
          ouvrirMenuBurger();  
        }
    }); 

    function refreshConnexion(){
        fetch("/fetch/refresh/refreshConnexion.php", {
            method: "POST", 
        })
        .then(response => response.text())
        .then(data => {
             document.querySelector("#order").innerHTML = data; 
             connexion();
        });
    }

    function refreshHeader(){
        fetch("/fetch/refresh/refreshHeader.php", {
            method: "POST", 
        })
        .then(response => response.text())
        .then(data => {
             document.querySelector("#navigation").innerHTML = data; 
             deconnexion();
        });
    }

    function connexion(){
        const btnConnexion = document.getElementById("btn-connexion");
        if(btnConnexion){
            btnConnexion.addEventListener("click", function() {
                    showLoader(100); 
    
                    const mail = document.getElementById("mail").value;
                    const mdp = document.getElementById("motdepasse").value;
                    const erreurform = document.querySelector(".erreurform");
                    const successform = document.querySelector(".successform");
    
                    erreurform.classList.remove("active");
                    successform.classList.remove("active"); 
                    
                    setTimeout(function(){
    
                        let form = {
                            mail: mail,
                            mdp: mdp,
                        }
                           
                        fetch("/fetch/connexion.php", {
                            method: "POST",
                            body: JSON.stringify(form)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(data.status == "error"){
                                erreurform.classList.add("active");
                                erreurform.innerText = data.message;
                            }else{
                                successform.classList.add("active");
                                successform.innerText = data.message;
    
                                setTimeout(function(){
                                    refreshConnexion();
                                    refreshHeader();
                                }, 400)
                            } 
                        })
    
                    }, 100);
            });
        }   
    }

    function deconnexion(){
        const btnDeconnexion = document.getElementById("logoutbtn");
        btnDeconnexion.addEventListener('click', () => {
            showLoader(300);  
                fetch("/fetch/deconnexion.php", {
                    method: "POST", 
                })
                .then(response => response.text())
                .then(data => {
                    refreshConnexion();
                    refreshHeader();

                    location.hash = "order";
                }); 
        });
    } 
    
    navbarCategorie();
    backArriere();
    menuAccueil();
    connexion();
    deconnexion();
    refreshHeader();
});
