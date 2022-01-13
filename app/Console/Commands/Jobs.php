<?php

namespace App\Console\Commands;

use App\Models\JobCategory;
use App\Models\JobProvider;
use App\Models\User;
use Carbon\Carbon;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Console\Command;

class Jobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:Jobdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Jobs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data=explode(",","Information Technology, Health Care, Financials, Consumer Discretionary, Communication Services, Industrials, Consumer Staples, Energy, Utilities, Real Estate, and Materials");
        dd($data);
        $faker=\Faker\Factory::create();
        foreach ($data as $key =>$d) {
            $cat=new  JobCategory();
            $cat->name=$d;
            $cat->save();
            for ($i=10; $i < 20; $i++) {
                $user=new User();
                $user->name=$faker->name;
                $user->address  =$faker->address;
                $user->email=$faker->email;
                $user->phone='98'.$i.'916365';
                $user->password=bcrypt('password');
                $user->company=$faker->company;
                $user->desc=$faker->text;
                $user->role=2;
                $user->save();
                for ($j=0; $j < 30; $j++) {
                    $job=new JobProvider();
                    $job->title = $faker->jobTitle;
                    $job->desc = $faker->text;
                    $job->job_category_id = $cat->id;
                    $job->type = mt_rand(1,2);
                    $job->opening = mt_rand(1,9);
                    $job->salary = mt_rand(10000,60000);
                    $job->designation = $job->Title;
                    $job->education = "BSC Bachleor in Science";
                    $job->exp = mt_rand(1,10).' yrs';
                    $job->lastdate = Carbon::now()->addDay(mt_rand(-4,30));
                    $job->positiontype = 1;
                    $job->user_id = $user->id;
                    $job->save();
                }
            }
        }

        return 0;
    }
}
