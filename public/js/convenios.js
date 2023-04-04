
function mostrarConvenios(tipo, id) {
    console.log(tipo, id)
    axios.get("http://127.0.0.1:8000/convenios/" + tipo + "/" + id).then(function (response) {
        return response.data
        // do whatever you want if console is [object object] then stringify the response
    }).then(data => {
        console.log(data)
    })
}

