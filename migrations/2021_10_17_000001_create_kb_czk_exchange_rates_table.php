<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueMonitorTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$tableName = config('kb-czk-exchange-rate.exchange_rates_table');

		/*
		 https://api.kb.cz/openapi/v1/exchange-rates/EUR
        {
            "currencyISO":"EUR",
            "currencyShortName":"euro",
            "currencyFullName":"euro",
            "country":"Evropská unie",
            "countryISO":"EU",
            "ratesValidityDate":"2021-10-13T05:00:00.000Z",
            "currencyUnit":1,
            "middle":25.3708,
            "cashBuy":24.6224,
            "cashSell":26.1192,
            "noncashBuy":24.6807,
            "noncashSell":26.0609
        }
		*/
		Schema::create($tableName, function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('currency_iso')->nullable()->index();
			$table->string('currency_short_name')->nullable();
			$table->string('currency_full_name')->nullable();
            $table->string('country')->nullable();
            $table->string('country_iso')->nullable();
            $table->timestamp('rates_validity_date')->nullable()->index();
            $table->integer('currency_unit')->nullable();
            $table->integer('middle')->nullable();
            $table->integer('cash_buy')->nullable();
            $table->integer('cash_sell')->nullable();
            $table->integer('noncash_buy')->nullable();
            $table->integer('noncash_sell')->nullable();
            $table->integer('decimal_places')->nullable();

            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$tableName = config('kb-czk-exchange-rate.exchange_rates_table');

		Schema::drop($tableName);
	}
}
