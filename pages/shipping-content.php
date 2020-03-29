<?php

    use App\classes\Application;
    $application = new Application();

    $error = '';

    if (isset($_POST['btn']))
    {
        $fullName       =   $_POST['shipping_full_name'];
        $emailAddress   =   $_POST['shipping_email_address'];
        $address        =   $_POST['shipping_address'];
        $phoneNumber    =   $_POST['shipping_phone_number'];
        $city           =   $_POST['shipping_city'];
        $country        =   $_POST['shipping_country'];
        $zipCode        =   $_POST['shipping_zip_code'];

        if ($fullName == '')
        {
            $error++;
            $fullNameError = 'Full name must be fill up';
        }

        if ($emailAddress == '')
        {
            $error++;
            $emailAddressError = 'Email address must be fill up';
        }

        if ($address == '')
        {
            $error++;
            $addressError = 'Address must be fill up';
        }

        if ($phoneNumber == '')
        {
            $error++;
            $phoneNumberError = 'Phone number must be fill up';
        }

        if ($city == '')
        {
            $error++;
            $cityError = 'City must be fill up';
        }

        if ($country == '')
        {
            $error++;
            $countryError = 'Country must be selected';
        }

        if ($zipCode == '')
        {
            $error++;
            $zipCodeError = 'Zip code must be fill up';
        }

        if ($error == 0)
        {
            $application->saveShippingInfo();
            $fullName       =   ' ';
            $emailAddress   =   ' ';
            $address        =   ' ';
            $phoneNumber    =   ' ';
            $city           =   ' ';
            $country        =   ' ';
            $zipCode        =   ' ';
        }
}

?>


<style>
    .email input[type="text"] {
        border: 1px solid #EEE;
        outline-color:#FF5B36;
        width: 96%;
        font-size: 1em;
        padding: 0.5em;
        -webkit-appearance: none;
    }
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
    .number input[type="number"] {
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
        <div class="col-md-12 register">
            <form action="" method="post">
                <div class="register-top-grid email password number">
                    <h3 style="margin-bottom: 15px;">Welcome <?php print $_SESSION['customer_name']; ?>. You have given us product shipping information to complete your order.</h3>
                    <div>
                        <span>Full Name<label>*</label></span>
                        <input type="text" name="shipping_full_name" value="<?php if (isset($fullName)) { print $fullName; } ?>">
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($fullNameError)) { print $fullNameError; } ?></span>
                    </div>
                    <div>
                        <span>Email Address<label>*</label></span>
                        <input type="email" name="shipping_email_address" value="<?php if (isset($emailAddress)) { print $emailAddress; } ?>" placeholder="Please use a unique email address">
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($emailAddressError)) { print $emailAddressError; } ?></span>
                    </div>
                    <div>
                        <span>Address<label>*</label></span>
                        <textarea name="shipping_address" id="" cols="60"><?php if (isset($address)) { print $address; } ?></textarea>
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($addressError)) { print $addressError; } ?></span>
                    </div>
                    <div class="clearfix"></div>
                    <a class="news-letter" href="#"></a>
                    <div>
                        <span>Phone Number<label>*</label></span>
                        <input type="number" name="shipping_phone_number" value="<?php if (isset($phoneNumber)) { print $phoneNumber; } ?>">
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($phoneNumberError)) { print $phoneNumberError; } ?></span>
                    </div>
                    <div>
                        <span>City<label>*</label></span>
                        <input type="text" name="shipping_city" value="<?php if (isset($city)) { print $city; } ?>">
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($cityError)) { print $cityError; } ?></span>
                    </div>
                    <div>
                        <span>Country<label>*</label></span>
                        <select name="shipping_country">
                            <option value="">Select Your Country</option>
                            <?php if ($country == 'BD') { ?>
                                <option value="BD" selected>Bangladesh</option>
                                <option value="JP">Japan</option>
                                <option value="CA">Canada</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                            <?php } elseif ($country == 'JP') { ?>
                                <option value="BD">Bangladesh</option>
                                <option value="JP" selected>Japan</option>
                                <option value="CA">Canada</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                            <?php } elseif ($country == 'CA') { ?>
                                <option value="BD">Bangladesh</option>
                                <option value="JP">Japan</option>
                                <option value="CA" selected>Canada</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                            <?php } elseif ($country == 'US') { ?>
                                <option value="BD">Bangladesh</option>
                                <option value="JP">Japan</option>
                                <option value="CA">Canada</option>
                                <option value="US" selected>United States</option>
                                <option value="UK">United Kingdom</option>
                            <?php } elseif ($country == 'UK') { ?>
                                <option value="BD">Bangladesh</option>
                                <option value="JP">Japan</option>
                                <option value="CA">Canada</option>
                                <option value="US">United States</option>
                                <option value="UK" selected>United Kingdom</option>
                            <?php } else { ?>
                                <option value="BD">Bangladesh</option>
                                <option value="JP">Japan</option>
                                <option value="CA">Canada</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                            <?php } ?>
                        </select>
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($countryError)) { print $countryError; } ?></span>
                    </div>
                    <div>
                        <span>Zip Code<label>*</label></span>
                        <input type="text" name="shipping_zip_code" value="<?php if (isset($zipCode)) { print $zipCode; } ?>">
                        <br>
                        <br>
                        <span style="font-weight: bold; color: red;"><?php if (isset($zipCodeError)) { print $zipCodeError; } ?></span>
                    </div>
                    <div>
                        <input type="submit" name="btn" class="btn btn-danger" value="Save Shipping Information">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
