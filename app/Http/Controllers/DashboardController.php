<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->data['referance_order'] = DB::table('referance_order')->get()->except('id')->first();
    }
    private function getData(string $table)
    {
        return DB::table($table)->get();
    }

    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        $this->data['users'] = $this->getData('users');
        return view('users', $this->data);
    }

    public function tables()
    {
        $this->data['tables'] = $this->getData('tables');
        return view('tables', $this->data);
    }

    public function reservations()
    {
        $this->data['tables'] = $this->getData('tables');
        $this->data['reservations'] = $this->getData('reservations');
        return view('reservations', $this->data);
    }

    public function feedback()
    {
        $this->data['feedback'] = $this->getData('feedback');
        return view('feedback', $this->data);
    }

    public function employees()
    {
        $this->data['employees'] = $this->getData('employees');
        return view('employees', $this->data);
    }

    public function invoices()
    {
        $this->data['invoices'] = $this->getData('invoices');
        return view('invoices', $this->data);
    }
}
