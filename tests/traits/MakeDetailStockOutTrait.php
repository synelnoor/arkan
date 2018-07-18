<?php

use Faker\Factory as Faker;
use App\Models\DetailStockOut;
use App\Repositories\DetailStockOutRepository;

trait MakeDetailStockOutTrait
{
    /**
     * Create fake instance of DetailStockOut and save it in database
     *
     * @param array $detailStockOutFields
     * @return DetailStockOut
     */
    public function makeDetailStockOut($detailStockOutFields = [])
    {
        /** @var DetailStockOutRepository $detailStockOutRepo */
        $detailStockOutRepo = App::make(DetailStockOutRepository::class);
        $theme = $this->fakeDetailStockOutData($detailStockOutFields);
        return $detailStockOutRepo->create($theme);
    }

    /**
     * Get fake instance of DetailStockOut
     *
     * @param array $detailStockOutFields
     * @return DetailStockOut
     */
    public function fakeDetailStockOut($detailStockOutFields = [])
    {
        return new DetailStockOut($this->fakeDetailStockOutData($detailStockOutFields));
    }

    /**
     * Get fake data of DetailStockOut
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetailStockOutData($detailStockOutFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_stockout' => $fake->randomDigitNotNull,
            'id_itemstock' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'kode' => $fake->word,
            'tgl' => $fake->word,
            'jml' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $detailStockOutFields);
    }
}
