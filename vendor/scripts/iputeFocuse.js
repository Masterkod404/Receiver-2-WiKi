function clickLable(inputeFile){
    let numSelect=inputeFile.files.length-1;
    let fileSelect = inputeFile.files[numSelect];
    const type = fileSelect.type.replace(/\/.+/, '');
    if(type!="image"){
            alert("Внимание, данный файл не является картинкой!");
    }else{ 
            let urlImg=URL.createObjectURL(inputeFile.files[numSelect]);
            document.querySelector("#lableIn2").style.backgroundImage=`url(${urlImg})`;
    }
}
