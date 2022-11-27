<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    User::create([
      'name' => 'Victor Arana Flores',
      'email' => 'victor.aranaf92@gmail.com',
      'password' => bcrypt('12345678')
    ])->assignRole('Admin');

    User::factory(99)->create();
  }
}
