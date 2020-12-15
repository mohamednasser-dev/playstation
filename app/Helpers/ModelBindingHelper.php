<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use   App\Helpers\HesabeCheckoutRequestModel;
use App\Helpers\HesabeCheckoutResponseModel;
use App\Helpers\HesabePaymentResponseModel;
use Config;

/**
 * This class is used to bind models
 *
 * @author Hesabe
 */
class ModelBindingHelper
{
    public $hesabeCheckoutResponseModel;
    public $hesabePaymentResponseModel;
    public $hesabeCheckoutRequestModel;

    public function __construct()
    {
        $this->hesabeCheckoutRequestModel = new HesabeCheckoutRequestModel();
        $this->hesabeCheckoutResponseModel = new HesabeCheckoutResponseModel();
        $this->hesabePaymentResponseModel = new HesabePaymentResponseModel();
    }

    /**
     * This function is use to bind the request data into class object
     *
     * @param array $request form post data
     *
     * @return object
     */
    public function getCheckoutRequestData(Request $request)
    {
		 
        $this->hesabeCheckoutRequestModel->amount = $request->amount;
        $this->hesabeCheckoutRequestModel->currency = $request->currency;
        $this->hesabeCheckoutRequestModel->paymentType = $request->paymentType;
        $this->hesabeCheckoutRequestModel->orderReferenceNumber = $request->orderReferenceNumber;
        $this->hesabeCheckoutRequestModel->version = $request->version;
        $this->hesabeCheckoutRequestModel->variable1 = $request->variable1;
        $this->hesabeCheckoutRequestModel->variable2 = $request->variable2;
        $this->hesabeCheckoutRequestModel->variable3 = $request->variable3;
        $this->hesabeCheckoutRequestModel->variable4 = $request->variable4;
        $this->hesabeCheckoutRequestModel->variable5 = $request->variable5;
        $this->hesabeCheckoutRequestModel->merchantCode = $request->merchantCode;
        $this->hesabeCheckoutRequestModel->responseUrl = $request->responseUrl;
        $this->hesabeCheckoutRequestModel->failureUrl = $request->failureUrl;
        return $this->hesabeCheckoutRequestModel;
    }

    /**
     * Get Checkout response data.
     *
     * @param array $data Checkout response data
     *
     * @return object \Models\HesabeCheckoutResponseModel.
     */
    public function getCheckoutResponseData($data)
    {
        // return dd($data);
        $this->hesabeCheckoutResponseModel->status = $data['status'];
        $this->hesabeCheckoutResponseModel->code = $data['code'];
        $this->hesabeCheckoutResponseModel->message = $data['message'];
        $this->hesabeCheckoutResponseModel->response['data'] = ($data['code'] == Config::get('hesabe.SUCCESS_CODE') ||
         $data['code'] == Config::get('hesabe.AUTHENTICATION_FAILED_CODE')) ? $data['response']['data'] : $data['data'];

        return $this->hesabeCheckoutResponseModel;
    }

    /**
     * Get Payment Response response data.
     *
     * @param array $data payment response data
     *
     * @return object \Models\HesabeCheckoutResponseModel.
     */
    public function getPaymentResponseData($data)
    {
        $this->hesabeCheckoutResponseModel->status = $data['status'];
        $this->hesabeCheckoutResponseModel->code = $data['code'];
        $this->hesabeCheckoutResponseModel->message = $data['message'];

        $this->hesabePaymentResponseModel->resultCode = $data['response']['resultCode'];
        $this->hesabePaymentResponseModel->amount = $data['response']['amount'];
        $this->hesabePaymentResponseModel->paymentToken = $data['response']['paymentToken'];
        $this->hesabePaymentResponseModel->paymentId = $data['response']['paymentId'];
        $this->hesabePaymentResponseModel->paidOn = $data['response']['paidOn'];
        $this->hesabePaymentResponseModel->orderReferenceNumber = $data['response']['orderReferenceNumber'];
        $this->hesabePaymentResponseModel->variable1 = $data['response']['variable1'];
        $this->hesabePaymentResponseModel->variable2 = $data['response']['variable2'];
        $this->hesabePaymentResponseModel->variable3 = $data['response']['variable3'];
        $this->hesabePaymentResponseModel->variable4 = $data['response']['variable4'];
        $this->hesabePaymentResponseModel->variable5 = $data['response']['variable5'];
        $this->hesabePaymentResponseModel->method = $data['response']['method'];
        $this->hesabePaymentResponseModel->administrativeCharge = $data['response']['administrativeCharge'];

        //Get Payment response array.
        $this->hesabeCheckoutResponseModel->response = $this->hesabePaymentResponseModel->getVariables();
        return $this->hesabeCheckoutResponseModel;
    }
}