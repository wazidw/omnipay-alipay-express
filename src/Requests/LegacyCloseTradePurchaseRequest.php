<?php

namespace Omnipay\AlipayExpress\Requests;

use Omnipay\AlipayExpress\Responses\LegacyCloseTradePurchaseResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class LegacyCloseTradePurchaseRequest
 * @package   Omnipay\AlipayExpress\Requests
 *
 */
class LegacyCloseTradePurchaseRequest extends AbstractLegacyRequest
{

    protected $service = 'close_trade';

    protected $key;

    protected $privateKey;


    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validateParams();

        $data = $this->filter($this->parameters->all());

        $data['service']   = $this->service;
        $data['sign']      = $this->sign($data, $this->getSignType());
        $data['sign_type'] = $this->getSignType();

        return $data;
    }


    protected function validateParams()
    {
        $this->validate(
            'partner',
            '_input_charset',
            'sign',
            'sign_type'
        );
    }


    /**
     * @return mixed
     */
    public function getSignType()
    {
        return $this->getParameter('sign_type');
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
        return $this->response = new LegacyCloseTradePurchaseResponse($this, $data);
    }


    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->getParameter('partner');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setPartner($value)
    {
        return $this->setParameter('partner', $value);
    }


    /**
     * @return mixed
     */
    public function getInputCharset()
    {
        return $this->getParameter('_input_charset');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setInputCharset($value)
    {
        return $this->setParameter('_input_charset', $value);
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setSignType($value)
    {
        return $this->setParameter('sign_type', $value);
    }

    /**
     * @return mixed
     */
    public function getTradeNo()
    {
        return $this->getParameter('trade_no');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setTradeNo($value)
    {
        return $this->setParameter('trade_no', $value);
    }

    /**
     * @return mixed
     */
    public function getOutTradeNo()
    {
        return $this->getParameter('out_trade_no');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setOutTradeNo($value)
    {
        return $this->setParameter('out_trade_no', $value);
    }


    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->getParameter('total_fee');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setIp($value)
    {
        return $this->setParameter('total_fee', $value);
    }


    /**
     * @return mixed
     */
    public function getTradeRole()
    {
        return $this->getParameter('trade_role');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setTradeRole($value)
    {
        return $this->setParameter('trade_role', $value);
    }
}
