<?php

use Faker\Factory as Faker;
use App\Models\DetailStockIn;
use App\Repositories\DetailStockInRepository;

trait MakeDetailStockInTrait
{
    /**
     * Create fake instance of DetailStockIn and save it in database
     *
     * @param array $detailStockInFields
     * @return DetailStockIn
     */
    public function makeDetailStockIn($detailStockInFields = [])
    {
        /** @var DetailStockInRepository $detailStockInRepo */
        $detailStockInRepo = App::make(DetailStockInRepository::class);
        $theme = $this->fakeDetailStockInData($detailStockInFields);
        return $detailStockInRepo->create($theme);
    }

    /**
     * Get fake instance of DetailStockIn
     *
     * @param array $detailStockInFields
     * @return DetailStockIn
     */
    public function fakeDetailStockIn($detailStockInFields = [])
    {
        return new DetailStockIn($this->fakeDetailStockInData($detailStockInFields));
    }

    /**
     * Get fake data of DetailStockIn
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetailStockInData($detailStockInFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_stockin' => $fake->randomDigitNotNull,
            'id_itemstock' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'kode' => $fake->word,
            'tgl' => $fake->word,
            'jml' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $detailStockInFields);
    }
}
