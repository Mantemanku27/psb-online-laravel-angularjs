<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 02/09/2015
 * Time: 15:48
 */

namespace App\Http\Controllers\Cetak;


use Anouar\Fpdf\Fpdf;

class PdfClass extends Fpdf
{
    var $is_header = false;
    var $is_footer = false;
    var $get_title = '';
    var $set_footer = 0;
    var $set_widths = 0;
    var $set_line = false;
    var $set_line_spesial = false;
    var $with_cover = false;
    var $foot_width = 330;
    var $foot_width1 = 150; //margin khusus refrensi
    var $foot_width2 = 355; //margin khusus REnja Perubahan
    var $jarak = 40;
    var $margin = 20;
    var $margin1 = 10;//margin khusus refrensi
    var $margin2 = 15;//margin khusus renja perubahan
    var $orientasi = '';

    protected $padding_column = 5.2;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Header()
    {
        $title = $this->get_title;
        if ($this->is_header == true) {
            // Arial bold 15
            $this->SetFont('Arial', 'B', 15);
            // Move to the right
//            $this->Cell(80);
            // Title
            $this->SetX(1);
            $this->Cell(0, 10, $this->title, 0, 0, 'C');
            // Line break
            $this->Ln(20);
        } else if ($this->is_header == false) {

        }
    }

// Page footer
    function Footer()
    {
        if ($this->is_footer == true) {
            if ($this->set_line == true) {
                $f = $this->set_footer;
//                echo $f;
                $this->SetY(-$f);
                $l = $this->set_widths;
                $this->Cell($l, 5, '', 'T', 0, 'C');
            }

            if ($this->set_line_spesial == true) {
                $f = $this->set_footer;
//                echo 'F = '.$f.' | ';
                $h = $this->PageNo();
                if ($h == 7 OR $h == 9 OR $h == 12 OR $h == 13 OR $h == 14 OR $h == 19
                    OR $h == 20 OR $h == 22 OR $h == 27
                ) {
                    $this->SetY(-35);
                    $l = $this->set_widths;
                    $this->Cell($l, 5, '', 'T', 0, 'C');
                } else if ($h == 11 OR $h == 17 OR $h == 18) {
                    $this->SetY(-29);
                    $l = $this->set_widths;
                    $this->Cell($l, 5, '', 'T', 0, 'C');
                } else {
                    $this->SetY(-41);
                    $l = $this->set_widths;
                    $this->Cell($l, 5, '', 'T', 0, 'C');
                }
            }

            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            if($this->orientasi == 'K')
            {
                $this->SetX($this->margin1);
            }
            else if($this->orientasi == 'RP'){
                $this->SetX($this->margin2);
            }
            else{
                $this->SetX($this->margin);
            }
            $this->SetFont('Arial', 'I', 9);
//            $this->SetMargins(40, 20, 15);
            if($this->orientasi == 'K') {
                $this->Cell($this->foot_width1, $this->padding_column, $this->title, 'TBL', 0, 'L');
            }
            else if($this->orientasi == 'RP') {
                $this->Cell($this->foot_width2, $this->padding_column, $this->title, 'TBL', 0, 'L');
            }

            else{
                $this->Cell($this->foot_width, $this->padding_column, $this->title, 'TBL', 0, 'L');
            }
            $no = $this->PageNo() - 1;
            $no2 = $this->pages;
            if ($this->with_cover == true) {
                $this->Cell($this->jarak, $this->padding_column, ' - Halaman ' . $no . ' dari {nb} -', 'TBR', 0, 'R');
            } else {
                $this->Cell($this->jarak, $this->padding_column, ' - Halaman ' . $this->PageNo() . ' dari {nb} -', 'TBR', 0, 'R');
            }
//            $gambar = 'app/images/logo.png';
//            if ($this->orientasi == 'P') {
//                $this->Image($gambar, 160, 288, 35);
//            } else if ($this->orientasi == 'L') {
//                $this->Image($gambar, 225, 202, 35);
//            }
//            else if ($this->orientasi == 'K') {
//                $this->Image($gambar, 160, 322, 35);
//            }
//            else if ($this->orientasi == 'RP') {
//                $this->Image($gambar, 160, 322, 35);
//            }
        }

    }

    function Row($data, $height = 5, $color = 0)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = $height * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, $height, $data[$i], 0, $a, $color);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function Row2($data, $color = 0)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //Print the text
            $this->MultiCell($w, 6, $data[$i], 0, $a, $color);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    function Row3($data, $color = 0)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //Print the text
            $this->MultiCell($w, 3, $data[$i], 0, $a, $color);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    function Rowberpergian($data, $color = 0)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 4 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //Print the text
            $this->MultiCell($w, 4, $data[$i], 0, $a, $color);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw =& $this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }

        return $nl;
    }

    function HCell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        //Output a cell
        $k = $this->k;
        if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
            //Automatic page break
            $x = $this->x;
            $ws = $this->ws;
            if ($ws > 0) {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->AddPage($this->CurOrientation, $this->CurPageSize);
            $this->x = $x;
            if ($ws > 0) {
                $this->ws = $ws;
                $this->_out(sprintf('%.3F Tw', $ws * $k));
            }
        }
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $s = '';

        // begin change Cell function
        if ($fill || $border > 0) {
            if ($fill)
                $op = ($border > 0) ? 'B' : 'f';
            else
                $op = 'S';
            if ($border > 1) {
                $s = sprintf('q %.2F w %.2F %.2F %.2F %.2F re %s Q ', $border,
                    $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
            } else
                $s = sprintf('%.2F %.2F %.2F %.2F re %s ', $this->x * $k, ($this->h - $this->y) * $k, $w * $k, -$h * $k, $op);
        }
        if (is_string($border)) {
            $x = $this->x;
            $y = $this->y;
            if (is_int(strpos($border, 'L')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'l')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, $x * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'T')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);
            else if (is_int(strpos($border, 't')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - $y) * $k);

            if (is_int(strpos($border, 'R')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'r')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', ($x + $w) * $k, ($this->h - $y) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);

            if (is_int(strpos($border, 'B')))
                $s .= sprintf('%.2F %.2F m %.2F %.2F l S ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
            else if (is_int(strpos($border, 'b')))
                $s .= sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ', $x * $k, ($this->h - ($y + $h)) * $k, ($x + $w) * $k, ($this->h - ($y + $h)) * $k);
        }
        if (trim($txt) != '') {
            $cr = substr_count($txt, "\n");
            if ($cr > 0) { // Multi line
                $txts = explode("\n", $txt);
                $lines = count($txts);
                for ($l = 0; $l < $lines; $l++) {
                    $txt = $txts[$l];
                    $w_txt = $this->GetStringWidth($txt);
                    if ($align == 'R')
                        $dx = $w - $w_txt - $this->cMargin;
                    elseif ($align == 'C')
                        $dx = ($w - $w_txt) / 2;
                    else
                        $dx = $this->cMargin;

                    $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                    if ($this->ColorFlag)
                        $s .= 'q ' . $this->TextColor . ' ';
                    $s .= sprintf('BT %.2F %.2F Td (%s) Tj ET ',
                        ($this->x + $dx) * $k,
                        ($this->h - ($this->y + .5 * $h + (.7 + $l - $lines / 2) * $this->FontSize)) * $k,
                        $txt);
                    if ($this->underline)
                        $s .= ' ' . $this->_dounderline($this->x + $dx, $this->y + .5 * $h + .3 * $this->FontSize, $txt);
                    if ($this->ColorFlag)
                        $s .= ' Q ';
                    if ($link)
                        $this->Link($this->x + $dx, $this->y + .5 * $h - .5 * $this->FontSize, $w_txt, $this->FontSize, $link);
                }
            } else { // Single line
                $w_txt = $this->GetStringWidth($txt);
                $Tz = 100;
                if ($w_txt > $w - 2 * $this->cMargin) { // Need compression
                    $Tz = ($w - 2 * $this->cMargin) / $w_txt * 100;
                    $w_txt = $w - 2 * $this->cMargin;
                }
                if ($align == 'R')
                    $dx = $w - $w_txt - $this->cMargin;
                elseif ($align == 'C')
                    $dx = ($w - $w_txt) / 2;
                else
                    $dx = $this->cMargin;
                $txt = str_replace(')', '\\)', str_replace('(', '\\(', str_replace('\\', '\\\\', $txt)));
                if ($this->ColorFlag)
                    $s .= 'q ' . $this->TextColor . ' ';
                $s .= sprintf('q BT %.2F %.2F Td %.2F Tz (%s) Tj ET Q ',
                    ($this->x + $dx) * $k,
                    ($this->h - ($this->y + .5 * $h + .3 * $this->FontSize)) * $k,
                    $Tz, $txt);
                if ($this->underline)
                    $s .= ' ' . $this->_dounderline($this->x + $dx, $this->y + .5 * $h + .3 * $this->FontSize, $txt);
                if ($this->ColorFlag)
                    $s .= ' Q ';
                if ($link)
                    $this->Link($this->x + $dx, $this->y + .5 * $h - .5 * $this->FontSize, $w_txt, $this->FontSize, $link);
            }
        }

        // end change Cell function
        if ($s)
            $this->_out($s);
        $this->lasth = $h;
        if ($ln > 0) {
            //Go to next line
            $this->y += $h;
            if ($ln == 1)
                $this->x = $this->lMargin;
        } else
            $this->x += $w;
    }
    function FancyRow($data)
    {
        //Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i],$data[$i]));
        }
        //Issue a page break first if needed
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++) {
            $w=$this->widths[$i];


            // alignment
            // maxline
//            $m = isset($maxline[$i]) ? $maxline[$i] : false;
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border

            // Setting Style
            $this->MultiCell($w, 5, $data[$i],1, 1);
            //Put the position to the right of the cell
            $this->SetXY($x+$w, $y);
        }
        //Go to the next line
    }
    function FancyRow2($data)
    {
        //Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i],$data[$i]));
        }
        //Issue a page break first if needed
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++) {
            $w=$this->widths[$i];


            // alignment
            // maxline
//            $m = isset($maxline[$i]) ? $maxline[$i] : false;
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border

            // Setting Style
            $this->MultiCell($w, 4, $data[$i],1, 1);
            //Put the position to the right of the cell
            $this->SetXY($x+$w, $y);
        }
        //Go to the next line
    }
    var $angle=0;

    function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }

    function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }
}