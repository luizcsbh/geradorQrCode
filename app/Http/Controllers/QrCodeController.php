<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qr-code.index');
    }

    public function generate(Request $request)
    {
        $url = $request->input('url');
        $size = $request->input('size');

        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setWidth($size);
        $renderer->setHeight($size);

        $writer = new \BaconQrCode\Writer($renderer);
        $qrCode = $writer->writeString($url);

        return response($qrCode)->header('Content-Type', 'image/png');
    }
}
