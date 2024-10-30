function verifyPass(){
    var senha = document.getElementsByName('senhaconfirmamento')[0].value
    var feed = document.getElementsByClassName('feed')
    const botaoCadastro = document.querySelector('#alterar')


    var maiuscula = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    var numero = "0123456789"
    var especiais ="@#.,$%&*!?"
    var verifMais

    var m = []
    var n= []
    var e = []

    function estilo(f,s){
        var es = ["#2fdc2f","#6D736A"]
        feed[f].style.color = es[s]
    }

    if(senha.length>=8){
        estilo(0,0)
        var verifMaior = true
    }else{
        estilo(0,1)
        var verifMaior = false
    }

    for(i=0;i<senha.length;i++){
     
        m.push(String(maiuscula.indexOf(senha.charAt(i))))
        var maxM= Math.max(...m)
        if(maxM>=0){
            estilo(1,0)
            verifMais = true
        }else{
            estilo(1,1)
            verifMais = false
        }

        n.push(String(numero.indexOf(senha.charAt(i))))
        var maxN= Math.max(...n)
        if(maxN>=0){
            estilo(2,0)
             var verifNumero = true
        }else{
            estilo(2,1)
            var verifNumero = false
        }

        e.push(String(especiais.indexOf(senha.charAt(i))))
        var maxE= Math.max(...e)

        if(maxE>=0){
            estilo(3,0)
            var verifiEsp = true
        }else{
            estilo(3,1)
            var verifiEsp = false
        }
    }
    

        if(verifiEsp === true && verifMais === true && verifNumero === true && verifMaior===true){
        botaoCadastro.removeAttribute('disabled')
        botaoCadastro.classList.add('corValida')
        }else{
            botaoCadastro.disabled=true
            botaoCadastro.classList.remove('corValida')
        }
    

}