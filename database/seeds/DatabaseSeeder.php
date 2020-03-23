<?php

use App\Models\Administrator;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Seed `administrators` table
        $administratorsCount = count(factory(Administrator::class, 10)->create());

        // Seed `positions` table
        $positions = factory(Position::class, 50)->make()
            ->each(function (Position $position) use ($administratorsCount) {
                $position->admin_created_id = rand(1, $administratorsCount);
            })->toArray();
        Position::insert($positions);

        // Seed `currencies` table
        Currency::insert(factory(Currency::class)->make()->toArray());

        $positionsCount = count($positions);
        $employeeCount = 200;

        // Seed `employees` table
        $employees = factory(Employee::class, $employeeCount)->make()->each(function (Employee $employee) use ($administratorsCount, $positionsCount, $employeeCount) {
            $employee->position_id = rand(1, $positionsCount);
            $employee->head_id = rand(1, $employeeCount);
            $employee->admin_created_id = rand(1, $administratorsCount);
        })->toArray();
        Employee::insert($employees);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
