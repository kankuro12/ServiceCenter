<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Footerheader;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = [
            ['title' => 'Information'],
            ['title' => 'Customer Service'],
            ['title' => 'My Account'],
        ];
        Footerheader::insert($title);
    }
}
