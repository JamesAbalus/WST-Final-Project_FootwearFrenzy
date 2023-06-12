//array
var cartItems = [
  {
    title: "Nike Flyby 3",
    price: 1050,
    imgSrc: "assets/img/flyby.png",
  },
  {
    title: "AIR JORDAN 1 LOW FLYEASE",
    price: 850,
    imgSrc: "assets/img/flyease.png",
  },
  {
    title: "NIKE COURT VISION LOW NEXT NATURE",
    price: 980,
    imgSrc: "assets/img/courtvision.png",
  },
];

// Function to generate the HTML for cart items
function generateCartHTML() {
  var cartContainer = document.getElementById("cart");

  //looping
  for (var i = 0; i < cartItems.length; i++) {
    var item = cartItems[i];

    // Create HTML elements for each cart item
    var cartCard = document.createElement("article");
    cartCard.className = "cart__card";

    var cartBox = document.createElement("div");
    cartBox.className = "cart__box";

    var itemImage = document.createElement("img");
    itemImage.src = item.imgSrc;
    itemImage.alt = "";
    itemImage.className = "cart__img";
    cartBox.appendChild(itemImage);

    cartCard.appendChild(cartBox);

    var itemDetails = document.createElement("div");
    itemDetails.className = "cart__details";

    var itemTitle = document.createElement("h3");
    itemTitle.className = "cart__title";
    itemTitle.innerText = item.title;
    itemDetails.appendChild(itemTitle);

    var itemPrice = document.createElement("span");
    itemPrice.className = "cart__price";
    itemPrice.innerText = "$" + item.price;
    itemDetails.appendChild(itemPrice);

    var cartAmount = document.createElement("div");
    cartAmount.className = "cart__amount";

    var cartAmountContent = document.createElement("div");
    cartAmountContent.className = "cart__amount-content";

    var minusBox = document.createElement("span");
    minusBox.className = "cart__amount-box";
    var minusIcon = document.createElement("i");
    minusIcon.className = "bx bx-minus";
    minusBox.appendChild(minusIcon);
    cartAmountContent.appendChild(minusBox);

    var amountNumber = document.createElement("span");
    amountNumber.className = "cart__amount-number";
    amountNumber.innerText = "1";
    cartAmountContent.appendChild(amountNumber);

    var plusBox = document.createElement("span");
    plusBox.className = "cart__amount-box";
    var plusIcon = document.createElement("i");
    plusIcon.className = "bx bx-plus";
    plusBox.appendChild(plusIcon);
    cartAmountContent.appendChild(plusBox);

    cartAmount.appendChild(cartAmountContent);

    var trashIcon = document.createElement("i");
    trashIcon.className = "bx bx-trash-alt cart__amount-trash";
    cartAmount.appendChild(trashIcon);

    itemDetails.appendChild(cartAmount);
    cartCard.appendChild(itemDetails);
    cartContainer.appendChild(cartCard);
  }
}

// Call the function to generate the HTML for cart items
generateCartHTML();
