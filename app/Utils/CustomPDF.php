<?php

namespace App\Utils;

use TCPDF;

class CustomPDF extends TCPDF
{
    public $headerImage; // Store the header image path
    public $footerImage; // Store the footer image path

    // Custom Header
    public function Header()
    {
        if ($this->headerImage) {
            $this->Image($this->headerImage, 15, 10, 180); // Adjust position and size as needed
        }
    }

    // Custom Footer
    public function Footer()
    {
        if ($this->footerImage) {
            $this->Image($this->footerImage, 15, 270, 180); // Adjust position and size as needed
        }

        // Add Pagination
        $this->SetY(-15); // Position from bottom
        $this->SetFont('dejavusans', '', 10);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, 0, 'C'); // Centered vertically
    }



}
