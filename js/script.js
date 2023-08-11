let dropdown = document.querySelector('.dropdown');
let select = document.querySelector('.select');
let menu = document.querySelector('.c-menu');
let bar = document.querySelector('#menu-bar');
let nav_menu = document.querySelector('.menu-list');
let navbar = document.querySelector('.navbar-container');


// console.log(bar);

select.addEventListener('click', () => {
    dropdown.classList.toggle("active");
})


bar.addEventListener('click', () => {
    nav_menu.classList.toggle('active-menu');
})

// ----------------------------------------------------------------

let product_img = document.getElementById("big-img");
let brand = document.querySelector(".brand");
let product_name = document.querySelector(".product-name");
let product_desc = document.querySelector(".about-product");
let product_rent = document.querySelector(".productRent");
let quantity = document.getElementById("no_of_product");


function productAddedInCart(pid) {

    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + parseInt(quantity.value));
        document.getElementById("cartCount").textContent = productNumbers + parseInt(quantity.value);
    }
    else {
        localStorage.setItem('cartNumbers', parseInt(quantity.value));
        document.getElementById("cartCount").textContent = parseInt(quantity.value);
    }

    addToCart(pid);
}


function onLordCardNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    if (productNumbers) {
        document.getElementById("cartCount").textContent = productNumbers;
    }
    else {
        document.getElementById("cartCount").textContent = 0;
    }

}


onLordCardNumbers();

// ---------------------------------------


function addToCart(productId) {

    // console.log(productId)

    let pRent = product_rent.innerHTML.match(/\d+/g);
    pRent = parseFloat(pRent[0]).toFixed(2);

    let imgURL = product_img.src;
    imgURL = imgURL.substr(product_img.src.indexOf("img"),);

    let totalPrice = totalRentCalculator(parseInt(parseInt(pRent)), 5, parseInt(quantity.value))
    console.log(totalPrice)

    let product = {
        pid: productId,
        image: imgURL,
        brandName: brand.innerHTML,
        title: product_name.innerHTML,
        description: product_desc.innerHTML,
        rent: pRent,
        rDays: 5,
        pQuantity: parseInt(quantity.value),
        totalRent: totalPrice
    };

    // console.log(product);


    let cartItems = localStorage.getItem("productInCart");
    cartItems = JSON.parse(cartItems);

    if (cartItems) {

        if (cartItems[product.pid] == undefined) {
            cartItems = {
                ...cartItems,
                [product.pid]: product
            }
        }
        else {

            cartItems[product.pid].pQuantity += parseInt(quantity.value);
        }

    }
    else {
        cartItems = {
            [product.pid]: product
        }
    }


    localStorage.setItem("productInCart", JSON.stringify(cartItems))
    // console.log(cartItems)


}

function display() {
    let cartItems = localStorage.getItem("productInCart");
    cartItems = JSON.parse(cartItems);

    let tableBody = document.getElementById("tableBody");

    if (cartItems && tableBody) {
        tableBody.innerHTML = '';

        Object.values(cartItems).map(item => {

            tableBody.innerHTML += `
            <tr id="#p${item.pid}">
                <td><a href="#"  class="removeProduct"><i class="las la-times-circle"></i></a></td>
                <td><img src="${item.image}" alt=""></td>
                <td>${item.title}</td>
                <td>${item.rent}rs.</td>
                <td><input type="number" value="${item.rDays}" min="5" class="rent_days"  id="0${item.pid}"></td>
                <td><input type="number" value="${item.pQuantity}" min="1" class="cartNumbersCount" id="${item.pid}"></td>
                <td class="total_rent">${item.totalRent}rs.</td>
            </tr>`;
            
        });

        if(tableBody.innerHTML == ""){
            tableBody.innerHTML = `
            <tr class="no-result">
                <td colspan="7"><h3>Your cart is empty.</h3></td>
            </tr>`;
        }

    }

}

display();


// let tableBody_tr = document.querySelectorAll("#tableBody tr")
let removeProduct = document.querySelectorAll(".removeProduct")
// console.log(removeProduct)

removeProduct.forEach((ele) => {
    ele.addEventListener("click", (event) => {
        let pid = ele.parentElement.parentElement.id;
        removeElement(pid);
        
    })
})


function removeElement(pid) {
    let id = pid.match(/\d+/g)[0];
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    let cartProductTotalRent = localStorage.getItem('totalProductRent');
    cartProductTotalRent = JSON.parse(cartProductTotalRent);

    // i have to remove element from the cartItems object using product id (pid)
    // here i have to write a code

    productNumbers = productNumbers - cartItems[id].pQuantity;
    cartProductTotalRent = cartProductTotalRent - parseInt(cartItems[id].totalRent)

    localStorage.setItem('cartNumbers', JSON.stringify(productNumbers))
    localStorage.setItem('totalProductRent', JSON.stringify(cartProductTotalRent))

    delete cartItems[id];

    localStorage.setItem('productInCart', JSON.stringify(cartItems))


    // console.log(cartItems[id])
    window.location.reload()
}




// ------------------------------------------


let cartNumbersCount = document.querySelectorAll(".cartNumbersCount");
let rent_days = document.querySelectorAll(".rent_days");

cartNumbersCount.forEach((x) => {

    // x.addEventListener("keypress", (e) => {
    //     console.log(e)
    //     e.preventDefault();
    // })

    // x.addEventListener("change", (event) => {
    //     if (event.key == "ArrowUp") {
    //         // console.log("ArrowUp")
    //         increment(event);
    //     }

    //     if (event.key == "ArrowDown") {
    //         // console.log("ArrowDown")
    //         decrement(event);
    //     }

    // })


    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    x.addEventListener("change", (event) => {

        let pid = event.target.id;

        // console.log(cartItems[pid])

        if (parseInt(event.target.value) > cartItems[pid].pQuantity) {
            increment(pid);
        }

        if (parseInt(event.target.value) < cartItems[pid].pQuantity) {
            decrement(pid);
        }


    })
    // console.log(x.parentElement.previousElementSibling.childNodes[0])
    // console.log(x)
});



function increment(id) {
    // let id = tag1.target.id;

    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.getElementById("cartCount").textContent = productNumbers + 1;
    }

    cartItems[id].pQuantity += 1;

    let total = totalRentCalculator(cartItems[id].rent, cartItems[id].rDays, cartItems[id].pQuantity);
    cartItems[id].totalRent = total

    localStorage.setItem('productInCart', JSON.stringify(cartItems));

    window.location.reload();

}

function decrement(id) {

    // let id = tag1.target.id;

    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers - 1);
        document.getElementById("cartCount").textContent = productNumbers - 1;
    }

    cartItems[id].pQuantity -= 1;

    let total = totalRentCalculator(cartItems[id].rent, cartItems[id].rDays, cartItems[id].pQuantity);
    cartItems[id].totalRent = total

    localStorage.setItem('productInCart', JSON.stringify(cartItems));

    window.location.reload();

}

// ----------------------------------------------------------

rent_days.forEach((x) => {

    // x.addEventListener("keypress", (e) => {
    //     // console.log(e)
    //     e.preventDefault();
    // })

    // x.addEventListener("keydown", (event) => {
    //     if (event.key == "ArrowUp") {
    //         // console.log("ArrowUp")
    //         incrementDays(event);
    //     }

    //     if (event.key == "ArrowDown") {
    //         // console.log("ArrowDown")
    //         decrementDays(event);
    //     }


    // })

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    x.addEventListener("change", (event) => {

        let pid = event.target.id.substr(1, );

        // console.log(cartItems[pid])

        if (parseInt(event.target.value) > cartItems[pid].rDays) {
            incrementDays(pid);
        }

        if (parseInt(event.target.value) < cartItems[pid].rDays) {
            decrementDays(pid);
        }

        // console.log(pid)

    })
    // console.log(x.parentElement.previousElementSibling.childNodes[0])
    // console.log(x)
});



function incrementDays(id) {
    // console.log(tag)
    // let id = tag.target.id.substr(1, 2);
    // console.log(id)

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    cartItems[id].rDays += 1

    let total = totalRentCalculator(cartItems[id].rent, cartItems[id].rDays, cartItems[id].pQuantity);
    cartItems[id].totalRent = total

    localStorage.setItem('productInCart', JSON.stringify(cartItems));

    window.location.reload();

}

function decrementDays(id) {
    // let id = tag.target.id.substr(1, 2);
    // console.log(id)

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    cartItems[id].rDays -= 1

    let total = totalRentCalculator(cartItems[id].rent, cartItems[id].rDays, cartItems[id].pQuantity);
    cartItems[id].totalRent = total

    localStorage.setItem('productInCart', JSON.stringify(cartItems));

    window.location.reload();
}



function totalRentCalculator(rent, days, quantity) {
    totalRent = rent * days * quantity;
    return totalRent.toFixed(2);
}



window.onload = () => {

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    let cartProductTotalRent = localStorage.getItem('totalProductRent');
    cartProductTotalRent = JSON.parse(cartProductTotalRent);

    let subtotal = document.getElementById("subtotal");
    let total_rent = document.querySelectorAll(".total_rent");

    let total = 0;

    if (subtotal) {

        Object.values(cartItems).map((x) => {
            // console.log(parseInt(x.totalRent))
            total += parseInt(x.totalRent);
        })
        // console.log(total)

        document.getElementById("subTotalRent").innerHTML = total + 'rs.';
        document.getElementById("totalProductRent").innerHTML = total + 'rs.';

        localStorage.setItem('totalProductRent', JSON.stringify(total))

    }
}

// ----------------------------------------------

function checkout(logged_in) {
    let tableBody = document.getElementById("tableBody");
    let cartProductTotalRent = localStorage.getItem('totalProductRent');
    cartProductTotalRent = JSON.parse(cartProductTotalRent);

    if (logged_in) {

        if(tableBody.innerHTML.match("Your cart is empty.")){
            alert("Your cart is empty.");
        }
        else if(tableBody.innerHTML != '') {
            window.location.href = '/RentalGoods/checkout.php?totalRent='+cartProductTotalRent;
        }
        
    }
    else {
        window.location.href = '/RentalGoods/login.php';
    }
}

// -----------------------------------------------

function emptyCart() {
    localStorage.removeItem('cartNumbers');
    localStorage.removeItem('productInCart');
    localStorage.removeItem('totalProductRent');
}


// ------------------------------------------------

function checkoutProductList() {
    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    let cartProductTotalRent = localStorage.getItem('totalProductRent');
    cartProductTotalRent = JSON.parse(cartProductTotalRent);

    let product_list = document.getElementById("product_list");

    console.log(product_list)
    if (cartItems && product_list) {
        product_list.innerHTML = '';
        Object.values(cartItems).map(item => {

            product_list.innerHTML += `
                    <tr>
                        <td><img src="${item.image}" alt=""></td>
                        <td>${item.title}</td>
                        <!-- <td>${item.rent}rs.</td> -->
                        <td>${item.rDays}</td>
                        <td>${item.pQuantity}</td>
                        <td>${item.totalRent}rs.</td>
                    </tr>`;

        });
    }


    let t_rent = document.querySelector(".t_rent");
    let totalProductRent = document.querySelector(".totalProductRent");
    let shipping_charge = document.querySelector(".shipping_charge");
    let totalAmountPay = document.querySelector("#totalAmountPay");
    
    // console.log(cartProductTotalRent);
    t_rent.innerHTML = cartProductTotalRent + 'rs.';

    // console.log(cartProductTotalRent * parseInt(shipping_charge.innerHTML));
    totalProductRent.innerHTML = (cartProductTotalRent + parseInt(shipping_charge.innerHTML)) + 'rs.';
    totalAmountPay.value = (cartProductTotalRent + parseInt(shipping_charge.innerHTML)) + 'rs.';
}




checkoutProductList()

// ---------------------------------------------------------------------------

function goToHomePage() {
    window.location.href = '/RentalGoods/index.php';
}