<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;
use PDF;
//use mikehaertl\wkhtmlto\Pdf;


class DisplayController extends Controller
{

	public function index()
    {

 $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
          
        return view('chartsdata', compact('userData'));

	}

	

public function pdfview(Request $request)
{
  $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $items = DB::table("users")->get();
        //view()->share('items',$items);
          view()->share(['items' => $items, 'userData' => $userData]);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfview');
}

public function preview()
    {
        return view('charts');
    }

    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $render = view('charts')->render();

	$pdf = new Pdf;

        $pdf->addPage($render);
	$pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));

        return response()->download(public_path('report.pdf'));
    }

}


