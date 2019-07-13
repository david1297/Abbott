$( "#ExportarExcel" ).click(function( event ) {
	var FechaIni = $("#FechaIni").val();
	var FechaFin = $("#FechaFin").val();
	
	$.ajax({
		url:'Excel.php?FechaIni='+FechaIni+'&FechaFin='+FechaFin,
		beforeSend: function(objeto){
			
		},
		success:function(dataR){
			var string ='{"user_id": "1", "auth_id": "1"}';
			var data=JSON.parse('['+dataR+']');
			var NombreXLS='';
			
			
				NombreXLS="Encuestas";
		
			if(typeof XLSX == 'undefined') XLSX = require('xlsx');
			var ws = XLSX.utils.json_to_sheet(data);
			var wb = XLSX.utils.book_new();
			XLSX.utils.book_append_sheet(wb, ws, NombreXLS);
			var hoy = new Date();
			y = hoy.getFullYear();
			m = hoy.getMonth() + 1;
			d = hoy.getDate();
			XLSX.writeFile(wb, NombreXLS+" "+d + "-" + m + "-" + y+".xlsx");
		}
	})
})