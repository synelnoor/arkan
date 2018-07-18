<?php

use Faker\Factory as Faker;
use App\Models\StockOut;
use App\Repositories\StockOutRepository;

trait MakeStockOutTrait
{
    /**
     * Create fake instance of StockOut and save it in database
     *
     * @param array $stockOutFields
     * @return StockOut
     */
    public function makeStockOut($stockOutFields = [])
    {
        /** @var StockOutRepository $stockOutRepo */
        $stockOutRepo = App::make(StockOutRepository::class);
        $theme = $this->fakeStockOutData($stockOutFields);
        return $stockOutRepo->create($theme);
    }

    /**
     * Get fake instance of StockOut
     *
     * @param array $stockOutFields
     * @return StockOut
     */
    public function fakeStockOut($stockOutFields = [])
    {
        return new StockOut($this->fakeStockOutData($stockOutFields));
    }

    /**
     * Get fake data of StockOut
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStockOutData($stockOutFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'kode' => $fake->word,
            'tgl' => $fake->word,
            'total' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stockOutFields);
    }
}
