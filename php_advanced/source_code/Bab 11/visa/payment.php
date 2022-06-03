<html>
<head>
	<script type="text/javascript">
		function onVisaCheckoutReady(){
			V.init( {
				apikey: "API_KEY_ANDA",
				paymentRequest:{
					currencyCode: "IDR",
					total: "100000"
				}
			});
			
			V.on("payment.success", function(payment) {alert(JSON.stringify(payment)); });
			V.on("payment.cancel", function(payment) {alert(JSON.stringify(payment)); });
			V.on("payment.error", function(payment,error) {alert(JSON.stringify(error));});
		}
	</script>
</head>

<body>
	<img alt="Visa Checkout" class="v-button" role="button" src="https://sandbox.secure.checkout.visa.com/wallet-services-web/xo/button.png"/>
	
	<script type="text/javascript" src="https://sandbox-assets.secure.checkout.visa.com/checkout-widget/resources/js/integration/v1/sdk.js">
	</script>
</body>
</html>