<?php

namespace Omnipay\Telcell;

use Omnipay\Telcell\Message\CompletePurchaseRequest;
use Omnipay\Telcell\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Http\ClientInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Telcell Gateway
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return 'Telcell';
    }

    /**
     * Gateway constructor.
     *
     * @param \Omnipay\Common\Http\ClientInterface|null      $httpClient
     * @param \Symfony\Component\HttpFoundation\Request|null $httpRequest
     */
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        parent::__construct($httpClient, $httpRequest);
    }

    /**
     * Get default parameters
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function getDefaultParameters()
    {
        return [
            'shopId'  => '',
            'shopKey' => '',
        ];
    }

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
     * Sets the request description.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
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
     * Create a purchase request
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = array())
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * Complete purchase
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
