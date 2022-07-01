const expression = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
let form = document.getElementById('form_register')
let input = document.querySelectorAll(".input")
let button = document.querySelector(".button")
let emailVerification = document.getElementById("form__email")
let countryVerification = document.getElementById('form__country')
let newsletterVerification = document.getElementById('newsletter')


button.disabled = true
let dateForm = ''

form.addEventListener("change", stateHandle)
function stateHandle() {
  if (document.querySelectorAll(".input").value === "") {
    button.disabled = true  
  } else {
    validateForm(emailVerification, countryVerification, newsletterVerification)
  }
  
}

const validateForm = (emailVerification, countryVerification, newsletterVerification) => {
  
    if (expression.test(emailVerification.value)) {
        dateForm = emailVerification.value
    } else {
      button.disabled = true 
    }
    
    if(countryVerification.selectedOptions.length === 1){ 
        dateForm += countryVerification.selectedOptions[0].value
    } else {
      button.disabled = true 
    }

    if (newsletterVerification.checked === true){
        dateForm += newsletterVerification.checked
        button.disabled = false
    } else {
      button.disabled = true 
    }
    
   
    return dateForm
}

const showMessageSuccess = () => {
  alert('¡Perfecto, te avisaremos la primera!')
  localStorage.setItem(
    emailVerification.value,
    countryVerification.selectedOptions[0].value
  )
}
