<?php

use Faker\Factory as Faker;
use App\Models\StockIn;
use App\Repositories\StockInRepository;

trait MakeStockInTrait
{
    /**
     * Create fake instance of StockIn and save it in database
     *
     * @param array $stockInFields
     * @return StockIn
     */
    public function makeStockIn($stockInFields = [])
    {
        /** @var StockInRepository $stockInRepo */
        $stockInRepo = App::make(StockInRepository::class);
        $theme = $this->fakeStockInData($stockInFields);
        return $stockInRepo->create($theme);
    }

    /**
     * Get fake instance of StockIn
     *
     * @param array $stockInFields
     * @return StockIn
     */
    public function fakeStockIn($stockInFields = [])
    {
        return new StockIn($this->fakeStockInData($stockInFields));
    }

    /**
     * Get fake data of StockIn
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStockInData($stockInFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'kode' => $fake->word,
            'tgl' => $fake->word,
            'total' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stockInFields);
    }
}
