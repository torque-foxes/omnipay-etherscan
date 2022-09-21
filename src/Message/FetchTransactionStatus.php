<?php

namespace Omnipay\Etherscan\Message;

use Omnipay\Common\AbstractGateway;

class FetchTransactionStatus extends FetchTransactionRequest
{
    protected function getModule(): string
    {
        return 'transaction';
    }

    protected function getAction(): string
    {
        return 'gettxreceiptstatus';
    }
}
