<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index()
    {
        // Lấy tất cả tên bảng trong cơ sở dữ liệu
        $tables = Schema::getAllTables();

        // Mảng để lưu trữ tên của các bảng
        $tableNames = [];

        // Lặp qua tất cả các bảng và chỉ lấy tên của chúng
        foreach ($tables as $table) {
            $tableNames[] = $table;
        }

        // Hiển thị mảng chứa tên của các bảng
        // dd($tableNames);

        return view('admin.database.index', compact('tableNames'));
    }
    public function detail($id)
    {
        // Check if the table exists in the database
        if (Schema::hasTable($id)) {
            $table = $id;
            $rows = DB::table($id)->get();
            $columnNames = Schema::getColumnListing($id);
            // dd($columnNames);
            // dd($rows);
            return view('admin.database.table_detail', compact('table', 'rows', 'columnNames', 'id'));
        } else {
            // Handle the case when the table does not exist
            // Redirect or display an error message
        }
    }
}
