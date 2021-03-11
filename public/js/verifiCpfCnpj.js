function verifiCpfCnpj(){
    if(document.getElementById('tipo').value === '0'){
        if(document.getElementById('cpf_cnpj').value.length == 14){
            document.getElementById('cpf_cnpj').style.backgroundColor='#61ff8b';
        } else {
            document.getElementById('cpf_cnpj').style.backgroundColor='#ff6761';
        }
    } else {
        if(document.getElementById('cpf_cnpj').value.length == 11){
            document.getElementById('cpf_cnpj').style.backgroundColor='#61ff8b'; 
        } else {
            document.getElementById('cpf_cnpj').style.backgroundColor='#ff6761';
        }
    }
}