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
    if(data.length == 0) showMoreBtn.remove()

    const translateCategory = {
        'societe':'مجتمع',
        'politique':'سياسة',
        'economie':'اقتصاد',
        'sport':'رياضة',
        'culture':'ثقافة',
        'international':'دولية',
        'faits-divers':'حوادث'
    }
   
    let articlesContainer = document.querySelector('.articles');
    for(let article of data){
      
        articlesContainer.innerHTML += `
        <div class="articles--card">
            <a href="/article/${article.slug}"><img src="${article['image_link']}" alt=""></a>
            <div class="body">
                <a href=""><span class="category">${translateCategory[article.category]}</span></a>
                <p class="title"><a href="">${article.title}</a></p>
                <p class="date">${article.date}</p>
            </div>
        </div>
        `
    }
}

let page = 2
let showMoreBtn  = document.querySelector('.moreBtn');



showMoreBtn.addEventListener('click' , function(){

    getData('/api?page=' , page , displayData)

})