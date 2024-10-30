const btnSandu = document.querySelector(".iconSand")

btnSandu.addEventListener("click",menuShow)



function menuShow(){
    let menuMobile = document.querySelector(".mobileMenu")
        alert("clicou")
      if(menuMobile.classList.contains('.open')){
        menuMobile.classList.remove('.open')
      }else{
        menuMobile.classList.add('.open')
      }
}

