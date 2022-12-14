<?php
require 'fpdf/fpdf.php';

$connect = mysqli_connect("localhost", "root", "", "veda");
if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
?>
  <div class="container">
	<br/>
    <script>
        var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
        var d = new Date();
        document.write("" + monthNames[d.getMonth()]);
    </script>
    <span id="month">month Salary Report</span>
     
     <?php  
	 
		
		$pdf= new FPDF();
		
		$pdf->AddPage();
		
		//HEADER AND MANAGER INFORMATION:
		$date=date("jS F Y, g:i:s a");
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(0,8,"Employee Salary Report",1,1,"C");
		$pdf->Cell(0,8,"This is a computer generated report",0,1,"L");
		$pdf->Cell(0,8,"Date : $date",0,1,"L");
		$pdf->Ln(4);
		$pdf->SetFont("Arial","B",8);
		$pdf->SetFillColor(102,102,102);
    	$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(31, 152, 152); 
		$pdf->SetAutoPageBreak(true, 10);
		//  ability to display page numbers on your PDF pages.
		$pdf->AliasNbPages();
		$pdf->Cell(20,8,"SSN",1,0,"C",TRUE);
		$pdf->Cell(30,8,"Emp. Name",1,0,"C",TRUE);
		$pdf->Cell(20,8,"Generated On",1,0,"C",TRUE);
		$pdf->Cell(20,8,"Basic Salary",1,0,"C",TRUE);
		$pdf->Cell(20,8,"No. Of Absent",1,0,"C",TRUE);
		$pdf->Cell(25,8,"Salary Per Day",1,0,"C",TRUE);
		$pdf->Cell(35,8,"Deduction Of Absentee",1,0,"C",TRUE);
		$pdf->Cell(20,8,"Net Salary",1,0,"C",TRUE);
		$pdf->Ln(8);
		$pdf->SetFont("Arial","B",8);
		$pdf->SetTextColor(0, 0, 0);
			//querying employee data into table
	    $query=mysql_query("SELECT payrollId,employee.empId,payroll.name AS name,date,basicSalary,
						numOfLeaves,salaryPerDay,deduction,netSalary 
						FROM payroll JOIN employee ON employee.empId=payroll.empId
						WHERE employee.empId=payroll.empId ORDER BY payrollId ASC LIMIT 1000");
		$count=mysql_num_rows($query);
	
		$label=0;
		$netTotal=0;
		$net=0;
	
	while($row=mysql_fetch_array($query)){
	
		$pdf->Cell(20,8,$row['payrollId'],1,0,"L"); 
		$pdf->Cell(30,8,$row['name'],1,0,"L"); 
		$pdf->Cell(20,8,$row['date'],1,0,"L"); 
		$pdf->Cell(20,8,$row['basicSalary'],1,0,"L"); 
		$pdf->Cell(20,8,$row['numOfLeaves'],1,0,"L"); 
		$pdf->Cell(25,8,$row['salaryPerDay'],1,0,"L"); 
		$pdf->Cell(35,8,$row['deduction'],1,0,"L"); 
		$pdf->Cell(20,8,$row['netSalary'],1,0,"L"); 
		$pdf->Ln(8);
		
		$netTotal=$netTotal+$row['netSalary'];
	}
	$pdf->SetFont("Arial","B",8);
	$pdf->Cell(140,8,"",0);
	$pdf->SetFont("Arial","B",8);
		$pdf->SetFillColor(102,102,102);
    	$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(31, 152, 152); 
	$pdf->Cell(50,8,"Total Payable Money:  ".$netTotal.".00",1,0,"C",TRUE);
	
	ob_end_clean();
	$pdf->Output("employees-salary-report","D");
	?>
	<p>The details of payment made to employees can be printed from this pay</p>
 </div> 
	 <?php include 'includes/footerAll.php';?>  
</body>
</html>
