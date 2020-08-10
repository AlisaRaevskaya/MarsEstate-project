let loadText = document.querySelector('.preloader-text');
let preloader = document.querySelector('.preloader');
let main = document.querySelector('main');
let dots =1;

console.log(main);
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



function finishPreloading(){
    preloader.style.opacity= 0;
    setTimeout(()=>{
        preloader.style.display ="none";
    },500);
}


window.addEventListener('load', onLoadfunc);

function onLoadfunc(){
window.setTimeout(()=>{
    finishPreloading();
}, 3500);

window.removeEventListener('load', onLoadfunc);
}



