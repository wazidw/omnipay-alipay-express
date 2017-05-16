<?php

namespace Omnipay\AlipayExpress;

use Omnipay\Alipay\AbstractLegacyGateway as AlipayAbstractLegacyGateway;
use Omnipay\AlipayExpress\Requests\LegacyRefundNoPwdRequest;
use Omnipay\AlipayExpress\Requests\LegacyCompleteRefundNoPwdRequest;

abstract class AbstractLegacyGateway extends AlipayAbstractLegacyGateway
{

    public function getDefaultParameters()
    {
        return [
            'inputCharset' => 'UTF-8',
            'signType'     => 'MD5',
            'alipaySdk'    => 'wazidw/omnipay-alipay-express',
        ];
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
    public function getOutOrderNo()
    {
        return $this->getParameter('out_order_no');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setOutOrderNo($value)
    {
        return $this->setParameter('out_order_no', $value);
    }

    /**
     * @param array $parameters
     *
     * @return LegacyRefundRequest
     */
    public function refundNoPwd(array $parameters = [])
    {
        return $this->createRequest(LegacyRefundNoPwdRequest::class, $parameters);
    }

        /**
     * @param array $parameters
     *
     * @return LegacyRefundRequest
     */
    public function completeRefundNoPwd(array $parameters = [])
    {
        return $this->createRequest(LegacyCompleteRefundNoPwdRequest::class, $parameters);
    }
}
