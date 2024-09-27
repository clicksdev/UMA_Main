<?php

namespace App\Helpers;

use App\Models\HistoryLog;
use Illuminate\Support\Facades\Auth;

class ActionLogger
{
    public static function log($action, $table, $changes)
    {
        $admin = Auth::guard('admins')->user();

        HistoryLog::create([
            'admin_id' => $admin->id,
            'action' => $action,
            'table_name' => $table,
            'changes' => $changes,
        ]);
    }
}
