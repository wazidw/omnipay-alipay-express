<?php

namespace Omnipay\AlipayExpress\Requests;

use Omnipay\AlipayExpress\Responses\LegacyCompleteRefundNoPwdResponse;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Alipay\Requests\AbstractLegacyRequest;
use Omnipay\Alipay\Requests\LegacyNotifyRequest;

class LegacyCompleteRefundNoPwdRequest extends AbstractLegacyRequest
{

    protected $verifyNotifyId = true;


    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->getParams();
    }


    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->getParameter('params');
    }


    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $request = new LegacyNotifyRequest($this->httpClient, $this->httpRequest);
        $request->initialize($this->parameters->all());
        $request->setAlipayPublicKey($this->getAlipayPublicKey());
        $request->setVerifyNotifyId($this->verifyNotifyId);
        $request->setKey($this->getKey());
        $response = $request->send();

        $data = $response->getData();
        return $this->response = new LegacyCompleteRefundNoPwdResponse($this, $data);
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setParams($value)
    {
        return $this->setParameter('params', $value);
    }


    /**
     * @param boolean $verifyNotifyId
     *
     * @return $this
     */
    public function setVerifyNotifyId($verifyNotifyId)
    {
        $this->verifyNotifyId = $verifyNotifyId;

        return $this;
    }
}
