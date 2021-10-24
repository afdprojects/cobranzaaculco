<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       

        <title ></title>
        
<style type="text/css">
*{
	font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;	
	font-weight: normal;

}
	table {
  width: 100%;
}

.columna1 {
  width: 60%;
   
}
.columna2 {
  width: 40%;
 
}
</style>
        
     
</head>
 <body class="">
<table>

<thead >
	<tr>
		<th class="columna1"><!--{{ $modeloDiarios->fecha }}-->
			
			<table>
					<thead>
						<th style="width:30%;"><img src="{{ asset('images/logo.png') }}" height="80" width="80"></th>
						<th style="width:70%;">
							<center>
								<h4 style="font-size:15px; font-weight: bold;">MUNICIPIO DE ACULCO</h4>
							<p>ACULCO, ESTADO DE MEXICO RFC MAC-850101-VB6</p>
							<p>PLAZA  DE LA CONSTITUCIÓN NO.1</p>
						</center>
						</th>
					</thead>
					
			</table>
			<table>
				<thead>
					<th style="border: 1px solid black; width:100%; text-align: left; border-radius: 10px; padding: 25px;">
						NOMBRE: <b style="font-weight:bold !important;">{{ $modeloDiarios->nombre }}</b>
						<br><br>
						DOMICILIO: <b style="font-weight:bold !important;">{{ $modeloDiarios->domicilio }}</b>
						<br><br>
						POR CONCEPTO DE:
						<br><br>
						<b style="font-weight:bold !important;">{{ $modeloDiarios->concepto }}</b>
					</th>
				</thead>
				
			</table>
			<table>
				<thead>
					<th style="width:25%;"><br><br>
						<p style="border: 1px solid black; border-radius: 5px;padding: 5px;">
							<b style="font-weight:bold !important;">{{ $modeloDiarios->periodo }}</b>
						</p>
						<p>PERIODO DE PAGO</p><br><br>
						
					</th>
					<th style="width: 25%;">
						
						
					</th>
					<th style=" width:25%;">
						<p style="border: 1px solid black; border-radius: 5px; padding: 5px;">
							<b style="font-weight:bold !important;">{{ $modeloDiarios->cuenta }}</b>
						</p>
						<p>CLAVE DE PAGO
<b style="font-size: 9px; font-weight:bold !important;">{{ $modeloDiarios->nombrecuenta }}</b>
						</p>
						
						
					</th>
					<th style=" width:25%;">
						
					</th>
				</thead>
				
			</table>

			<table style="border: 1px solid black; border-radius: 5px;padding: 5px;">
				<thead>
					<tr>
						
						<th style="width:10%; border-right: 1px solid black;"> Dis: <b style="font-weight:bold !important;">1</b></th>
						<th style="width:20%; border-right: 1px solid black;">MUN: <b style="font-weight:bold !important;">032</b></th>
						<th style="width:40%; border-right: 1px solid black;">CUENTA: <b style="font-weight:bold !important;">{{ $modeloDiarios->cuentaRecibo }}</b></th>
						<th style="width:30%; ">FECHA: <b style="font-weight:bold !important;">{{ $modeloDiarios->fecha }}</b> </th>

					</tr>
				</thead>
			</table>

		</th>
		<th class="columna2">
			<br><br><br><br>
			<table>
				<thead>
					<th style="width: 20%;"></th>
					<th style="width: 80%;">
						<p style="border: 1px solid black; border-radius: 7px; padding: 15px;">
							RECIBO DE PAGO: <b style="font-weight:bold !important;">{{ $modeloDiarios->recibo }}</b>
						</p>
					</th>
				</thead>

			</table>
			
<div style="border: 1px solid black; border-radius: 10px;"><br>
	<p style="border-bottom: 1px solid black; margin-top: -10px;">RFC: <b style="font-weight:bold !important;">{{ $modeloDiarios->rfc }}</b></p>
	<p style="border-bottom: 1px solid black; margin-top: -10px;">CLAVE CAT: <b style="font-weight:bold !important;"><?php 

		echo $modeloDiarios->clavecat;



	 ?></b></p>
	<p style="border-bottom: 1px solid black; background-color: gray; padding: 10px;"></p>
	<p style="border-bottom: 1px solid black; margin-top: -15px;">LIQUIDACION</p>
			<table >
				
					<thead style="margin-top: -20px;"></thead>
				<tbody style="margin-top: -10px;">
				
					<tr style="">
						<td style=" width: 50% border-bottom: 1px solid black !important; border-right: 1px solid black !important;">IMPORTE:</td>
						<td style="width: 50% border-bottom: 1px solid black; text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->importe }}</b></td>
					</tr>
					<tr style="">
						<td style="width: 50%; border-right: 1px solid black !important;">REZAGOS:</td>
						<td style="width: 50%; text-align: right; "><b style="font-weight:bold !important;"> <?php echo $modeloDiarios->rezagos ?></b></td>
					</tr>
					<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">IVA:</td>
						<td style="width: 50%; text-align: right; "><b style="font-weight:bold !important;">{{ $modeloDiarios->iva }}</b></td>
					</tr>
					<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">RECARGOS:</td>
						<td style="width: 50%; text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->recargos }}</b></td>
					</tr>
					<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">EJECUCION:</td>
						<td style="width: 50%;text-align: right; text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->gastosejec }}</b></td>
					</tr>
					<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">MULTA:</td>
						<td style="width: 50%; text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->multas }}</b></td>
					</tr>
						<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">DESCUENTOS:</td>
						<td style="width: 50%;  text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->descuentos }}</b></td>
					</tr>
					<tr>
						<td style="width: 50%; border-right: 1px solid black !important;">TOTAL:</td>
						<td style="width: 50%; text-align: right;"><b style="font-weight:bold !important;">{{ $modeloDiarios->total }}</b></td>
					</tr>
				</tbody>

			</table>

</div>
<br>
<div style="border: 1px solid black; border-radius: 7px; padding: 8px;">
	<p> <b style="font-weight:bold !important;">{{ $modeloDiarios->iduser }} </b></p>
</div>
<div>CERTIFICACION Y FIRMA DEL CAJERO</div>
		</th>
		
	</tr>

</thead>
<tbody>
	
</tbody>

</table>


 </body>


</html>