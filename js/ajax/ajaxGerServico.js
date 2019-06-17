window.onload = function() {
    // Boa parte do código ja é explicado no arquivo "ajaxGerAtendente.js" na pasta "js/ajax"
    var addButton = document.getElementsByTagName("ARTICLE")[0];
    var altButton = document.getElementsByTagName("ARTICLE")[1];
    var section = document.getElementsByTagName("SECTION")[0];

    addButton.addEventListener("click", function() {
        ativa(addButton);
        desativa(altButton);
        ajaxGet(req, section, "addServ");

    })

    altButton.addEventListener("click", function() {
        ativa(altButton);
        desativa(addButton);
        ajaxGet(req, section, "altServ");

    })

    ajaxGet(req, section, "addServ");
    ativa(addButton);

};
if (window.XMLHttpRequest) {
    var req = new XMLHttpRequest;
} else {
    var req = new ActiveXObject('Microsoft.XMLHTTP');
}

function ativa(e) {
    e.style.backgroundColor = "#161617";
}

function desativa(e) {
    e.style.backgroundColor = "#f2c22e";
}

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
/*  Essa função a seguir é puro feedback visual ao usuario

    Um pedido AJAX é feito e um objeto JSON é retornado, com uma lista de todos os serviços resgistrado no BD
    caso o JSON retorne um alerta junto a ele, um outro processo é tomado no código, ele apenas exibe o alerta na tela
    faz pequenos alertas visuais onde ocorreu

    Caso o JSON não tenha erros dentro, o código procede alterando os dados do elemento alvo no DOM
    que foi selecionado para alterações no BD, para as novas informações agora registradas

    Em seguida destaca o elemento com cores diferentes sinalizando o sucesso das alterações no BD
*/
function ajaxJSON(req, link, str) {
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            json = JSON.parse(this.responseText);
            span = document.getElementById("sp");
            cSpan = document.getElementsByName("alt")[0];
            console.log(json);
            if (json.alerta) {
                if (span) {
                    span.remove();
                }
                cSpan.insertAdjacentHTML("beforeend", "<span id='sp'>" + json.alerta + "<span>");
                document.getElementById(json.id).style.backgroundColor = "#d73232";
            } else {
                document.getElementById("serv").value = json.nome;
                document.getElementById("TE").value = json.TE;
                document.getElementById("status").value = json.idStatus;
                document.getElementById("id").value = json.idServ;
                document.getElementsByClassName("optSel")[0].innerHTML = json.nome;
                if (json.aviso) {
                    if (span) {
                        span.remove();
                    }
                    cSpan.insertAdjacentHTML("beforeend", "<span id='sp'>" + json.aviso + "<span>");
                    document.getElementsByClassName("optSel")[0].style.backgroundColor = json.sucess;
                    document.getElementsByClassName("optSel")[0].style.borderColor = json.sucess;
                }
            }
            delete json;
        }
    }
    req.open("POST", "../js/ajax/ajaxPHP/" + link + ".php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("r=" + str);
}
// Manda via AJAX as informações escritas para um script PHP, onde serão tratadas e passadas para o BD
function formAdd() {
    var nome = document.forms['add']['serv'].value;
    var TE = document.forms['add']['TE'].value;
    var superstatus = document.forms['add']['status'].value;

    ajaxPost(req, "ajaxAddServ", (nome + "," + superstatus + "," + TE));
}
// Manda as alterações no serviço para um script PHP, onde tambem serão tratadas e atualizadas no BD
function formAlt() {
    var nome = document.forms['alt']['serv'].value;
    var TE = document.forms['alt']['TE'].value;
    var superstatus = document.forms['alt']['status'].value;
    var id = document.forms['alt']['id'].value;

    ajaxJSON(req, "ajaxAltServ", (nome + "," + superstatus + "," + TE + "," + id));
}
/*  Função com propósito de feedback totalmente visual tambem 
    
    Um while passa em cada <tr> e tira todas as formatações visuais feita pelo código
    por ultimo o elemento <tr> selecionado ganha a class "optSel" (opção selecionada)
*/
function selecionar(elemento) {
    var opt = document.getElementsByName(elemento)[0];
    var opts = document.getElementsByClassName("optSel");
    var i = 0;
    while (opts[i]) {
        var optsClass = opts[i].getAttributeNode("CLASS");
        opts[0].style = null;
        optsClass.value = "optDes";
        i++;
    }
    var optClass = opt.getAttributeNode("CLASS");
    optClass.value = "optSel";
}
// Abre um formulario e ja preenche ele com as informações do serviço selecionado
function abrirForm() {
    if (document.getElementsByClassName("optSel")[0]) {
        var form = document.getElementsByName("alt")[0];
        var formClass = form.getAttributeNode("CLASS");
        var opt = document.getElementsByClassName("optSel")[0];
        var optId = opt.getAttribute("ID");

        formClass.value = "login";

        ajaxJSON(req, "ajaxInfoServ", optId);
    }
}