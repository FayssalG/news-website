const menuBtn = document.querySelector('.menu')
const nav = document.querySelector('.nav')

menuBtn.addEventListener('click' , ()=>{
    nav.classList.toggle('show-nav')
})



const carousel = document.querySelector('.carousel__track')
const carouselList = document.querySelector('.carousel__list')
const rightArrow = document.querySelector('.right-arrow')
const leftArrow = document.querySelector('.left-arrow')

const dots = document.querySelectorAll('.dots li')

function setActiveDot(dots , increment){
    dots.forEach( d=>d.classList.remove('dot-active'))      
    dots.forEach((d)=>{
        d.classList.remove('dot-active')    
        if(d.dataset.slideTo == (carouselList.scrollLeft / carousel.scrollWidth + increment)){
            d.classList.add('dot-active')

        }
    })

}

rightArrow.addEventListener('click' , (e)=>{
    rightArrow.disabled = true
    setTimeout(()=>rightArrow.disabled=false , 500);
    if(carouselList.scrollLeft+carousel.scrollWidth >= carouselList.scrollWidth) return
    carouselList.scrollBy({
        top: 0,
        left: carousel.scrollWidth,
        behavior: "smooth",
      });
    
    setActiveDot(dots , 1)
})
leftArrow.addEventListener('click', ()=>{
    leftArrow.disabled = true
    setTimeout(()=>leftArrow.disabled=false , 500);

    if(carouselList.scrollLeft-carousel.scrollWidth < 0) return    
    carouselList.scrollBy({
        top: 0,
        left: -carousel.scrollWidth,
        behavior: "smooth",
      });

    setActiveDot(dots , -1)
    
})


for(let i=0 ; i<dots.length ; i++){
    // dots[i].onclick = ()=>{
    //     document.querySelector(`#slide_${dots[i].dataset.slideTo}`).scrollIntoView({
    //         behavior : 'smooth',
    //         block: 'end'
    //     })
    // }

    dots[i].onclick = (e)=>{
        carouselList.scroll({
            top : 0,
            left :   (carousel.scrollWidth * e.target.dataset.slideTo)   ,
            behavior : 'smooth'
        })
        dots.forEach((d)=>d.classList.remove('dot-active'))
        e.target.classList.add('dot-active')

    }
}