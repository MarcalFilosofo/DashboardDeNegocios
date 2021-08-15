function controleQuantidade(quantidade){
    var Url = window.location.host;
    let url = 'http://localhost:8000/?quantidade=' + quantidade;
    window.location.replace(url);
}