// Tambah jumlah barang
$('.add').on('click', function () {
    detailHarga = $(this).closest('tr.table-mid').find('.detail-harga');
    jumlahSementara = $(this).prev();
    jumlahHarga = $(this).closest('tr.table-mid').find('.jumlah-harga');
    totalHargaKeranjang = $(this).parentsUntil('.isi-table').find('#total-harga-akhir');
    // console.log(totalHargaKeranjang.val());
    
    jumlahSementara.val(+jumlahSementara.val() + 1);
    jumlahHarga.val(+detailHarga.val() * parseInt(jumlahSementara.val()));
    totalHargaKeranjang.val(+totalHargaKeranjang.val() + parseInt(detailHarga.val()));
});

// Mengurangi jumlah barang
$('.sub').on('click', function () {
    detailHarga = $(this).closest('tr.table-mid').find('.detail-harga');
    jumlahSementara = $(this).next();
    jumlahHarga = $(this).closest('tr.table-mid').find('.jumlah-harga');
    totalHargaKeranjang = $(this).parentsUntil('.isi-table').find('#total-harga-akhir');

    if (jumlahSementara.val() > 1) {
        if (jumlahSementara.val() > 1) jumlahSementara.val(+jumlahSementara.val() - 1);
        jumlahHarga.val(+detailHarga.val() * parseInt(jumlahSementara.val()));
        totalHargaKeranjang.val(+totalHargaKeranjang.val() - parseInt(detailHarga.val()));
    }
});

// Delete row
$(".hapus-row").on('click', function () {
    jumlahHarga = $(this).closest('tr.table-mid').find('.jumlah-harga');
    totalHargaKeranjang = $(this).parentsUntil('.isi-table').find('#total-harga-akhir');
    // console.log(jumlahHarga.val());
    totalHargaKeranjang.val(+totalHargaKeranjang.val() - parseInt(jumlahHarga.val()));
    $(this).closest('tr').remove();
});



    
    // document.querySelector("#plus-btn-1").addEventListener("click", function() {
    //     var valueCount;
    //     valueCount = document.getElementById("quantity-barang-1").value;
    //     valueCount++;
    //     document.getElementById("quantity-barang-1").value = valueCount;
    //     console.log(valueCount);
    //     if (valueCount > 1) {
    //         document.querySelector("#minus-btn-1").removeAttribute("disabled");
    //         document.querySelector("#minus-btn-1").classList.remove("disabled")
    //     }
    // });

    // document.querySelector("#minus-btn-1").addEventListener("click", function() {
    //     var valueCount;
    //     valueCount = document.getElementById("quantity-barang-1").value;
    //     valueCount--;
    //     document.getElementById("quantity-barang-1").value = valueCount;
    //     console.log(valueCount);
    //     if (valueCount == 1) {
    //         document.querySelector("#minus-btn-1").setAttribute("disabled", "disabled")
    //     }
    // });

    // document.querySelector("#plus-btn-2").addEventListener("click", function() {
    //     var valueCount;
    //     valueCount = document.getElementById("quantity-barang-2").value;
    //     valueCount++;
    //     document.getElementById("quantity-barang-2").value = valueCount;
    //     console.log(valueCount);
    //     if (valueCount > 1) {
    //         document.querySelector("#minus-btn-2").removeAttribute("disabled");
    //         document.querySelector("#minus-btn-2").classList.remove("disabled")
    //     }
    // });

    // document.querySelector("#minus-btn-2").addEventListener("click", function() {
    //     var valueCount;
    //     valueCount = document.getElementById("quantity-barang-2").value;
    //     valueCount--;
    //     document.getElementById("quantity-barang-2").value = valueCount;
    //     console.log(valueCount);
    //     if (valueCount == 1) {
    //         document.querySelector("#minus-btn-2").setAttribute("disabled", "disabled")
    //     }
    // });

    // /*Mobile*/
    // document.querySelector(".minus-btn2-mobile").setAttribute("disabled", "disabled");
    // var valueCount
    // document.querySelector(".plus-btn2-mobile").addEventListener("click", function() {
    //     valueCount = document.getElementById("quantity2-mobile").value;
    //     valueCount++;
    //     document.getElementById("quantity2-mobile").value = valueCount;
    //     if (valueCount > 1) {
    //         document.querySelector(".minus-btn2-mobile").removeAttribute("disabled");
    //         document.querySelector(".minus-btn2-mobile").classList.remove("disabled")
    //     }
    // })
    // document.querySelector(".minus-btn2-mobile").addEventListener("click", function() {
    //     valueCount = document.getElementById("quantity2-mobile").value;
    //     valueCount--;
    //     document.getElementById("quantity2-mobile").value = valueCount

    //     if (valueCount == 1) {
    //         document.querySelector(".minus-btn2-mobile").setAttribute("disabled", "disabled")
    //     }
    // })
    // document.getElementById("hapus-mobile").addEventListener("click", function(){
    // document.querySelector('.tabel-mobile').style.display = 'none';
    // })
    // document.querySelector(".minus-btn3-mobile").setAttribute("disabled", "disabled");
    // var valueCount
    // document.querySelector(".plus-btn3-mobile").addEventListener("click", function() {
    //     valueCount = document.getElementById("quantity3-mobile").value;
    //     valueCount++;
    //     document.getElementById("quantity3-mobile").value = valueCount;
    //     if (valueCount > 1) {
    //         document.querySelector(".minus-btn3-mobile").removeAttribute("disabled");
    //         document.querySelector(".minus-btn3-mobile").classList.remove("disabled")
    //     }
    // })
    // document.querySelector(".minus-btn3-mobile").addEventListener("click", function() {
    //     valueCount = document.getElementById("quantity3-mobile").value;
    //     valueCount--;
    //     document.getElementById("quantity3-mobile").value = valueCount

    //     if (valueCount == 1) {
    //         document.querySelector(".minus-btn3-mobile").setAttribute("disabled", "disabled")
    //     }
    // })
    // document.getElementById("hapus2-mobile").addEventListener("click", function(){
    // document.querySelector('.tabel-mobile-2').style.display = 'none';
    // })