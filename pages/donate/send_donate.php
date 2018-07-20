<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

/*
    Product Types:
    1. Single Namechange
    2. Single Phone Number Change
    3. Bronze
    4. Silver
    5. Gold
*/

if(IsLoggedIn())
{
    if(isset($_GET["product"]))
    {
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');
        
        $amount = new \PayPal\Api\Amount();
        if($_GET["product"] == 1)
        {
            $amount->setTotal('1.00');
            $amount->setCurrency('GBP');
            $_SESSION["DCRP_Product"] = 1;
        }
        else if($_GET["product"] == 2)
        {
            $amount->setTotal('1.00');
            $amount->setCurrency('GBP');
            $_SESSION["DCRP_Product"] = 2;
        }
        else if($_GET["product"] == 3)
        {
            $amount->setTotal('3.00');
            $amount->setCurrency('GBP');
            $_SESSION["DCRP_Product"] = 3;
        }
        else if($_GET["product"] == 4)
        {
            $amount->setTotal('6.00');
            $amount->setCurrency('GBP');
            $_SESSION["DCRP_Product"] = 4;
        }
        else if($_GET["product"] == 5)
        {
            $amount->setTotal('10.00');
            $amount->setCurrency('GBP');
            $_SESSION["DCRP_Product"] = 5;
        }
        else
        {
            Header("Location: ../../index.php?page=home");
        }
        
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
        
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(WEB_URL."/pages/donate/donate_redir.php?type=".$_GET["product"])
            ->setCancelUrl(WEB_URL."/index.php?page=donate");
        
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        
        try 
        {
            $payment->create($apiContext);
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$payment->getApprovalLink().'">';
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) 
        {
            // This will print the detailed information on the exception.
            // REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }
    else Header("Location: ../../index.php?page=home");
}
else Header("Location: ../../index.php?page=login");

