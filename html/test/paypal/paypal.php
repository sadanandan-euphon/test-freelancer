<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Paypal testing...</h1>
<!--         PayPal Logo 
        <table border="0" cellpadding="10" cellspacing="0" align="left">
            <tr>
                <td align="center"></td>
            </tr>
            <tr>
                <td align="center">
                    <a href="https://www.paypal.com/de/webapps/mpp/paypal-popup" title="So funktioniert PayPal" onclick="javascript:window.open('https://www.paypal.com/de/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=715, height=539'); return false;">
                        <img src="https://www.paypalobjects.com/webstatic/de_DE/i/de-pp-logo-150px.png" border="0" alt="PayPal Logo">
                    </a>
                </td>
            </tr>
        </table>
         PayPal Logo -->


         <div style="display: block;" align="center">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="business" value="solly.tamari@gmail.com" />
            <input type="hidden" name="lc" value="US" />
            <input type="hidden" name="item_name" value="" />
            <input type="hidden" name="item_number" value="" />
            <input type="hidden" name="amount" value="" />
            <input type="hidden" name="currency_code" value="USD" />
            <input type="hidden" name="button_subtype" value="services" />
            <input type="hidden" name="notify_url" value=" " />
            <input type="hidden" name="return" value="http://localhost:17743/payments.aspx?cc=success" />
            <input type="hidden" name="cancel_return" value="http://localhost:17743/payments.aspx?cc=cancel" />
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHostedGuest" />
            <input name="imgCreditcard" style="text-align: center;" type="image" src="images/pay.jpg"
                border="0" alt="PayPal - The safer, easierway to pay online!" /><!-- paypal1  ~/images/paypal1.jpg-->
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1"
                height="1" />
            <div id="divBack" runat="server" style="margin-left: -625px;" onclick="document.location.href=('../Home.aspx')">
            </div>
            </form>
        </div>
    
        <?php
        // put your code here
        ?>
    </body>
</html>
