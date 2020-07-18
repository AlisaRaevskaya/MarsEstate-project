window.addEventListener("scroll", scrollCounter);

let time=2000;//время вывода числа
let step =5;//шаг
let block = document.querySelector(".stats-container");
// block.style.cssText ="background:lightblue; font-size:80px; width:300px;height:300px; display:flex";
let blockOffset = block.getBoundingClientRect().top; // отступ сверху
console.log(block, blockOffset);




//числовая анимация
function outNum(num, elem){
    let counter = 0;//счетчик
    let t  = Math.round(time/(num/step));
    //время,через которое повторяется счетчик
    let l = document.querySelector(elem);

    let interval = setInterval(() =>{
        counter+=step;
        if (counter===num){
            clearInterval(interval);//отменяет многократные повторения действий, установленные вызовом функции setInterval().
        }
        l.innerHTML= counter;
    }, t);
    }

function scrollCounter() {
    console.log("прокрутка " + window.pageYOffset);
    if (window.pageYOffset <= blockOffset){
        outNum(1000, ".stats_count_contract");
        outNum(200, ".stats_count_years");
        outNum(50, ".stats_count_agents");
        outNum(250, ".stats_count_clients");
        this.removeEventListener('scroll', scrollCounter);
    } else{
        this.removeEventListener('scroll', scrollCounter);
    }
}
function fixCount(elem, count){
document.querySelector(elem).innerHTML(count);
}

//авторизация закрытие
let close = document.querySelector('.close-modal');
close.addEventListener("click", function(){
    window.location.href="main.html";
});


