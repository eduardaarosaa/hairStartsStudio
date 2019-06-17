window.onload = function() {
    document.getElementById("login").addEventListener("blur", function() {
        //Pega oque foi escrito no <input login>
        var str = document.getElementById("login").value;

        var x = document.getElementsByTagName("FORM");

        //Prepara a criação de uma tag <span>
        var span = document.createElement("SPAN");
        //Prepara a passagem de atributo "class" para a tag
        var att = document.createAttribute("id");
        //Define o nome da class
        att.value = "response";
        //Passa para dentro da tag
        span.setAttributeNode(att);


        var req = new XMLHttpRequest;
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                //x[0] vai para o primeiro <form> e childNodes[3] para o <span>
                //.tagName verifica se é um <span> msm
                if (x[0].childNodes[3].tagName == "SPAN") {
                    document.getElementById("response").innerHTML = this.responseText;
                } else {
                    x[0].insertBefore(span, x[0].childNodes[3]);
                    document.getElementById("response").innerHTML = this.responseText;
                }
            }
        }
        req.open("POST", "js/ajax/ajaxPHP/ajaxVal.php", true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send("r=" + str);

    });
};