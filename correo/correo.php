<?php
	function mailContent($header,$contenido,$footer){
		// NO MODIFICAR
		$html = '
			<!DOCTYPE HTML>
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<title></title>
					<link rel="stylesheet" type="text/css" href="http://pistondeoro.com/_includes/_css/email.css" media="screen" />
				</head>
				<body>
					<table id="base">
						<tbody>
							<tr>
								<td>
									<table class="container">
										<tbody>
											'.$header.'
											'.$contenido.'
											'.$footer.'
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</body>
			</html>
		';
		// NO MODIFICAR [ end ]

		return $html;
	}
?>
