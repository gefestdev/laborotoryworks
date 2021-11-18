const realfile = document.getElementById("realfile");
const customBtn = document.getElementById("btninput");
const customText = document.getElementById("textinput");

customBtn.addEventListener("click", function(){
    realfile.click();
});

realfile.addEventListener("change", function(){
    if(realfile.value){
        customText.innerHTML = realfile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    }
    else{
        customText.innerHTML = "Файл не выбран";
    }
});