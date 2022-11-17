<?php

use Illuminate\Support\Facades\DB;

    function generalSettings(){
        $generalSettings = App\Models\generalSettings::latest()->first();
        return $generalSettings;
    }

    /**
     * get all divisions
     */
    function divisions(){
        return DB::table('divisions')->orderBy('name')->get();
    }
    /**
     * get all districts
     */
    function districts(){
        return DB::table('districts')->orderBy('name')->get();
    }
    /**
     * function divisions
     */
    function thanas(){
        return DB::table('upazilas')->orderBy('name')->get();
    }
    /**
     * function quick link
     */
    function quickLinks()
    {
        return App\Models\QuickLink::where('status', 'Active')->get();
    }
