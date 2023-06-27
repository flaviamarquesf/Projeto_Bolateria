if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
  } else {
    ready()
  }
  
  var totalAmount = "0,00"
  
  function ready() {
    /*function calcularValorTotal() {
    var quantidade = parseInt(document.getElementById("quantidade").value);
    var valorUnitario = "<?php echo $obj->getPreco(); ?>"
    var valorTotal = quantidade * valorUnitario;
    document.getElementById("valorTotal").value = valorTotal.toFixed(2);
    }*/
    // Botão remover produto
    const removeProductCart = document.getElementsByName("remove")
    for (var i = 0; i < removeProductCart.length; i++) {
        removeProductCart[i].addEventListener("click", removeProduct)
      }
       // Mudança valor dos inputs
    const quantityInputs = document.getElementsByClassName("product-qtd-input")
    for (var i = 0; i < quantityInputs.length; i++) {
    quantityInputs[i].addEventListener("change", checkIfInputIsNull)
  }
  // Botão add produto ao carrinho
  const addToCartButtons = document.getElementsByClassName("btn btn-secondary")
  for (var i = 0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener("click", addProductToCart)
  }
      function removeProduct(event) {
        event.target.parentElement.parentElement.remove()
        updateTotal()
      }
      function checkIfInputIsNull(event) {
        if (event.target.value === "0") {
          event.target.parentElement.parentElement.remove()
        }
        updateTotal()
      }
      function addProductToCart(event) {
        const button = event.target
        const productInfos = button.parentElement.parentElement.parentElement.parentElement
        const productImage = productInfos.getElementsByClassName("product-image")[0].src
        console.log(productImage)
        const productName = productInfos.getElementsByClassName("product-title")[0].innerText
        const productPrice = productInfos.getElementsByClassName("product-price")[0].innerText
      
        const productsCartNames = document.getElementsByClassName("cart-product-title")
        for (var i = 0; i < productsCartNames.length; i++) {
          if (productsCartNames[i].innerText === productName) {
            productsCartNames[i].parentElement.parentElement.getElementsByClassName("product-qtd-input")[0].value++
            updateTotal()
            return
          }
        }
        //cole o resto aqui
    }
    } // ready até aqui
    /*
    function makePurchase() {
        if (totalAmount === "0,00") {
          alert("Seu carrinho está vazio!")
        } else {   
          alert(
            `
              Obrigado pela sua compra!
              Valor do pedido: R$${totalAmount}\n
              Volte sempre :)
            `
          )
      
          document.querySelector(".cart-table tbody").innerHTML = ""
          updateTotal()
        }
      }
      */
     function updateTotal() {
         totalAmount = 0
        const cartProducts = document.getElementsByClassName("cart-product")
        for (var i = 0; i < cartProducts.length; i++) {
          const productPrice = cartProducts[i].getElementsByClassName("cart-product-price")[0].innerText.replace("R$", "")
          const productQuantity = cartProducts[i].getElementsByClassName("product-qtd-input")[0].value
      //console.log(productQuantity)
          totalAmount += productPrice * productQuantity
        }
        totalAmount = totalAmount.toFixed(2)
        totalAmount = totalAmount.replace(".", ",")
        document.querySelector(".cart-total-container span").innerText = "R$" + totalAmount
    //console.log(totalAmount)
    }