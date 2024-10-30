const urlUF = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados'
const uf = document.getElementById("uf")
const cidade = document.getElementById('cidade')


uf.addEventListener('change',async()=>{
    const urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+uf.value+'/municipios'
    const request =await fetch(urlCidades)
    const response = await request.json()
    var options  = ''
    response.forEach(function(cidades){
        options +='<option>'+cidades.nome+'</option>'
    })
    cidade.innerHTML = options
})

window.addEventListener('load',async()=>{
    const request = await fetch(urlUF)
    const response = await request.json()
   // console.log(response[8].sigla)
    const options = document.createElement("optgroup")
    options.setAttribute('label','UFs')

    response.forEach(function(uf){
        options.innerHTML+='<option>'+uf.sigla+'</option>'
    })

    uf.append(options)
})

