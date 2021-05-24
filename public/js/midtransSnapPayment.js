var payButton = document.getElementById('pay-button');
if (document.getElementById('snap_token')) {
  var snapToken = document.getElementById('snap_token').value;
    // For example trigger on button clicked, or any time you need
    payButton.addEventListener('click', function () {
      snap.pay(snapToken); // Replace it with your transaction token
    });
}