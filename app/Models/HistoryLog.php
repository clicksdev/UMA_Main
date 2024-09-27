<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryLog extends Model
{
    protected $fillable = [
        'admin_id', 'action', 'table_name', 'changes'
    ];

    protected $casts = [
        'changes' => 'array',
    ];


    /**
     * Get the admin associated with the HistoryLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
