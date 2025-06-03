<?php 

namespace App\Utils;
class Tripay {
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $amount;
    protected ApiAdapter $apiAdapter;

    protected $invoice;

    public function __construct() {
        $this->apiKey = env('TRIPAY_API_KEY');
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
        $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
        $this->apiAdapter = new ApiAdapter();

    }

    public function getSignature(): string
    {
        return hash_hmac('sha256', $this->merchantCode . $this->invoice.$this->amount, $this->privateKey);

    }

    public function getApiKey(): string
    {
        return $this->apiKey;
        
    }

    public function setSignature($invoice, $amount){
        $this->invoice = $invoice;
        $this->amount = $amount;
    }


//   public function createTransaction($data){

//       $response = $this->apiAdapter->post('https://tripay.co.id/api/transaction/create', $data, [
//         'Authorization' => 'Bearer ' . $this->getApiKey(),
//     ]);


//     return $response;
//   }
}