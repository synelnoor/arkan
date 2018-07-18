<?php

use Faker\Factory as Faker;
use App\Models\Stock;
use App\Repositories\StockRepository;

trait MakeStockTrait
{
    /**
     * Create fake instance of Stock and save it in database
     *
     * @param array $stockFields
     * @return Stock
     */
    public function makeStock($stockFields = [])
    {
        /** @var StockRepository $stockRepo */
        $stockRepo = App::make(StockRepository::class);
        $theme = $this->fakeStockData($stockFields);
        return $stockRepo->create($theme);
    }

    /**
     * Get fake instance of Stock
     *
     * @param array $stockFields
     * @return Stock
     */
    public function fakeStock($stockFields = [])
    {
        return new Stock($this->fakeStockData($stockFields));
    }

    /**
     * Get fake data of Stock
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStockData($stockFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_stockin' => $fake->randomDigitNotNull,
            'id_stockout' => $fake->randomDigitNotNull,
            'tgl' => $fake->word,
            'jml_in' => $fake->word,
            'jml_out' => $fake->word,
            'stock_awal' => $fake->word,
            'stock_akhir' => $fake->word,
            'id_itemstock' => $fake->randomDigitNotNull,
            'id_detailstockin' => $fake->randomDigitNotNull,
            'id_detailstockout' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stockFields);
    }
}
