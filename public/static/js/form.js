
let container = document.querySelector(".dws-form");
console.log(container.children);

let form = document.querySelectorAll(".tab-form");
console.log(form);

container.addEventListener('click', switchTab);

function switchTab(event){
  
    for (elem of this.children){

switch (event.target){
case this.children[0]:
this.children[1].classList.remove("active");
this.children[3].classList.remove("active");
this.children[0].classList.add("active");
this.children[2].classList.add("active");

break;
case this.children[1]:
this.children[2].classList.remove("active");
this.children[0].classList.remove("active");
this.children[1].classList.add("active");
this.children[3].classList.add("active");

break;
      
}   
    }
}

let userInputArray = Array.from(document.querySelectorAll(".userInput"));
console.log(userInput);

for (elem of userInputArray){
console.log(elem);

elem.addEventListener("focus", function () {
console.log(this.previousElementSibling);
this.previousElementSibling.classList.add("focus");
})

elem.addEventListener("blur", function () {
if(this.value === 0)
this.previousElementSibling.classList.remove("focus");
})

};
