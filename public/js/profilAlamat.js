// Tambah Data Alamat
document.getElementById('button').addEventListener('click',function() {
    document.querySelector('#modalTambahAlamat').style.display = 'block';
    document.querySelector('#modalTambahAlamat').style.opacity = '1';
    document.querySelector('.popup-bg').style.display = 'block';
    document.querySelector('.popup-bg').style.opacity = '0.2'; 
    }   
);
document.getElementById('exitTambahAlamat').addEventListener('click',function() {
    document.querySelector('#modalTambahAlamat').style.display = 'none';
    document.querySelector('#modalTambahAlamat').style.opacity = '0';
    document.querySelector('.popup-bg').style.display = 'none';
    document.querySelector('.popup-bg').style.opacity = '0'; 
    }   
);

document.getElementById('button-sunting-main').addEventListener('click',function() {
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
    } 
);