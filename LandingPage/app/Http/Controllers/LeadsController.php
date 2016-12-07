<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Leads;
use App\Http\Requests\LeadRequest;
use Illuminate\Http\Request;

class LeadsController extends Controller {
    public function index() {
        $leads = Leads::all();
        return view('leads.index',['leads'=>$leads]);
    }
    
    public function create() {
        return view('leads.create');
    }
    
    public function store(LeadRequest $request) {
        $input = $request->all();
        Leads::create($input);
        
        return redirect('leads');
    }
}