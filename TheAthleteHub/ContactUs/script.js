const formHeading = document.querySelector(".form-heading");
const formInputs = document.querySelectorAll(".contact-form-input");

formInputs.forEach((input) => {
    input.addEventListener("focus", () => {
        formHeading.style.opacity = "0";
        setTimeout(() => {
            
            formHeading.textContent = input.placeholder;
            formHeading.style.fontFamily = "Lucida Handwriting";
            formHeading.style.opacity = "1";
        }, 300);
    });

    input.addEventListener("blur", () => {
        formHeading.style.opacity = "0";
        setTimeout(() => {
            formHeading.textContent = "Contact Us";
            formHeading.style.opacity = "1";
        }, 300);
    });
});

    
