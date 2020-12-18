(function(){


let passVal = document.querySelector("#pass-val")

let passValUl = passVal.querySelector("ul")

let passInput = document.querySelector("div input[type=password]")




let allChars  = "abcdefghijklmnopqrstuvwxyz"

//  JUST FOR TEST, THERE ARE MORE 

let allPosChar = "#@%&$*()!+-_="   

const checkLength = value =>{

   let i = passValUl.querySelector("li:nth-child(1) i")
   value.length > 6 ? i.setAttribute("class","fas fa-check") : i.setAttribute("class","")   

}


const checkUpperAlpha = value =>{
   
   let i = passValUl.querySelector("li:nth-child(3) i")

   let len = Array.from(value).filter((i)=> allChars.toUpperCase().includes(i)).length

   len > 0 ? i.setAttribute("class","fas fa-check") : i.setAttribute("class","")
}

const checkChar = value =>{

  let i = passValUl.querySelector("li:nth-child(2) i")

  let len = Array.from(value).filter((i)=> allPosChar.includes(i)).length

  len > 0 ? i.setAttribute("class","fas fa-check") : i.setAttribute("class","")
}


passInput.addEventListener("keyup",()=>{
    
   checkLength(passInput.value)
   checkUpperAlpha(passInput.value)
   checkChar(passInput.value)

})

}())