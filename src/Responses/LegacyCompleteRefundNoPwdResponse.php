<?php

namespace Omnipay\AlipayExpress\Responses;

use Omnipay\Common\Message\AbstractResponse;

class LegacyCompleteRefundNoPwdResponse extends AbstractResponse
{

    /**
     * @var LegacyCompletePurchaseRequest
     */
    protected $request;


    public function getResponseText()
    {
        if ($this->isSuccessful()) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getTradeStatus()
    {
        $result_details = explode('^', $this->data['result_details']);
        return $result_details['2'];
    }
    
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        if ($this->getTradeStatus() == 'SUCCESS' || $this->getTradeStatus() == 'TRADE_HAS_CLOSED') {
            return true;
        } else {
            return false;
        }
    }
}
