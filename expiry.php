<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// 1. Load Composer's autoload
require __DIR__ . '/vendor/autoload.php';

// 2. Bootstrap the Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';

// 3. Create kernel and handle the request
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap(); // ✅ This is the missing part

// 4. Now Laravel is fully bootstrapped — use DB and Carbon
$currentDate = Carbon::now();

DB::table('user_plans')
    ->where('expiry_date', '<', $currentDate)
    ->where('status', '!=', 'expired')
    ->update(['status' => 'expired', 'updated_at' => $currentDate]);

echo "Expired plans have been updated successfully.\n";
