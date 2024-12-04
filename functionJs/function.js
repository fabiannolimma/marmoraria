
/*
function showClientes(str) {
  if (str == "") {
    document.getElementById("clientes").innerHTML = "Sem clientes Cadastrados ou não encontrado.";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("clientes").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","/data/getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
*///////
/*
function showProdutos(str) {
  if (str == "") {
    document.getElementById("produtos").innerHTML = "Sem produtos cadastrados ou não encontrados.";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("produtos").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","/data/getprodutos.php?q="+str,true);
    xmlhttp.send();
  }
}
*///
function showPedras(str) {
    if (str == "") {
        document.getElementById("pedras").innerHTML = "R$0,00.";
        return;
    } else {
      
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "data/getpedras.php?q=" + str, true);

        // If specified, responseType must be empty string or "text"
        xhr.responseType = "text";

        xhr.onload = () => {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200 ) {
        document.getElementById("pedras").innerHTML = xhr.response;
                }
            }
        };
       xhr.send(null);

    }
}
////////////////////////////////
function showCliente(str) {
  if (str == "") {
        document.getElementById("clientes").innerHTML = "";
        return;
    } else {
      
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "data/getcliente.php?q=" + str, true);

        // If specified, responseType must be empty string or "text"
        xhr.responseType = "text";

        xhr.onload = () => {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200 ) {
        document.getElementById("clientes").innerHTML = xhr.response;
                }
            }
        };
       xhr.send(null);

    }
}