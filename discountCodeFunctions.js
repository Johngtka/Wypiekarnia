function showDiscountCodeInput() {
    const inputToShow = document.getElementsByName('discountCode')[0]
    if(inputToShow.disabled){
        inputToShow.disabled = false
    }else{
        inputToShow.disabled = true
    }
}