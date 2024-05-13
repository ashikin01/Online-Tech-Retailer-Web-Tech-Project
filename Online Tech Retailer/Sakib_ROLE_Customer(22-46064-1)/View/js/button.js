const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('.menu a').

forEach(link => {
    if(link.href.includes(`${activePage}`)){
        // console.log(`${activePage}`);
        link.classList.add('active');
    }
    // console.log(link.href)
    
})
