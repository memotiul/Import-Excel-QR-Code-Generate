<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\User;
use App\Imports\UsersImport;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ImportExcelController extends Controller
{
    function index()
    {
     $data = DB::table('users')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
     {
      Excel::import(new UsersImport,$request->select_file);
     return back()->with('success', 'Excel Data Imported successfully.');
    }
    public function generate ($id)
    {
        $user = User::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($user->qrdata);
        return view('qrcode',compact('qrcode'));
    }
}