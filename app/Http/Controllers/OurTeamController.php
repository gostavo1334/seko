<?php

namespace App\Http\Controllers;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
        public function index(){
        $teamMembers = TeamMember::all();
        return view("ourteam", compact('teamMembers'));
    }
}
