<?php include('includes/header.php'); ?>
  <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">

    <div class="container">

      <?php include('includes/menu.php'); ?>

	      <div class="panel panel-default" style="background-color : rgba(<?php echo $backgroundrgba; ?>,0.5); border: black 1px solid;">
                <div class="panel-body">
                    <!-- homepage -->
                    <div class="col-md-12">
                        <h1 class="color-black text-center">Donate to Desert County Roleplay</h1>
                        <p>You have landed on the page where you can donate to keep DC-RP alive. Purchases are handled by PayPal and we do not see your card details in any way.<br>Donating helps to cover the costs of the server by allowing server management to purchase better infrastructure in order to be able to improve your gameplay expierience.<br></p>
                        <h3 class="color-black text-center">Name Change</h3>
                        <p><ul>
                            <li>You can buy a single namechange</li>
                        </ul>
                        <strong>Price:</strong> £1.00</p>
                        <div id="namechange-button"></div>
                        <h3 class="color-black text-center">Phone Number Change</h3>
                        <p><ul>
                            <li>You can buy a single phone number change</li>
                        </ul>
                        <strong>Price:</strong> £1.00</p>
                        <div id="phonenumber-button"></div>
                        <h3 class="color-black text-center">Bronze Donator</h3>
                        <p><ul>
                            <li>Ability for permanent BMX permission.</li>
                            <li>Ability to purchase a BMX (Must still pay the usual IC amount), this bike is just unlocked.</li>
                            <li>Will be granted 1 free namechange.</li>
                            <li>Will be granted 1 free phone number change.</li>
                            <li>Ability to use /blockpm (Excluding staff members).</li>
                            <li>Access to an in-game donator chat (/dc).</li>
                            <li>Permanent access to Donator Lounge on Forums.</li>
                            <li>Donator Role on Discord.</li>
                        </ul>
                        <strong>Price:</strong> £2.50</p>
                        <div id="bronze-button"></div>
                        <h3 class="color-black text-center">Silver Donator</h3>
                        <p><ul>
                            <li>Ability to make an /ad at 30 seconds instead of the usual 60 seconds.</li>
                            <li>Ability to purchase a BMX, Quad and ZR-350 (Must still pay the usual IC amount), these cars are just unlocked.</li>
                            <li>Will be granted 2 free namechanges.</li>
                            <li>Will be granted 2 free phone number change.</li>
                            <li>Will also have Bronze Features.</li>
                        </ul>
                        <strong>Price:</strong> £5.00</p>
                        <div id="silver-button"></div>
                        <h3 class="color-black text-center">Gold Donator</h3>
                        <p><ul>
                            <li>Ability to purchase BMX, Quad, ZR-350, Cheetah, Turismo, Bullet and Super GT from Dealership (Must still pay the usual IC amount), these cars are just unlocked.</li>
                            <li>Will be granted 5 free namechanges.</li>
                            <li>Will be granted 5 free phone number change.
                            <li>Will also have Bronze and Silver Features.</li>
                        </ul>
                        <strong>Price:</strong> £10.00</p>
                        <div id="gold-button"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
				<?php require_once('includes/footer.php'); ?>
			  </div>
		  </div>
    </div>
	
    <script>
        paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'small'
        },

        payment: function(data, actions) {
            /*
            * Set up the payment here
            */
        },

        onAuthorize: function(data, actions) {
            /*
            * Execute the payment here
            */
        },

        onCancel: function(data, actions) {
            /*
            * Buyer cancelled the payment
            */
        },

        onError: function(err) {
            /*
            * An error occurred during the transaction
            */
        }
        }, '#namechange-button');

        paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'small'
        },

        payment: function(data, actions) {
            /*
            * Set up the payment here
            */
        },

        onAuthorize: function(data, actions) {
            /*
            * Execute the payment here
            */
        },

        onCancel: function(data, actions) {
            /*
            * Buyer cancelled the payment
            */
        },

        onError: function(err) {
            /*
            * An error occurred during the transaction
            */
        }
        }, '#phonenumber-button');

        paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'small'
        },

        payment: function(data, actions) {
            /*
            * Set up the payment here
            */
        },

        onAuthorize: function(data, actions) {
            /*
            * Execute the payment here
            */
        },

        onCancel: function(data, actions) {
            /*
            * Buyer cancelled the payment
            */
        },

        onError: function(err) {
            /*
            * An error occurred during the transaction
            */
        }
        }, '#bronze-button');

        paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'small'
        },

        payment: function(data, actions) {
            /*
            * Set up the payment here
            */
        },

        onAuthorize: function(data, actions) {
            /*
            * Execute the payment here
            */
        },

        onCancel: function(data, actions) {
            /*
            * Buyer cancelled the payment
            */
        },

        onError: function(err) {
            /*
            * An error occurred during the transaction
            */
        }
        }, '#silver-button');

        paypal.Button.render({
        env: 'sandbox', // Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'small'
        },

        payment: function(data, actions) {
            /*
            * Set up the payment here
            */
        },

        onAuthorize: function(data, actions) {
            /*
            * Execute the payment here
            */
        },

        onCancel: function(data, actions) {
            /*
            * Buyer cancelled the payment
            */
        },

        onError: function(err) {
            /*
            * An error occurred during the transaction
            */
        }
        }, '#gold-button');
    </script>

<?php require_once('includes/javascript.php'); ?>
  </body>
</html>