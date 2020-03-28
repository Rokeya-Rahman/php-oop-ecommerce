<?php

    use App\classes\Application;

    if (isset($_POST['btn']))
    {
        $application = new Application();
        $message = $application->customerLogin();
    }

?>


<style>
    .email input[type="email"] {
        border: 1px solid #EEE;
        outline-color:#FF5B36;
        width: 96%;
        font-size: 1em;
        padding: 0.5em;
        -webkit-appearance: none;
    }
    .password input[type="password"] {
        border: 1px solid #EEE;
        outline-color:#FF5B36;
        width: 96%;
        font-size: 1em;
        padding: 0.5em;
        -webkit-appearance: none;
    }
</style>



<div class="men">
    <div class="container">
        <div class="register">
            <div class="col-md-6 login-left">
                <h3>NEW CUSTOMERS</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <a class="acount-btn" href="customer-signup.php">Create an Account</a>
            </div>
            <div class="col-md-6 login-right">
                <h3>REGISTERED CUSTOMERS</h3>
                <p>If you have an account with us, please log in.</p>
                <h4 style="color: red; margin-left: 30px;">
                    <?php
                    if (isset($message))
                    {
                        print $message;
                        unset($message);
                    }
                    ?>
                </h4>
                <form action="" method="post">
                    <div class="email">
                        <span>Email Address<label>*</label></span>
                        <input type="email" name="email_address">
                    </div>
                    <div class="password">
                        <span>Password<label>*</label></span>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" name="btn" value="Login">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
