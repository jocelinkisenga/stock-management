<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [
            ['name' => 'kin marche jr', 'city' => 'kinshasa', 'phone' => '061234567896', 'email' => 'warehouse1@kinmarche.ma', 'country' => 'morocco'],
        ];

        collect($warehouses)->each(function ($warehouse): void {
            $ware = Warehouse::query()->create($warehouse);

            if (User::query()->first()) {
                $ware->users()->attach(User::query()->first()->id);
            }
        });
    }
}
