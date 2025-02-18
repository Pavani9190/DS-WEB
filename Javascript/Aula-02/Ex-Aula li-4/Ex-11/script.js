window.onload = function() {
    let msg = document.createElement("div");
    msg.innerText = "Bem-Vindo!";
    msg.style.background = "lightgreen";
    msg.style.padding = "10px";
    msg.style.marginTop = "10px";
    msg.style.border = "1px solid green";
    msg.style.textAlign = "center";
    msg.style.borderRadius = "5px"
    document.body.prepend(msg);
};