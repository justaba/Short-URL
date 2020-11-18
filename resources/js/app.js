require('./bootstrap');
window.addEventListener('load', function () {
   const button = document.getElementById('button-copy');
   const form = document.getElementById('form');
   const success = document.getElementById("success");

   if(button) {
       button.onclick = (e) => {
           e.preventDefault();

           const input = document.getElementById('text');
           input.select();
           document.execCommand("copy");
           input.value = "";
           input.removeAttribute('readonly');
           success.classList.add("show-success");
           button.remove();
           let new_button = document.createElement("button");
           new_button.className = "button-submit";
           new_button.type = "submit";
           new_button.appendChild(document.createTextNode("Сократить"));
           form.append(new_button);

           setTimeout(() => {
               success.classList.remove("show-success");
               success.classList.add("out-success");
           }, 2000);
       }
   }
});
