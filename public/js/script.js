(()=>{
    document.getElementById('trigger-dropdown').addEventListener('click',()=>{
        document.getElementById('dropdown-menu').classList.toggle('hide');
    })
    document.getElementById('hamburger').addEventListener('click',()=>{
        document.getElementById('sidebar').classList.toggle('hide');
    })
})()