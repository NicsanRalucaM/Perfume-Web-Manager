<?php

require('writeHtml.php');

$pdf=new PDF_HTML();
$pdf->AliasNbPages();

//add page automatically for its true parameter

$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();

//add logo image here



//set font style

$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<div>buna</div><div class="hai"><a id="a" href="www.google.com">sdgdfg</a></div><script>document.getElementById("a").innerText="daaa";</script>');

//set the form of pdf

$pdf->SetFont('Arial','B',8);

//assign the form post value in a variable and pass it.


//Write HTML to pdf file and output that file on the web browser.

$htmlTable='<TABLE>
<TR>
<TD>Name:</TD>
<TD>'.$_POST['name'].'</TD>
</TR>
<TR>
<TD>Email:</TD>
<TD>'.$_POST['email'].'</TD>
</TR>
<TR>
<TD>Phone:</TD>
<TD>'.$_POST['phone'].'</TD>
</TR>
</TABLE>';

//Write HTML to pdf file and output that file on the web browser.

$pdf->WriteHTML("<br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output();

?>
