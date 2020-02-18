<?php

namespace Omnipay\Etherscan;

use Omnipay\Etherscan\Message\FetchBalanceRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Etherscan';
    }

    public function getDefaultParameters()
    {
        return [
            'api_key'    => '',
        ];
    }

    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('api_key', $value);
    }

    public function fetchBalance(array $parameters = [])
    {
        return $this->createRequest(FetchBalanceRequest::class, $parameters);
    }
}
