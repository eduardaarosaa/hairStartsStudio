window.onload = function() {
    // Quando a pagina estiver completamente carregada, uma pequena formatação ainda
    // ocorre em alguns elementos do DOM, as tres variaveis abaixo são só para economizar
    // escrita, e deixar o código mais limpo
    var addButton = document.getElementsByTagName("ARTICLE")[0];
    var remButton = document.getElementsByTagName("ARTICLE")[1];
    var section = document.getElementsByTagName("SECTION")[0];

    // Um objeto responsavel por chamadas AJAX é criada de acordo com o navegador
    if (window.XMLHttpRequest) {
        var req = new XMLHttpRequest;
    } else {
        var req = new ActiveXObject('Microsoft.XMLHTTP');
    }
    // Dois listeners são criados para chamadas AJAX
    addButton.addEventListener("click", function() {
        ativa(addButton);
        desativa(remButton);
        ajax(req, section, "addFunc");

    })

    remButton.addEventListener("click", function() {
            ativa(remButton);
            desativa(addButton);
            ajax(req, section, "remFunc");

        })
        // O Primeiro botão é acionado assim que tudo está carregado
    ajaxGet(req, section, "addFunc");
    ativa(addButton);
};

if (window.XMLHttpRequest) {
    var req = new XMLHttpRequest;
} else {
    var req = new ActiveXObject('Microsoft.XMLHTTP');
}
// Mudanaças visuais para maior clareza ao usuario
function ativa(e) {
    e.style.backgroundColor = "#161617";
}

function desativa(e) {
    e.style.backgroundColor = "#f2c22e";
}
// Chama formularios de acordo ao botão selecionado, que serão exibidos ao lado do menu de seleção
function ajaxGet(req, section, link) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementsByTagName("SECTION")[1].innerHTML = this.responseText;
        }
    }
    req.open("GET", "../js/ajax/" + link + ".php", true);
    req.send();
}

function ajaxPost(req, link, str) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementsByTagName("FORM")[0].insertAdjacentHTML("beforeend", this.responseText);
        }
    }
    req.open("POST", "../js/ajax/ajaxPHP/" + link + ".php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("r=" + str);
}
// Passa todas as capacidades selecionadas do atendente, para uma Array, assim como o nome do atendente
function formAdd() {
    var nome = document.forms['add']['nome'].value;
    var ckArray = document.getElementsByName("opt");
    var ckArrayChecked = [];
    for (var i = 0; i < ckArray.length; i++) {
        // Aqui separa apenas as opções selecionadas
        if (ckArray[i].checked) {
            var ckValue = ckArray[i].value;
            // E são passadas para dentro da Array, uma por uma
            ckArrayChecked.push(ckValue);
        }
        ajaxPost(req, "ajaxAddFunc", (nome + ";" + ckArrayChecked));
    }
}