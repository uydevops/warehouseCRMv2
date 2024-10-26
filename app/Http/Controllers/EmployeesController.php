<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    private function saveData($data, $id = null)
    {
        if ($id) {
            DB::table('employees')->where('id', $id)->update($data);
        } else {
            DB::table('employees')->insert($data);
        }
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $this->saveData($data);
        return redirect()->back()->with('success', 'Çalışan başarıyla eklendi');
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        $this->saveData($data, $data['id']);
        return redirect()->back()->with('success', 'Çalışan başarıyla güncellendi');
    }

    public function delete($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Çalışan başarıyla silindi');
    }
}
