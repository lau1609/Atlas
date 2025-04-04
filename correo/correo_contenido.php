<?php 
	
	$mensaje_usuario = '
	 <tr>
			<td valign="top" class="rows" id="contenido">
				<table class="one">
					<tbody>
						<tr>
							<td id="mensaje_user" style="text-align:left;">
								<img src="http://pistondeoro.com/_images/SVG/logotipocorreo.svg" alt="">
								<h2>&iexcl;Muchas gracias por<br> contactarnos!</h2>
								<span style="text-align:left;">Nos comunicaremos lo m&aacute;s </br>pronto posible</span></br></br></br></br>
								<a href="http://pistondeoro.com/inicio">REGRESAR AL SITIO WEB</a>
							</td>
											
						</tr>
					</tbody>
				</table>
				
	';
	
	$mensaje_admin = '
		 <tr>
			<td valign="top" class="rows" id="contenido">
				<table class="one" align="left">
					<table class="duo" align="left">
					<tbody>
						<tr>
							<td id="mensaje_user"> 
								<h1>&iexcl;El siguiente usuario ha hecho contacto desde el sitio!</h2> 
							</td>
						</tr>
					</tbody>
				</table>
				<table class="tri_2" align="left">
					<tbody>
						<tr>
							<td id="mensaje_user_text"> 
								<p><strong>Nombre : </strong>'.$nombre.'</p><br>
								<p><strong>Telefono : </strong>'.$telefono.'</p><br>
								<p><strong>Empresa : </strong>'.$empresa.'</p><br>
								<p><strong>Mensaje : </strong>'.$mensaje.'</p><br>
								<p>
									<strong>Responder : </strong><a href="mailto:'.$mail.'">'.$mail.'</a>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		
	';
	
?>
