$(document).ready(function () {
    $(".add-to-cart-btn").click(function (event) {
        event.preventDefault();
        var mealId = $(this).data("meal-id");

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Send AJAX request to store the meal ID in the user's session
        $.ajax({
            url: "/checkout/add-meal-to-card",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "X-Requested-With": "XMLHttpRequest",
            },
            data: { meal_id: mealId },
            xhrFields: {
                withCredentials: true,
            },
            success: function (response) {
                // alert
                if (response === "exists") {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: alert_exists,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                } else {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: alert_success,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    // Update the cart count in the UI
                    // updateCartCount(response);
                    updateFixedButtonCount(response);
                }
            },
        });
    });
});

// Function to update the cart count in the UI
// function updateCartCount(count) {
//     $("#cart-item-num").html(count);
// }
function updateFixedButtonCount(count) {
    $("#fixed-button-num").html(count);
}

$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    // Increase the quantity of a meal when the plus button is clicked
    $(".plus-btn").on("click", function (e) {
        e.preventDefault();
        var mealId = $(this).data("meal-id");
        $.ajax({
            url: "/checkout/increase-quantity",
            method: "POST",
            data: {
                meal_id: mealId,
                _token: csrfToken,
            },
        });
    });

    // Decrease the quantity of a meal when the minus button is clicked
    $(".minus-btn").on("click", function (e) {
        e.preventDefault();
        var mealId = $(this).data("meal-id");
        $.ajax({
            url: "/checkout/decrease-quantity",
            method: "POST",
            data: {
                meal_id: mealId,
                _token: csrfToken,
            },
        });
    });

    // remove meal
    $("#remove-btn").on("click", function (e) {
        e.preventDefault();
        var mealId = $(this).data("meal-id");
        console.log(mealId);
        $.ajax({
            url: "/checkout/remove-meal",
            method: "POST",
            data: {
                meal_id: mealId,
                _token: csrfToken,
            },
        });
    });
});
//Remove The Order From The card
var subtotals = document.getElementsByClassName("sub-total");
var removeBtns = document.getElementsByClassName("removebtn");
var priceTableSubtotal = document.querySelector(".price-table-subtotal")
    .innerText;
priceTableSubtotal = parseInt(priceTableSubtotal.match(/\d|\.|\-/g).join(""));
var allSubtotal = new Array();

for (var i = 0; i < removeBtns.length; i++) {
    var subtotal = subtotals[i];
    subtotal = subtotal.innerText;
    subtotal = parseInt(subtotal.match(/\d|\.|\-/g).join(""));
    allSubtotal[i] = subtotal;
    var handelRemoveBtn = removeBtns[i];
    handelRemoveBtn.addEventListener("click", function (e) {
        var handelRemoveBtnClicked = e.target;
        handelRemoveBtnClicked.parentElement.parentElement.parentElement.remove();
        var mealId = $(this).data("meal-id");
        for (var i = 0; i < allSubtotal.length; i++) {
            if (i + 1 === mealId) {
                priceTableSubtotal = priceTableSubtotal - allSubtotal[i];
                if (!allSubtotal.length) {
                    priceTableSubtotal = 0;
                }
            }
        }

        document.querySelector(".price-table-subtotal").innerHTML =
            priceTableSubtotal + "\t" + "S.P";
        document.querySelector(".total-price-after-deliverytax").innerHTML =
            priceTableSubtotal + 5000 + "\t" + "S.P";
    });
}
