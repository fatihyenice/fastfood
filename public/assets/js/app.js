document.addEventListener('DOMContentLoaded', () => {
    AOS.init(); 

    const pages = Array.from(document.querySelectorAll(".page")).map(section => section.id); 
    const loader = document.getElementById('loader');

    function showLoader(duration = 500) {
        loader.style.display = 'flex';
        setTimeout(() => {
            loader.style.display = 'none';
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
        showLoader(200);  
        const currentPage = location.hash.replace("#", "") || pages[0];
        setTimeout(() => {
            changePage(currentPage);
        }, 200);
    }
 
    window.addEventListener("hashchange", handleHashChange);

    // Initialisation
    setupNavigation();
    handleHashChange();
    
});
