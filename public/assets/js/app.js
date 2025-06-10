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
            document.querySelector(".icon-burger").style.justifyContent = isActive ? "end" : "end";    
            navbar.style.zIndex = "999999899 !important"; 
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
             registerBtn();
             loginBtn();
             registerValidation();
             recherche();
             updateProduitCommande();
             refreshBouttonPanier();
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
        const btnConnexion = document.querySelector(".login-form");
        if(btnConnexion){
            btnConnexion.addEventListener("submit", function(e) {
                e.preventDefault();
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
        if(btnDeconnexion){
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
    } 

    function registerBtn(){
        const btnregister = document.querySelector(".btn-register");
        const registerSection = document.querySelector(".register-section");
        const loginSection = document.querySelector(".login-section");
        if(btnregister){ 
            btnregister.addEventListener("click", () => {
                registerSection.classList.toggle("active");
                loginSection.classList.toggle('active');
            });
        }
    }

    function loginBtn(){
        const btnlogin = document.querySelector(".btn-login");
        const registerSection = document.querySelector(".register-section");
        const loginSection = document.querySelector(".login-section");
        if(btnlogin){ 
            btnlogin.addEventListener("click", () => {
                registerSection.classList.toggle("active");
                loginSection.classList.toggle('active');
            });
        }
    }

    function registerValidation() {
        const btninscription = document.querySelector(".register-form");
        if(btninscription){
            btninscription.addEventListener("submit", (e) => {
                e.preventDefault();
                const nom = document.getElementById("nom").value;
                const prenom = document.getElementById("prenom").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;
                const confirmPassword = document.getElementById("confirm-password").value;
                const erreurform = document.querySelector(".erreurform");
                const successform = document.querySelector(".successform");
    
                erreurform.classList.remove("active");
                successform.classList.remove("active"); 
                
                const donnees = {
                    nom: nom,
                    prenom: prenom,
                    email: email,
                    password: password,
                    confirmPassword: confirmPassword,
                }
                
                showLoader(300);  

                setTimeout(function(){
                    fetch("/fetch/inscription.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(donnees)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status == "error"){
                            erreurform.classList.add("active");
                            erreurform.innerText = data.message;
                        }else{
                            successform.classList.add("active");
                            successform.innerText = data.message;  
                            
                            document.querySelector(".register-form").reset();
                        } 
                    }) 
                }, 300);
            });
        }
    }

    function recherche(){
        const inputville = document.getElementById("nomville");

        if(inputville){
            inputville.addEventListener('input', () => {
                if(inputville.value.length > 2){
                    showLoader(10);  

                    const formData = new FormData();
                    formData.append("ville", inputville.value);

                    setTimeout(function(){
                        fetch("/fetch/restaurant.php", {
                            method: "POST", 
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("resultat-restau").innerHTML = data;
                            choixRestaurant();
                        }) 
                    }, 300);
                }else{
                    document.querySelectorAll("input[name='restaurant'], input[name='restaurant'] + label").forEach(e => e.remove())
                }
            });
        }
    }

    function choixRestaurant() {
        const restaurants = document.querySelectorAll("input[name='restaurant']");
        const btnsuivant = document.querySelector(".btn-suivant");
        let selectedRestaurant = null;
        let nomRestaurant = null;
    
        if (restaurants && btnsuivant) {
            restaurants.forEach(inputRadio => {
                inputRadio.addEventListener("click", () => {
                    if (inputRadio.checked) {
                        selectedRestaurant = inputRadio.value;
                        nomRestaurant = inputRadio.nextElementSibling.innerText;
                        btnsuivant.classList.add("choixfait");
                    }
                });
            });
    
            btnsuivant.addEventListener("click", () => {
                if (!selectedRestaurant) {
                    alert("Veuillez d'abord choisir un restaurant.");
                    return;
                }else{ 
                    Swal.fire({
                        title: "Êtes-vous sûr ?",
                        text: "Vous avez choisi le restaurant " + nomRestaurant,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Oui, je suis sûr !",
                        cancelButtonText: "Non, je veux changer de restaurant",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = new FormData();
                            form.append("restaurant", selectedRestaurant);
        
                            fetch("/fetch/commandeschoix.php", {
                                method: "POST",
                                body: form
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() === "ok") {
                                    refreshConnexion();
                                }
                            });
                        }
                    });
                }
            });
        }
    }    

    function updateProduitCommande(){
        const menulatteralli = document.querySelectorAll(".menulatteral ul li");
        menulatteralli.forEach(choix => {
            choix.addEventListener("click", () => {
                const dataCat = choix.getAttribute("data-catidcommande");
                const donnee = new FormData();
                donnee.append("id", dataCat);

                fetch("/fetch/recupererDetailPageCommande.php", {
                    method: "POST",
                    body: donnee
                })
                .then(response => response.text())
                .then(data => {
                    refreshBouttonPanier();
                    document.querySelector('.produit-commande').innerHTML = data;
                })
            });
        });
    }

    function refreshBouttonPanier(){
        const userdonnee = new FormData();
        userdonnee.append("userid", document.querySelector(".btn-validerpanier").getAttribute("datauserId"));
        fetch("/fetch/refresh/refreshBtnPanier.php", {
            method: "POST",
            body: userdonnee
        })
        .then(response => response.text())
        .then(data => {
            if(data){
                document.querySelector('.panier-bottom').innerHTML = data;
            }
        })
    } 
 
    
    navbarCategorie();
    backArriere();
    menuAccueil();
    connexion();
    deconnexion(); 
    refreshConnexion();
    registerBtn();
    loginBtn();
    registerValidation();
    recherche();
    updateProduitCommande();
    refreshBouttonPanier();
});
