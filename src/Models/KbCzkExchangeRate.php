<?php

namespace Bestfitcz\KbCzkExchangeRate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class KbCzkExchangeRate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'currency_iso',
        'currency_short_name',
        'currency_full_name',
        'country',
        'country_iso',
        'rates_validity_date',
        'currency_unit',
        'middle',
        'cash_buy',
        'cash_sell',
        'noncash_buy',
        'noncash_sell',
        'decimal_places',
    ];

    protected $dates = [
        'rates_validity_date',
        'updated_at',
        'created_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('kb-czk-exchange-rate.exchange_rates_table'));
    }

}
