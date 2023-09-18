<?php
class ControllerPaymentStanbic extends Controller {
	protected function index() {
		
	$this->load->model('checkout/order');
	$orderinfo = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		
	$this->data['mercId'] = $this->config->get('stanbic_account');	
	$this->data['action'] = "https://cipg.stanbicibtcbank.com/MerchantServices/MakePayment.aspx";
	$this->data['orderid'] = $orderinfo['order_id'];
	$this->data['prod'] = "Purchase on ".$orderinfo['store_name'];
	$this->data['email'] = $orderinfo['email'];
	$this->data['amount'] = $orderinfo['total'];

		$this->data['continue'] = $this->url->link('checkout/success');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/stanbic.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/stanbic.tpl';
		} else {
			$this->template = 'default/template/payment/stanbic.tpl';
		}	
		
		$this->render();
	}
	
	public function confirm() {
		
		$this->load->model('checkout/order');
		
		$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('stanbic_order_status_id'));
	}
}
?>