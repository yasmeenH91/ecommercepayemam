<?php

use Illuminate\Support\Facades\Route;



Route::get('test',function (){
    return \App\Models\Category::find(1)->makeVisible('translations');
});
