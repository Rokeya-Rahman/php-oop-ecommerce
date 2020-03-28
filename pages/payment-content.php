<?php

    use App\classes\Application;

    if (isset($_POST['btn']))
    {
        $application = new Application();
        $application->saveOrderInfo();
    }

?>



<div class="men">
    <div class="container">
        <div class="register">
            <div class="col-md-6 login-left">
                <h3>Payment Method</h3>
                <p>Please select your payment method to continue your valuable order process</p>
            </div>
            <div class="col-md-6 login-right">
                <h3>Choose payment method</h3>
                <form action="" method="post">
                    <div class="radio">
                        <input type="radio" name="payment_type" value="cash_on_delivery">Cash on Delivery
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="paypal">PayPal
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="master_card">Master Card
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="visa">VISA
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="maestro">Maestro
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="american_express">American Express
                    </div>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="visa_electron">Visa Electron
                    </div>
                    <input type="submit" name="btn" value="Confirm Order">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
