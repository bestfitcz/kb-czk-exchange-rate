<?php

namespace Bestfitcz\KbCzkExchangeRate;

use GuzzleHttp\Client;
use Bestfitcz\KbCzkExchangeRate\KbCzkExchangeRate\Models\KbCzkExchangeRate as ExchangeRateModel;

class KbCzkExchangeRate
{
    /** @var \GuzzleHttp\Client */
    protected Client $client;

    /** @var string */
    protected string $endpoint = 'https://maps.googleapis.com/maps/api/geocode/json';

    /** @var string */
    protected string $currency;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setCurrency(string $currency): KbCzkExchangeRate
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrencyExchangeRate(string $currency)
    {
        $response = $this->client->request('GET', $this->endpoint . $this->currency);

        if ($response->getStatusCode() !== 200) {
            //throw CouldNotGeocode::couldNotConnect();
        }

        $currencyExchangeRateResponse = json_decode($response->getBody());

        if (! empty($currencyExchangeRateResponse->error_message)) {
            //throw CouldNotGeocode::serviceReturnedError($currencyExchangeRateResponse->error_message);
        }

        if (! count($currencyExchangeRateResponse->results)) {
            //return $this->emptyResponse();
        }

        return ExchangeRateModel::create($this->formatResponse($currencyExchangeRateResponse));
    }

    protected function formatResponse($response): array
    {
        return [
            'currency_iso' => $response->results[0]->currency_iso,
            'currency_short_name' => $response->results[0]->currency_short_name,
            'currency_full_name' => $response->results[0]->currency_full_name,
            'country' => $response->results[0]->country,
            'country_iso' => $response->results[0]->country_iso,
            'rates_validity_date' => $response->results[0]->rates_validity_date,
            'currency_unit' => $response->results[0]->currency_unit,
            'middle' => $response->results[0]->middle,
            'cash_buy' => $response->results[0]->cash_buy,
            'cash_sell' => $response->results[0]->cash_sell,
            'noncash_buy' => $response->results[0]->noncash_buy,
            'noncash_sell' => $response->results[0]->noncash_sell,
            'decimal_places' => 4
        ];
    }
}
