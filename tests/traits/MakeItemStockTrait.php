<?php

use Faker\Factory as Faker;
use App\Models\ItemStock;
use App\Repositories\ItemStockRepository;

trait MakeItemStockTrait
{
    /**
     * Create fake instance of ItemStock and save it in database
     *
     * @param array $itemStockFields
     * @return ItemStock
     */
    public function makeItemStock($itemStockFields = [])
    {
        /** @var ItemStockRepository $itemStockRepo */
        $itemStockRepo = App::make(ItemStockRepository::class);
        $theme = $this->fakeItemStockData($itemStockFields);
        return $itemStockRepo->create($theme);
    }

    /**
     * Get fake instance of ItemStock
     *
     * @param array $itemStockFields
     * @return ItemStock
     */
    public function fakeItemStock($itemStockFields = [])
    {
        return new ItemStock($this->fakeItemStockData($itemStockFields));
    }

    /**
     * Get fake data of ItemStock
     *
     * @param array $postFields
     * @return array
     */
    public function fakeItemStockData($itemStockFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'kode_stock' => $fake->word,
            'satuan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $itemStockFields);
    }
}
