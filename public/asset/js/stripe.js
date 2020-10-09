$(function () {
    var $form = $("#paymentForm");
    var stripe = Stripe('pk_test_SIpPCrysO5KoBKrUOFiJyZX100lsoR9BPY');

    var elements = stripe.elements();
    var cardElement = elements.create('card');
    var resultContainer = document.getElementById('card-result');
    cardElement.mount('#card-element-add');
    $('#paynow').on('click', function (e) {
        e.preventDefault();
        var cardholderName = document.getElementById('card_holder_name').value;
        var resultContainer = document.getElementById('card-result');
        stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
            billing_details: {
                name: cardholderName
            },
        }).then(function (result) {
            if (result.error) {
                // Display error.message in your UI
                resultContainer.textContent = result.error.message;
            } else {
                // alert(result.paymentMethod.id);
                stripeTokenHandler(result.paymentMethod.id);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('paymentForm');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token);
        form.appendChild(hiddenInput);
        form.submit();
    }
})
