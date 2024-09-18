let menu = doument.QuerySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');
menu.onclick = () =>{
    menu.classlist.toggle('fa-times');
    navbar.classlist.toggle('active');
};
window.onscroll = () =>{
    menu.classlist.remove('fa-times');
    navbar.classlist.remove('active');
};

var swiper = new swiper(".reviews-slider",{
    grabCursor: true,
    loop: true,
    spaceBetween: 20,
    autoHeight: true,
    breakpoints:{
        0:{
            slidesPerView:1,
        },
        700:{
            slidesPerView:2,
        },
        1000:{
            slodesPerView:3,
        },
    },
});
let loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;
loadMoreBtn.onclick = () =>{
    let boxes = [ ...document.querySelectorAll('.packages .box-container .box')];
    for (var i = currentItem; i< currentItem + 3; i++){
        boxes[i].style.display = 'inline-block';
    };
    currentItem += 3;
    if(currentItem >= boxes.length){
        loadMoreBtn.style.display = 'none';
    }
}

