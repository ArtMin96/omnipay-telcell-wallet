<?php

namespace Omnipay\Telcell\Message;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class CompletePurchaseRequest
 * @package Omnipay\Telcell\Message
 */
class CompletePurchaseRequest extends PurchaseRequest
{
    /**
     * Prepare and get data
     * @return mixed|void
     */
    public function getData()
    {
        return $this->validateRequest($this->httpRequest->request);
    }

    /**
     * Send data and return response
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\Telcell\Message\CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * Validate request and return data, merchant has to echo with just 'OK' at the end
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $requestData
     *
     * @return array
     */
    protected function validateRequest(ParameterBag $requestData)
    {
        $data = $requestData->all();
        $data['success'] = false;

        // Check for required request data
        if ($requestData->has('buyer') &&
            $requestData->has('currency') &&
            $requestData->has('sum') &&
            $requestData->has('description') &&
            $requestData->has('valid_days') &&
            $requestData->has('issuer_id') &&
            $requestData->has('checksum')) {

            // Generate string to hash for verification
            $txtToHash = $this->getShopKey().'+'.
                $this->getShopId().'+'.
                $requestData->get('buyer').'+'.
                $requestData->get('currency').'+'.
                $requestData->get('sum').'+'.
                $requestData->get('description').'+'.
                $requestData->get('valid_days').'+'.
                $requestData->get('issuer_id');

            if ($requestData->has('info')) {
                $txtToHash .= '+'.$requestData->get('info');
            }

            // Check hash against checksum and set success status
            $data['success'] = strtoupper($requestData->get('checksum')) == strtoupper(md5($txtToHash));
        }

        return $data;
    }
}