document.body.innerHTML += `
    <div id="box" style="width: 300px; height: 300px; background-color: blue; transition: all 0.3s;"></div>`;

const box = document.getElementById("box");
box.onmouseover = function () {
    box.style.backgroundColor = "red";
    box.style.width = "350px";
    box.style.height = "350px";
};
box.onmouseout = function () {
    box.style.backgroundColor = "blue";
    box.style.width = "300px";
    box.style.height = "300px";
};
