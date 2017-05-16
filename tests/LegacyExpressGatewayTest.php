<?php

namespace Omnipay\AlipayExpress\Tests;

use Omnipay\Alipay\Common\Signer;
use Omnipay\AlipayExpress\LegacyExpressGateway;
// use Omnipay\Alipay\Tests\LegacyExpressGatewayTest as AlipayLegacyExpressGatewayTest;
use Omnipay\AlipayExpress\Responses\LegacyRefundNoPwdResponse;
use Omnipay\AlipayExpress\Responses\LegacyCompleteRefundNoPwdResponse;

class LegacyExpressGatewayTest extends AbstractGatewayTestCase
{

    /**
     * @var LegacyRefundNoPwdRequest $gateway
     */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new LegacyExpressGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setPartner($this->partner);
        $this->gateway->setKey($this->key);
        $this->gateway->setSellerId($this->sellerId);
        $this->gateway->setNotifyUrl('http://www.example.com/alipay_test');
    }

    public function testRefundNoPwd()
    {
        /**
         * @var LegacyRefundNoPwdResponse $response
         */
        $response = $this->gateway->refundNoPwd(
            [
                'refund_items' => [
                    [
                        'out_trade_no' => '2017051221001004460213417006',
                        'amount'       => '1',
                        'reason'       => 'test',
                    ]
                ]
            ]
        )->send();
        $this->assertNotEmpty($response->getRedirectData());
    }

    public function testCompleteRefundNoPwdWithMD5()
    {
        $str = 'notify_time=2017-05-16 15:12:17&notify_type=batch_refund_notify&notify_id=1c8681cbe606fee153be01063049f9bk3a&sign_type =MD5&sign=12f71382d7b8398936b40312a7d3dbef&batch_no=201705162773&success_num=0&result_details=2017051221001004460213417006^0.01^TRADE_HAS_CLOSED';

        parse_str($str, $data);

        $data['sign']      = (new Signer($data))->signWithMD5($this->key);
        $data['sign_type'] = 'MD5';

        /**
         * @var LegacyExpressPurchaseResponse $response
         */
        $request = $this->gateway->completeRefundNoPwd(['params' => $data]);
        $request->setVerifyNotifyId(false);
        $response = $request->send();
        $this->assertTrue($response->isSuccessful());
    }
}
