<?php

namespace App\Helpers;
use Endroid\QrCode\QrCode;
use App\Adjustment;

class QRGenerator {
	private $adjustment;
	private $targetdir;

	public function __construct(Adjustment $adjustment) {
		$this->adjustment = $adjustment;
		$this->targetdir = public_path() . "/qrcodes/";
	}

	public function generateQR() {
		// URL = base . /api/adjustments/{id}
		$qrCode = new QrCode();
		$qrCode
	    ->setText(url('/') . '/api/adjustments/' . $this->adjustment->id)
	    ->setSize(300)
	    ->setPadding(10)
	    ->setErrorCorrection('high')
	    ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
	    ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
	    ->setLabel('Scan the code')
	    ->setLabelFontSize(16)
	    ->setImageType(QrCode::IMAGE_TYPE_PNG);

    if($qrCode->save($this->targetdir . $this->adjustment->id . '.png')) {
    	return true;
    } else {
    	return false;
    }
	}
}
