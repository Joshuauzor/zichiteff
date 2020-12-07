
let profileForm = document.querySelector(".profile .profile-form")

let realTimeFields = new Array("email","phone","firstname","lastname")

let passField = profileForm.querySelector("div input[type=password]")

let passStrBar = profileForm.querySelector(".profile .profile-form div .loader-div .loader")

let passStatus = profileForm.querySelector("#pass-status")


let allInputFields = profileForm.querySelectorAll("div input")

let editButton = document.querySelector(".profile .edit-butt-div button")

let doneButton = profileForm.querySelector("button")

let profilePic = document.querySelector(".profile .content .profile-wrapper .profile-pic")

let changePicBtn = document.querySelector(".profile .content .profile-wrapper #change")

let fileInput = changePicBtn.querySelector("input")

editButton.addEventListener("click",()=>{
    profileForm.style.display = 'block'
})

doneButton.addEventListener("click",()=>{

    let emp = false
    allInputFields.forEach((input)=>{
       if(input.value == ""){
          emp = true
       }
    })

    if (emp){
      return
    }
    else{
      profileForm.style.display = "none"
    }
})

var char = ["#","$","&","@","!"]

function checkChar(value){
   let check = false
   for(i in value){
     if(char.indexOf(value[i]) != -1){
        check  = true
        break
     }
   }
   return check
}

allInputFields.forEach((input)=>{
    input.onkeyup = function(){
      if(realTimeFields.indexOf(this.name) != -1 ){
          document.querySelector(`#p-${this.name}`).textContent = this.value.toUpperCase()
      }
    }
})


passField.addEventListener("keyup",()=>{
    if(passField.value.length > 3 && passField.value.length <= 6){
        passStatus.textContent = "Weak"
        passStrBar.style.width = "25%"
        passStrBar.style.backgroundColor = "red"

    }
     else if(passField.value.length > 6 && passField.value.length <= 9){
        passStatus.textContent = "Strong"
        passStrBar.style.width = "60%"
        passStrBar.style.backgroundColor = "skyblue"
    }
     else if(passField.value.length > 9){
        if(checkChar(passField.value)){
            passStatus.textContent = "Very Strong"
            passStrBar.style.width = "100%"
            passStrBar.style.backgroundColor = "green"
        }
        else{
            passStatus.textContent = "Strong"
            passStrBar.style.width = "80%"
            passStrBar.style.backgroundColor = "blue"
        }
    }
    else{
        passStatus.textContent = "Very Weak"
        passStrBar.style.width = "1%"
        passStrBar.style.backgroundColor = "darkred"
    }
})


changePicBtn.addEventListener("click",()=>{
  fileInput.click()
})

fileInput.addEventListener("change",()=>{

    let file = new FileReader()

    file.onload =(res)=>{
      profilePic.querySelector("img").src = res.currentTarget.result
    }

    file.readAsDataURL(fileInput.files[0])

})
