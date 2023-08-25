<?php

namespace App\Console\Commands;

use App\Models\CashWallet;
use App\Models\User;
use App\Models\GeneralSettings;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use function Sodium\add;
use Auth;
use App\Models\Purchase;
use App\Models\Package;

class DailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily package bonus';

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
        //return Command::SUCCESS;

        $users = Purchase::all();
        $sponsor_bonus= GeneralSettings::select('royality_bonus')->first();

        //$daily_bonus= User::where('id',Auth::id())->first();
        //dd($daily_bonus->packages->price);
        //dd($sponsor_bonus['royality_bonus']);

        foreach ($users as $user) {
        //  dd($user);

                $date1 = new DateTime($user['created_at']);
                $date2 = new DateTime(Carbon::now()->addDay(1));
                $days  = $date2->diff($date1)->format('%a');
                        $now = Carbon::now();
$weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
$weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
                //dd($days);
                $package_id= Package::where('id',$user->package_id)->first();
              //  dd($package_id->return_percentage);
              $usr_id= User::where('id',$user->user_id)->first();
              //dd($usr_id->sponsor);

                if ($days <= $package_id->duration){
                    if(Carbon::now() != $weekEndDate ){
                        CashWallet::create([
                        'user_id'=>$user['user_id'],
                        'bonus_amount'=> $package_id->return_percentage,
                        'method'=>'daily bonus',
                        'note'=>'Bonus',
                    ]);
                    }

                    
                   

                }


        }

        $this->info('Successfully added daily bonus.');

      //  $use=((($user['packages']['return_percentage']*$user['packages']['price'])/100)*$sponsor_bonus['royality_bonus']/100)*$income[$i]/100;
    }
    public function find_placement_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        return $user_id->placement_id;
    }

}
