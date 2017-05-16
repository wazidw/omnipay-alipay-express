<?php

namespace Omnipay\AlipayExpress;

// use Omnipay\Alipay\LegacyExpressGateway as AlipayLegacyExpressGateway;

/**
 * Class LegacyExpressGateway
 * @package Omnipay\AlipayExpress
 */
class LegacyExpressGateway extends AbstractLegacyGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Alipay Legacy Express Gateway';
    }
}
