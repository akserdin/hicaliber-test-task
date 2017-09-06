<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array_map('str_getcsv', file(storage_path('app/property-data.csv')));

        foreach ($data as $index => $row) {
            if ($index === 0) {
                continue;
            }

            \App\Property::create([
                'name' => $row[0],
                'price' => $row[1],
                'bedrooms' => $row[2],
                'bathrooms' => $row[3],
                'storeys' => $row[4],
                'garages' => $row[5]
            ]);
        }
    }
}
