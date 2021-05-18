// Tambah Data Alamat
if (document.getElementById('button')) {
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
}

if(document.getElementById('button-sunting-main')) {
    document.getElementById('button-sunting-main').addEventListener('click',function() {
        document.querySelector('#modalSuntingAlamat-1').style.display = 'block';
        document.querySelector('.popup-bg').style.display = 'block';
        document.querySelector('#modalSuntingAlamat-1').style.opacity = '1';
        document.querySelector('.popup-bg').style.opacity = '0.2';   
        }  
    );

    document.getElementById('exitSuntingAlamat-1').addEventListener('click',function() {
        document.querySelector('#modalSuntingAlamat-1').style.display = 'none';
        document.querySelector('#modalSuntingAlamat-1').style.opacity = '0';
        document.querySelector('.popup-bg').style.display = 'none';
        document.querySelector('.popup-bg').style.opacity = '0'; 
        }   
    );
}

if(document.getElementById('button-sunting-2')) {
    document.getElementById('button-sunting-2').addEventListener('click',function() {
        document.querySelector('#modalSuntingAlamat-2').style.display = 'block';
        document.querySelector('.popup-bg').style.display = 'block';
        document.querySelector('#modalSuntingAlamat-2').style.opacity = '1';
        document.querySelector('.popup-bg').style.opacity = '0.2'; 
        } 
    );

    document.getElementById('exitSuntingAlamat-2').addEventListener('click',function() {
        document.querySelector('#modalSuntingAlamat-2').style.display = 'none';
        document.querySelector('#modalSuntingAlamat-2').style.opacity = '0';
        document.querySelector('.popup-bg').style.display = 'none';
        document.querySelector('.popup-bg').style.opacity = '0'; 
        }   
    );
}

// profil informasi akun pop up ubah password
if(document.getElementById('ubah')) {
    document.getElementById('ubah').addEventListener('click',function() {
        document.querySelector('.popup-ubah').style.display = 'block';
        document.querySelector('.popup-ubah').style.opacity = '1';
        document.querySelector('.popup-bg').style.display = 'block';
        document.querySelector('.popup-bg').style.opacity = '0.2'; 
    });
    
    document.getElementById('exitModal').addEventListener('click',function() {
        document.querySelector('.popup-ubah').style.display = 'none';
        document.querySelector('.popup-ubah').style.opacity = '0';
        document.querySelector('.popup-bg').style.display = 'none';
        document.querySelector('.popup-bg').style.opacity = '0'; 
        }   
    );
}

if(document.getElementById('oke')) {
    document.getElementById('oke').addEventListener('click',function() {
        document.querySelector('.modal').style.display = 'none';
    });
}