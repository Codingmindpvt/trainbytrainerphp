<div class="total-amount-area">
    <h3>TOTAL AMOUNT</h3>

    <div class="cart-total">
        <p>Sub Total</p>
        <p>{{ DEFAULT_CURRENCY . $cart->getSubTotal($sum) }}</p>
    </div>
    <div class="cart-total">
        <p>Tax(5%)</p>
        <p>{{ DEFAULT_CURRENCY . $cart->getTaxAmount() }}</p>
    </div>
    <hr>
    <?php $totalprice = $cart->getGrandTotal(); ?>
    <div class="cart-total">
        <h5>Grand Total</h5>
        <p>{{ DEFAULT_CURRENCY . $cart->getGrandTotal() }}</p>
    </div>
    <a href="{{ route('stripe', $totalprice) }}" class="sign-bt mb-0">PLACE ORDER</a>

</div>
