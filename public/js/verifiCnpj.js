function verifiCnpj(){
    if(document.getElementById('cnpj').value.length >= 1 && document.getElementById('cnpj').value.length <= 13 || document.getElementById('cnpj').value.length > 14){
        document.getElementById('cnpj').style.backgroundColor='#ff6761';
    } else if(document.getElementById('cnpj').value.length == 14){
        document.getElementById('cnpj').style.backgroundColor='#61ff8b';
    }
}