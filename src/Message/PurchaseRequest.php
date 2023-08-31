<?php

namespace Omnipay\Telcell\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Class PurchaseRequest
 * @package Omnipay\Telcell\Message
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Sets the request shop id.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setShopId(string $value)
    {
        return $this->setParameter('shopId', $value);
    }

    /**
     * Get the request shop id.
     * @return mixed
     */
    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    /**
     * Sets the request shop key.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setShopKey(string $value)
    {
        return $this->setParameter('shopKey', $value);
    }

    /**
     * Get the request shop key.
     * @return mixed
     */
    public function getShopKey()
    {
        return $this->getParameter('shopKey');
    }

    /**
     * Sets the request description.
     *
     * @param $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    /**
     * Sets the request email.
     *
     * @param $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * Get the request email
     * @return mixed
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Get the request description.
     * @return $this
     */
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * Sets the request bill issuer.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setBillIssuer(string $value)
    {
        return $this->setParameter('bill:issuer', $value);
    }

    /**
     * Get the request bill issuer.
     * @return $this
     */
    public function getBillIssuer()
    {
        return $this->getParameter('bill:issuer');
    }

    /**
     * Sets the request buyer.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setBuyer(string $value)
    {
        return $this->setParameter('buyer', $value);
    }

    /**
     * Get the request buyer.
     * @return $this
     */
    public function getBuyer()
    {
        return $this->getParameter('buyer');
    }

    /**
     * Sets the request Amount.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setSum($value)
    {
        return $this->setParameter('sum', $value);
    }

    /**
     * Get Amount.
     * @return mixed
     */
    public function getSum()
    {
        return $this->getParameter('sum');
    }

    /**
     * Sets the request issuer id.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setTransactionId($value)
    {
        return $this->setParameter('issuer_id', $value);
    }

    /**
     * Get Amount
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->getParameter('issuer_id');
    }

    /**
     * Sets the request valid days.
     *
     * @param $value
     *
     * @return mixed
     */
    public function setValidDays($value)
    {
        return $this->setParameter('valid_days', $value);
    }

    /**
     * Get valid days
     * @return mixed
     */
    public function getValidDays()
    {
        return $this->getParameter('valid_days');
    }

    public function setSecurityCode($value)
    {
        return $this->setParameter('security_code', $value);
    }

    public function getSecurityCode()
    {
        return $this->getParameter('security_code');
    }

    public function setProduct($value)
    {
        return $this->setParameter('product', $value);
    }

    public function getProduct()
    {
        return $this->getParameter('product');
    }

    /**
     * Set custom data to get back as is
     *
     * @param array $value
     *
     * @return $this
     */
    public function setInfo(array $value = [])
    {
        return $this->setParameter('info', $value);
    }

    /**
     * Get custom data
     * @return mixed
     */
    public function getInfo()
    {
        return $this->getParameter('info');
    }

    /**
     * Prepare data to send
     * @return array
     */
    public function getData()
    {
        $this->validate('shopId', 'shopKey', 'bill:issuer', 'sum', 'issuer_id', 'valid_days', 'security_code', 'product');

        return [
            'action'        => 'PostInvoice',
            'issuer'        => $this->getShopId(),
            'currency'      => $this->getCurrency(),
            'price'         => $this->getSum(),
            'product'       => $this->getProduct(),
            'issuer_id'     => $this->getTransactionId(),
            'valid_days'    => $this->getValidDays(),
            'lang'          => 'hy',
            'security_code' => $this->getSecurityCode(),
        ];
    }

    /**
     * Send data and return response instance
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\Telcell\Message\PurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}