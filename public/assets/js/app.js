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
                    top: 0,
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
            rechargeProduitsHome();
        }, 200);
    }

    function rechargeProduitsHome(){
        fetch("/fetch/rechargeProduits.php")
        .then(response => response.text())
        .then(data => {
            document.querySelector(".container--menus").innerHTML = data;
        });
    }
 
    window.addEventListener("hashchange", handleHashChange);

    // Initialisation
    setupNavigation();
    handleHashChange();
});
