<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use Illuminate\Http\Request;

class ForParentController extends Controller
{
    public function push()
    {
        event(new MyEvent('hello world'));
    }
}
