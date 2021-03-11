function verifiFisica(){
    if(document.getElementById('tipo').value === '1'){
        document.getElementById('hidden').className='';
    } else {
        document.getElementById('hidden').className='hidden';
    }
}