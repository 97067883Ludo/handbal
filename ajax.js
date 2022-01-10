function sendMail() {
    document.getElementById('send').disabled = true;
    recipient = document.getElementById('Email').value;
    subject = document.getElementById('Subject').value;
    message = document.getElementById('Message').value;
    file = document.getElementById('file').value;
    document.getElementById('mailStatus').innerHTML = " ";

const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById('mailStatus').innerHTML = this.responseText;
        document.getElementById('send').disabled = false;
    }
    xhttp.open("GET", "mail.php?recipient="+recipient+"&subject="+subject+"&message="+message+"&file="+file);
    xhttp.send();
}