<?php

use Illuminate\Support\Facades\Route;



Route::get('test',function (){
    return \App\Models\Setting::find(13);
});
