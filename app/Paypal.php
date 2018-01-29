<?php
namespace App;

class Paypal 
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'AUb-F56Ke2_0zJmpQe6AfxDYBmpMg_lfR0U4R0KmTIp4HkfevklPBH6Cn1nmytaDZuLMy6o1HVgoAg_T';
	private $_ClientSecret = 'EI_M5ZNHWesU8e25sHDfQ_6ncbh_wKqIVO6SOo7w4qjaNjyki9FOahcToOVhUAn7bIv3otZ8aJB6QOmT';
	
	public function __construct($shopping_cart)
	{
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config('paypal_payment');
		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;
	}

	public function generate(){
		//generador de pago que recibe el controlador
		$payment = \PaypalPayment::payment()
		->setIntent("sale")
		->setPayer($this->payer())
		->setTransactions([$this->transaction()])
		->setRedirectUrls($this->redirectUrls());

		try{
			$payment->create($this->_apiContext);
		} catch(\Exception $ex){
			dd($ex);
			exit(1);
		}

		return $payment;
	}


	public function payer(){
		//informacion del pago
		return \PaypalPayment::payer()->setPaymentMethod("paypal");
	}

	public function redirectUrls(){
		//informacion de la urls a enviar el pago
		$baseURL = url("/");
		return \PaypalPayment::redirectUrls()
		->setReturnUrl("$baseURL/pagos")
		->setCancelUrl("$baseURL/carrito");
	}

	public function transaction(){
		//informacion de la transaccion
		return \PaypalPayment::transaction()
		->setAmount($this->amount())
		->setItemList($this->items())
		//-setDescription("MundoPc")
		->setInvoiceNumber(uniqid());
	}

	public function items(){
		//informacion de los items q estamos vendiendo
		$items = [];
		$products = $this->shopping_cart->productos()->get();

		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}
		return \PaypalPayment::itemList()->setItems($items);

	}

	public function amount(){
		//cobro en dolares 
		return \PaypalPayment::amount()
		->setCurrency("USD")
		->setTotal($this->shopping_cart->totalUSD());
	}

	//metodo para cobrarle al usuario y acreditar el dinero
	public function execute($paymentId, $payerId){

		//obtenemos el id del pago, cadena que identifica el pago
		$payment = \PaypalPayment::getById($paymentId, $this->_apiContext);

		//el comprador 
		$execution = \PaypalPayment::PaymentExecution()->setPayerId($payerId);

		//ejecutamos el pago
		return $payment->execute($execution, $this->_apiContext);
	}

}