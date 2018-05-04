<?php

use Faker\Factory as Faker;
use App\Models\Toko;
use App\Repositories\TokoRepository;

trait MakeTokoTrait
{
    /**
     * Create fake instance of Toko and save it in database
     *
     * @param array $tokoFields
     * @return Toko
     */
    public function makeToko($tokoFields = [])
    {
        /** @var TokoRepository $tokoRepo */
        $tokoRepo = App::make(TokoRepository::class);
        $theme = $this->fakeTokoData($tokoFields);
        return $tokoRepo->create($theme);
    }

    /**
     * Get fake instance of Toko
     *
     * @param array $tokoFields
     * @return Toko
     */
    public function fakeToko($tokoFields = [])
    {
        return new Toko($this->fakeTokoData($tokoFields));
    }

    /**
     * Get fake data of Toko
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTokoData($tokoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'code' => $fake->word,
            'deskripsi' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tokoFields);
    }
}
