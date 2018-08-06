<?php

use Faker\Factory as Faker;
use App\Models\LogStock;
use App\Repositories\LogStockRepository;

trait MakeLogStockTrait
{
    /**
     * Create fake instance of LogStock and save it in database
     *
     * @param array $logStockFields
     * @return LogStock
     */
    public function makeLogStock($logStockFields = [])
    {
        /** @var LogStockRepository $logStockRepo */
        $logStockRepo = App::make(LogStockRepository::class);
        $theme = $this->fakeLogStockData($logStockFields);
        return $logStockRepo->create($theme);
    }

    /**
     * Get fake instance of LogStock
     *
     * @param array $logStockFields
     * @return LogStock
     */
    public function fakeLogStock($logStockFields = [])
    {
        return new LogStock($this->fakeLogStockData($logStockFields));
    }

    /**
     * Get fake data of LogStock
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLogStockData($logStockFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_stock' => $fake->randomDigitNotNull,
            'id_stockin' => $fake->randomDigitNotNull,
            'id_stockout' => $fake->randomDigitNotNull,
            'tgl' => $fake->word,
            'jml_in' => $fake->word,
            'jml_out' => $fake->word,
            'nama' => $fake->word,
            'kode' => $fake->word,
            'stock_awal' => $fake->word,
            'stock_akhir' => $fake->word,
            'id_itemstock' => $fake->randomDigitNotNull,
            'id_detailstockin' => $fake->randomDigitNotNull,
            'id_detailstockout' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $logStockFields);
    }
}
