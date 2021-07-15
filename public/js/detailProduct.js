document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn").addEventListener("click", function() {
        valueCount = document.getElementById("quantity").value;
        valueCount++;
        document.getElementById("quantity").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn").removeAttribute("disabled");
            document.querySelector(".minus-btn").classList.remove("disabled")
        }
    })
    
document.querySelector(".minus-btn").addEventListener("click", function() {
    valueCount = document.getElementById("quantity").value;
    valueCount--;
    document.getElementById("quantity").value = valueCount

    if (valueCount == 1) {
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
    }
})

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("Slides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}