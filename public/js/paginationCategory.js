function getData(url , p , display){
    fetch(url+p)
    .then(res=>{
        return res.json()
    })
    .then(({data })=>{
        display(data)                
        page++
    })
    .catch(err=>{
        console.log(err)
    })
}


function displayData(data){
    let articlesContainer = document.querySelector('.category--articles');
    if(data.length == 0) showMoreBtn.remove()
    for(let article of data){
        articlesContainer.innerHTML += `
            <div class="card">
                <div class="card-image">
                    <a href="/article/${article.slug}">
                        <img src="${article['image_link']}" alt="${article.title}">
                    </a>
                </div>
                <div class="card-body">
                    <span class="date">${article.date}</span>
                    <h2 class="title">${article.title}</h2>
                </div>
            
            </div>
        `
    }
}

let page = 2
let showMoreBtn  = document.querySelector('.moreBtn');

showMoreBtn.addEventListener('click' , function(){
    let category = location.href.split('/')[3]
    getData(`/api/${category}/?page=` , page , displayData)

})