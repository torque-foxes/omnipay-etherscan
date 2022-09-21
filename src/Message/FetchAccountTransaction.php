<?php

namespace Omnipay\Etherscan\Message;

class FetchAccountTransaction extends AbstractRequest
{
    protected function getModule(): string
    {
        return 'account';
    }

    protected function getAction(): string
    {
        return 'txlist';
    }

    protected function validateRequest(): void
    {
        $this->validate(
            'address'
        );
    }

    protected function getRequestData()
    {
        return [
            'address'   => $this->getAddress(),
            'startblock' => 0,
            'endblock' => $this->getLatestTx() ? 1 : 99999999, // only returns max of 10,000 records
            'page' => 1,
            'offset' => 10,
            'sort' => 'desc',
            'latest' => $this->getLatestTx(),
        ];
    }

    public function getAddress()
    {
        return $this->getParameter('address');
    }

    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }

    public function getLatestTx()
    {
        return $this->getParameter('latest');
    }

    public function setLatestTx($value)
    {
        if (!$value || is_null($value)) {
            $value = false;
        }

        return $this->setParameter('latest', $value);
    }
}
