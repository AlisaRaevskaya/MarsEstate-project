// //появление элементов
var isScrolling = false;
console.log(isScrolling);
 
window.addEventListener("scroll", throttleScroll, false);
 
function throttleScroll(e) {
    if (isScrolling == false ) {
        window.requestAnimationFrame(function() {
            scrolling(e);
          isScrolling = false;
        });
    }
    isScrolling = true;
} 

document.addEventListener("DOMContentLoaded", scrolling, false);

var listItems = document.querySelectorAll(".item");

function scrolling(e) {
    
    for (var i = 0; i < listItems.length; i++) {
        var listItem = listItems[i];
        console.log(listItem);

          listItem.classList.add("active");
        } else {
          listItem.classList.remove("active");
        }
    }
};

   // //Определение частично видимых элементов
function isPartiallyVisible(el) {
    var elementBoundary = el.getBoundingClientRect();
 
    var top = elementBoundary.top;
    var bottom = elementBoundary.bottom;
    var height = elementBoundary.height;
 
    return ((top + height >= 0) && (height + window.innerHeight >= bottom));
};


//Определение полностью видимых элементов

//getBoundingClientRect. Этот метод возвращает некий прямоугольник, который ограничивает ту самую видимую область, 
//со значениями относительно left, top, right, bottom, а также относительно левого верхнего угла браузера и его основных свойств (ширины и высоты окна). 

//Такой вызов планирует запуск функции callback на ближайшее время, когда браузер сочтёт возможным осуществить анимацию.
//Если в callback происходит изменение элемента, тогда оно будет сгруппировано с другими requestAnimationFrame и CSS-анимациями. 
//Таким образом браузер выполнит один геометрический пересчёт и отрисовку, вместо нескольких.