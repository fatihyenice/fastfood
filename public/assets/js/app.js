document.addEventListener('DOMContentLoaded', () => {
    AOS.init(); 

    const pages = Array.from(document.querySelectorAll(".page")).map(section => section.id);
    console.log(pages);

    function changePage(NameOfSection){
        if(pages.includes(NameOfSection)){
            pages.forEach(page => {
                document.getElementById(page).classList.add("hidden");
            });
             
            document.getElementById(NameOfSection).classList.remove("hidden");  
        }else{
            console.log("Page inexistante !");
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
        const currentPage = location.hash.replace("#", "") || "home";
        changePage(currentPage);
    }
 
    window.addEventListener("hashchange", handleHashChange);

    // Initialisation
    setupNavigation();
    handleHashChange();
    
});
