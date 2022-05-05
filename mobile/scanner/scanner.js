// Create instance of the object.
// The only argument is the “id” of HTML element created above.const html5QrCode = new Html5Qrcode(“reader”);
html5QrCode.start(
    cameraId, // retreived in the previous step.
    {
       fps: 10,    // sets the framerate to 10 frame per second 
       qrbox: 250  // sets only 250 X 250 region of viewfinder to
                   // scannable, rest shaded.
  },
  qrCodeMessage => {     // do something when code is read. For example:
      console.log('QR Code detected: ${qrCodeMessage}');
  },
  errorMessage => {     // parse error, ideally ignore it. For example:
      console.log('QR Code no longer in front of camera.');
  })
  .catch(err => {     // Start failed, handle it. For example, 
      console.log('Unable to start scanning, error: ${err}');
  });

  html5QrCode.stop().then(ignore => {
    // QR Code scanning is stopped. 
    console.log('QR Code scanning stopped.');
  }).catch(err => { 
    // Stop failed, handle it. 
    console.log('Unable to stop scanning.');
   });