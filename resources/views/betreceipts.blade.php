<html>
<head>
	<title>Bet Receipt</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

	<style>	
	
	.row
	{
 background-color: #ffffff;
      color: #000000;
      font-family: Arial;
      font-size: 4pt

	}
	h2{
		margin-top: 60px;
	}

   body, td
    {
      background-color: #ffffff;
      color: #000000;
      font-family: Arial;
      font-size: 4pt;
   
            border: solid 1px black ;
            margin: 0px;
   }


   @media print 
{
   @page
   {
   	margin: 0; 
    size: 12.8 in 28.5in ;
    size: portrait;
 	size: auto;   /* auto is the current printer page size */
    margin: 0mm;  

  }
}


</style>

</head>
<body>

	<div class="row">




		<div id="printableArea" class="mine">

 			@foreach($betReceipts['outcomes'] as $ev)
 			

			<h3>Match :<strong>{{ $ev->EventTitle}}</strong></h3>

			<h3>BetPlacedOn :{{$ev->Title}} :       odds : {{$ev->PriceDecimal}}</h3> 
		
 			@endforeach


			<h3>Number of Odds :{{ $betReceipts['totalOdds']}}</h3>

			<h3>Amount Place  :{{ $betReceipts['amountplaced']}} SSP</h3>

			<h3>Possible win : {{ $betReceipts['possibleWin']}} SSP</h3>

			<br/>

			<br/>
	
		</div>
		<br/>
		<input type="button" onclick="printDiv('printableArea')" value="print a div!" />

		  <script>
         function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
    	 var originalContents = document.body.innerHTML;

     	 document.body.innerHTML = printContents;

     	window.print();

     	document.body.innerHTML = originalContents;
     	}
           
        </script>

	


	</div>

</body>
</html>