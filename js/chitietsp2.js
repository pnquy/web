let img = document.querySelector('.slider-for img')
let mirror = document.querySelector('#mirror');

img.addEventListener('mousemove', function(e){
    mirror.style.top='${e.clientY}px'
    mirror.computedStyleMap.left =  '${e.clientX}px'

})
