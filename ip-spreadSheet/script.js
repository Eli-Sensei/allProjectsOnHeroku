let myIpAdress = "";
let myUA = navigator.userAgent;

fetch("https://api.ipify.org?format=text").then((response) => {
    return response.text();
}).then(function(myIp){
    console.log(myIp);
    myIpAdress = myIp;
    document.body.innerHTML += `mon ip est ${myIpAdress}`;

    let formdata = new FormData();
    formdata.append("userIp", myIpAdress);
    formdata.append("userAgent", myUA);

    let requestOptions = {
    method: 'POST',
    body: formdata
    };

    fetch("https://script.google.com/macros/s/AKfycbygoVfRFyLHSI9v4vrW5aX-6w5iNrq00Zw172YH8Pyv9Sv7BMM/exec", requestOptions)
    /*.then(response => response.json())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));*/
}).then(response => response.json())
.then(result => console.log(result))
.catch(error => console.log('error', error));

