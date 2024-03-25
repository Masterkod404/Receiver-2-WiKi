function startLike(data) {
    if(data.id==-1){

        alert("Вы ещё не авторизовались, пожалуйста авторизируйтесь!");
    }else{
        let formData = new FormData();
        console.log(data)
        formData.append("likes", data.likes)
        formData.append("id", data.id)
        fetch("vendor/components/plusLike.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if(result.status==true){
                document.querySelector('#likesIn').value=+document.querySelector('#likesIn').value+1;
                document.querySelector('.hertPng').style.background="var(--color-one)";
            }else{
                document.querySelector('#likesIn').value=+document.querySelector('#likesIn').value-1;
                document.querySelector('.hertPng').style.background="whitesmoke";
            }
        })
            .catch(error => console.error(error)); 

    }
}