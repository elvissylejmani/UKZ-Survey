(()=>{
    let links = document.getElementById('filter-by-set-sidebar').children;
    console.log(links);
    let mylinks = [...links];
    console.log(mylinks);
   
    
    mylinks.forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
            let active = mylinks.find(link=>{
                return link.classList.contains('active');
            })
            active.classList.remove('active');
            e.target.classList.add('active');
        })
    })
})()