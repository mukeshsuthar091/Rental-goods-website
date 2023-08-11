const payOption1 = document.getElementById("payOption-1");
const payOption2 = document.getElementById("payOption-2");
const upiPaymentWindow = document.querySelector(".paymentWindow-1");
const cardPaymentWindow = document.querySelector(".paymentWindow-2");
const amount = document.querySelector(".amount");
const payBtn_1 = document.querySelector("#payBtn-1");
const payBtn_2 = document.querySelector("#payBtn-2");
const paySuccessMessage = document.querySelector(".paymentSuccess");
const inputs = document.querySelectorAll('.paymentWindow-2 input[type="text"]');
const inputUPI = document.querySelector('.paymentWindow-1 input[type="text"]');

function optionShow(e) {
    if (e == 1) {
        upiPaymentWindow.classList.remove("hide");
        cardPaymentWindow.classList.add("hide");
    }

    if (e == 2) {
        cardPaymentWindow.classList.remove("hide");
        upiPaymentWindow.classList.add("hide");
    }
}

payBtn_2.addEventListener("click", (e) => {
    inputs.forEach(input => {
        if (!(input.value == "")) {
            paySuccessMessage.classList.add("active")
            setTimeout(() => {
                paySuccessMessage.classList.remove("active")
                window.location.href = "/RentalGoods/index.php";
            }, 3000)
        }
    })

})

payBtn_1.addEventListener("click", (e) => {

    if (!(inputUPI.value == "")) {
        paySuccessMessage.classList.add("active")
        setTimeout(() => {
            paySuccessMessage.classList.remove("active")
            window.location.href = "/RentalGoods/index.php";
        }, 1500)
    }
})
