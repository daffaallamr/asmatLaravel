const header = document.querySelector("nav")
const sectionOne = document.querySelector(".about")

const sectionOneOptions = {};

const sectionOneObserver = new IntersectionObserver(function(
    entries, 
    sectionOneObserver
) {
    entries.forEach(entry => {
        if(!entry.isIntersecting){
            header.classList.add('#nav-bg')
        }
    })
}, 
sectionOneOptions);
sectionOneObserver.observe(sectionOne);

document.getElementById('button').addEventListener('click',function() {
document.querySelector('navbar .container').style.display = 'block'; }
);

document.getElementById('button').addEventListener('click',function() {
    document.querySelector('.popup').style.display = 'block';
    document.querySelector('.popup-bg').style.display = 'block';
    document.querySelector('.popup').style.opacity = '1';
    document.querySelector('.popup-bg').style.opacity = '0.2';
}
    
);
    document.getElementById('button-sunting').addEventListener('click',function() {
    document.querySelector('.popup').style.display = 'block';
    document.querySelector('.popup-bg').style.display = 'block';
    document.querySelector('.popup').style.opacity = '1';
    document.querySelector('.popup-bg').style.opacity = '0.2';   
}
    
);
    document.getElementById('button-sunting-2').addEventListener('click',function() {
    document.querySelector('.popup').style.display = 'block';
    document.querySelector('.popup-bg').style.display = 'block';
    document.querySelector('.popup').style.opacity = '1';
    document.querySelector('.popup-bg').style.opacity = '0.2'; 
});

