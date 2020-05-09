<?php

namespace App\Console\Commands;

use App\ChosenWorkshop;
use Carbon\Carbon;
use App\Workshop;
use App\Http\Controllers\WorkshopController;
use Illuminate\Console\Command;

class RefreshWorkshopStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workshop:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the validity of every workshop status scheduled date and modify the chosen_workshop 
    table records according to the defined condition for every one hour';

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
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Refresh chosen_workshops table!");

        $workshopIds = Workshop::where('is_verified', '1')
        ->where('date', '<', Carbon::now('Asia/Jakarta')->toDateString())
        ->distinct()->pluck('id');
        $this->softDeleteUserCreatedWorkshop($workshopIds);
        $this->changeUpcomingToHistory($workshopIds);
    }

    private function changeUpcomingToHistory($workshopIds){
        ChosenWorkshop::where('workshop_status', 'upcoming')
        ->whereIn('workshop_id', $workshopIds)
        ->get();

        ChosenWorkshop::where('workshop_status', 'upcoming')
        ->whereIn('workshop_id', $workshopIds)
        ->update([
            'workshop_status' => 'history'
        ]);
    }

    private function softDeleteUserCreatedWorkshop($workshopIds){
        $userCreatedWorkshopId = ChosenWorkshop::where('workshop_status', 'my_workshop')->whereIn('workshop_id', $workshopIds)->distinct()->pluck('workshop_id');
        $userId = ChosenWorkshop::where('workshop_status', 'my_workshop')->whereIn('workshop_id', $workshopIds)->distinct()->pluck('user_id');
        
        ChosenWorkshop::whereIn('workshop_id', $userCreatedWorkshopId)->whereIn('user_id', $userId)->delete();
        Workshop::whereIn('id', $workshopIds)->delete();
    }
}
