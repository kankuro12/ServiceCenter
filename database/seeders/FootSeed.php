<?php
namespace Database\Seeders;
use App\Footerheader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FootSeed extends Seeder
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
        DB::table('footerinfos')->insert([
            'col_1' => 'Free Shipping',
            'item_1' => 'Orders Rs.500 or more',
            'col_2' => 'Free Returns',
            'item_2' => 'Within 30 days',
            'col_3' => 'Get 20% Off 1 Item',
            'item_3' => 'When you sign up',
            'col_4' => 'We Support',
            'item_4' => '24/7 amazing services'
        ]);
    }
}
