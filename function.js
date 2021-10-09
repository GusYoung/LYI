/** code by webdevtrick ( https://webdevtrick.com ) **/
const listItems = document.querySelectorAll('.main li');
const allimages = document.querySelectorAll('.main .container-fluid .images');
console.log(allimages)

function toggleActiveClass(active){
    listItems.forEach(item => {
      item.classList.remove('active');
    })
    active.classList.add('active');
}

function toggleimages(dataClass){
    if(dataClass === 'all'){
        for(let i = 0; i<allimages.length; i++){
            allimages[i].style.display = 'block';
        }
    }else{
        for(let i = 0; i<allimages.length; i++)
            allimages[i].dataset.class === dataClass ? allimages[i].style.display = 'block' : allimages[i].style.display = 'none';
    }
}

for(let i = 0; i < listItems.length; i++){
    listItems[i].addEventListener('click', function(){
        toggleActiveClass(listItems[i]);
        toggleimages(listItems[i].dataset.class);
    });
}
