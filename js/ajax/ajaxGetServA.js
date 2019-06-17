window.onload = function() {
    if (window.XMLHttpRequest) {
        var req = new XMLHttpRequest;
    } else {
        var req = new ActiveXObject('Microsoft.XMLHTTP');
    }
    if (document.getElementById("agenda")) {
        ajaxGet(req, "ajaxAgendaJSON");
    }
}
if (window.XMLHttpRequest) {
    var req = new XMLHttpRequest;
} else {
    var req = new ActiveXObject('Microsoft.XMLHTTP');
}
// Recupera a listagem de capacidades de cada atendente (Serviços que é capaz de realizar)
function ajaxGet(req, link) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            json = JSON.parse(this.responseText);
            ajaxServ(req, "ajaxGetServA");

        }
    }
    req.open("GET", "js/ajax/ajaxPHP/" + link + ".php", true);
    req.send();
}
// Envia o agendamento para uma outra pagina PHP, onde será validada e registrada no BD
function ajaxPost(req, link, str) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementsByTagName("FORM")[0].insertAdjacentHTML("beforeend", this.responseText);
        }
    }
    req.open("POST", "js/ajax/ajaxPHP/" + link + ".php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("r=" + str);
}
// Recupera a listagem de todos os serviços disponiveis, e passa para um arquivo JSON
function ajaxServ(req, link) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            jsonServ = JSON.parse(this.responseText);
        }
    }
    req.open("GET", "js/ajax/ajaxPHP/" + link + ".php", true);
    req.send();
}
// Exibe o Tempo estimado para conclusão de um serviço
function TE(o) {
    tempo = o[o.selectedIndex].value;
    document.getElementById("TE").innerText = tempo + " minutos";
}
/*  Essa função serve para exibir os serviços que cada atendente é capaz de realizar.

    Primeiro ela resgata a opção selecionada de atendente, (via "this" -> "o"), e em seguida passa
    a ID do atendente para a variavel "e", um laço é criado e irá passar por todos objetos do JSON
    procurando um que seja a mesma com a ID do atendente.

    Quando encontrado, é passado os serviços que o atendente é capaz de realizar (string) para dentro 
    de uma outra variavel (servA) onde a mesma é convertida para um Array (arrServsA), para posterior uso.

    Todos os serviços disponiveis são passada para uma variavel (serv), onde estão: o nome, o TE e a ID de cada.

    Um segundo laço é criado para escrever no DOM as opções de escolha (<option>) dos serviços do atendente selecionado
    a variavel "x" recebe um elemento, por vez, do Array com os serviços do atendente e sofre um pequeno ajuste por causa do
    ponteiro interno da Array.

    A array dos serviços são relacionados com a ID de cada serviço passado, regastando assim a informação correta
    e depois passados para o HTML.

    Por ultimo o TE é exibido na tela do primeiro elemento a ser criado.
*/
function getServ(o) {
    e = o[o.selectedIndex].id;
    console.log(e);
    for (i = 0; i < jsonServ.length; i++) {
        if (jsonServ[i].idAtendente == e) {
            servA = jsonServ[i].idServ;
            arrServsA = servA.split(/,/g);

            serv = json;

            console.log(arrServsA);
            console.log(serv);
            document.getElementById("serv").innerHTML = "";
            for (j = 0; j < arrServsA.length; j++) {
                x = arrServsA[j];
                x -= 1;
                inputOpt = "<option value='" + serv[x].TE + "' id='" + serv[x].idServ + "'>" + serv[x].nome + "</option>";
                document.getElementById("serv").insertAdjacentHTML("beforeend", inputOpt);
            }

        }
    }
    document.getElementById("TE").innerText = serv[0].TE + " minutos";
}