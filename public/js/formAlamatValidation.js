const nama_depan = document.querySelector('#nama_depan_required');
const nama_belakang = document.querySelector('#nama_belakang_required');
const telepon = document.querySelector('#telepon_required');
const email = document.querySelector('#email_required');
const alamat_lengkap = document.querySelector('#alamat_lengkap_required');

const provinsi = document.querySelector('#provinsi_required');
const kota = document.querySelector('#kota_required');
const kecamatan = document.querySelector('#kecamatan_required');

const kode_pos = document.querySelector('#kode_pos_required');
const submit = document.querySelector('#submit_modal_tambah');

submit.addEventListener('click', ()=>{
    if(nama_depan.validity.valueMissing){
        nama_depan.setCustomValidity('Nama depan anda masih kosong');
    } else if (nama_belakang.validity.valueMissing) {
        nama_belakang.setCustomValidity('Nama belakang anda masih kosong');
    } else if (telepon.validity.valueMissing) {
        telepon.setCustomValidity('Telepon anda masih kosong');
    } else if (email.validity.valueMissing) {
        email.setCustomValidity('Email anda masih kosong');
    } else if (alamat_lengkap.validity.valueMissing) {
        alamat_lengkap.setCustomValidity('Alamat lengkap anda masih kosong');
    } else if (provinsi.validity.valueMissing) {
        provinsi.setCustomValidity('Provinsi tujuan anda masih kosong');
    } else if (kota.validity.valueMissing) {
        kota.setCustomValidity('Kota tujuan anda masih kosong');
    } else if (kecamatan.validity.valueMissing) {
        kecamatan.setCustomValidity('Kecamatan tujuan anda masih kosong');
    } else if (kode_pos.validity.valueMissing) {
        kode_pos.setCustomValidity('Kode pos anda masih kosong');
    } else {
        nama_depan.setCustomValidity('');
        nama_belakang.setCustomValidity('');
        telepon.setCustomValidity('');
        email.setCustomValidity('');
        alamat_lengkap.setCustomValidity('');
        provinsi.setCustomValidity('');
        kota.setCustomValidity('');
        kecamatan.setCustomValidity('');
        kode_pos.setCustomValidity('');
    }
})