<?php	
    $style = "
		<style type='text/css'>
			
			body { background-color: #616161; }
			
			p { font-size: .9em; }
			
			#base { }
			
			.rows { 
					border-right: 1px solid #323232; 
					border-left: 1px solid #323232;
					padding: 20px 23px 5px 30px; 
				}
				table.one { width: 100%; }
				table.duo { width: 40%; }
				table.tri { width: 30%; }
				table.tri_2 { width: 60%; }
				table.cuart { width: 20%; }
				
					table.dou img { width: 100%; }
					table.tri img { width: 100%; }
					table.cuart img { width: 100%; }
			
			
			.header {}
			
			.footer {
					padding: 10px 20px 10px 30px;
					background-color: #ffffff;
					border: #323232 solid thin;
					border-top: none; 
					text-align: center;
					font-size: 1em;    
				}
			
			@media only screen and (max-width: 980px) {
					table.duo{ width:100% !important; }
					table.tri_2{ width:100% !important; }
				}
				
			@media only screen and (max-width: 660px) {
				table.container { width:480px !important;}
				td#logo img { display:none;}
				td#logo { height:80px; }
				table.duo{ width:100% !important; }
				table.tri{ width:100% !important; }
				table.tri_2{ width:100% !important; }
				table.cuart{ width:100% !important; }
				td { width:100% !important; }
				.descripcion { text-align:justify; font-size:1.1em; }
				.td_photo { display:none; }
				#mensaje { margin:20px !important; }
				.footer p { font-size:.7em !important; }
				#circle { display:block; margin:0px auto 0px auto; }
			}
			
			@media only screen and (max-width: 510px) {
				table.container { width:100% !important; }	
				table.container td { border:none !important; }
				td#logo { height:70px; }
			}
		
		</style>
	";
?>