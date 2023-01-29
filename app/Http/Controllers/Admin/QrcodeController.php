<?php

namespace App\Http\Controllers\Admin;

use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

class QrcodeController extends Controller
{
    public function index()
    {

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data(URL::to('/') . '#menu')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(500)
            ->margin(10)
            ->validateResult(false)
            ->build();

        return view('admin/qrcode/index', array('data' => $result->getDataUri()));
    }
}
