let loadText =document.querySelector('.preloader .preloader-text');
let dots =1;


setInterval(()=>{
    switch(dots){
        case 1:
        loadText.textContent ="...Loading";
        dots++;
        break;
    case 2:
        loadText.textContent ="..Loading.";
        dots++;
        break;  
    case 3:
    loadText.textContent =".Loading..";
    dots++;
    break;  
    case 4:
    loadText.textContent ="Loading...";
    dots++;
    break;      
    case 5:
    loadText.textContent =".Loading..";
    dots++;
    break;  
    case 6:
    loadText.textContent ="..Loading.";
    dots=1;
    break;  
}
}, 500);

let preloader = document.querySelector('.preloader');
let main = document.querySelector('main');

function finishPreloading(){
    preloader.style.opacity= 0;
    setTimeout(()=>{
        preloader.style.display ="none";
    },500);
}

window.onload = function(main){
setTimeout(()=>{
    finishPreloading();
}, 2000);
}