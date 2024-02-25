<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NavService;

class ContestController extends Controller
{


    public function index(Request $request){
        return NavService::navigate($request, 'contests.index');
    }


    public function show(Request $request){
        return NavService::navigate($request, 'contests.show');
    }


    public function create(Request $request){
        return NavService::navigate($request, 'contests.create');
    }


    public function store(Request $request){
        return NavService::navigate($request, 'contests.store');
    }
}
