<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExpirePlans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // return 0;

        $today = Carbon::today();

        $expiredPlans = DB::table('user_plans')
            ->where('expiry_date', '<=', $today)
            ->where('status', '!=', 'expired')
            ->get();

        foreach ($expiredPlans as $plan) {
            DB::table('user_plans')->where('id', $plan->id)->update([
                'status' => 'expired',
                'updated_at' => now(),
            ]);
        }

        $this->info("Expired " . $expiredPlans->count() . " plans.");
    
    }
}
