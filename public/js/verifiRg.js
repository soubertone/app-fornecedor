function verifiRg(){
    if(document.getElementById('rg').value.length == 11){
        document.getElementById('rg').style.backgroundColor='#61ff8b';
    } else{
        document.getElementById('rg').style.backgroundColor='#ff6761';
    }
}