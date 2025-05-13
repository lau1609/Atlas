// JavaScript Document

/* PREPARATIVOS */


var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	// Touch or Click Definimos si se usará click o Touch según disponibilidad // touchstart
	var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	/* EJEMPLO

	$(document).on(clickHandler, "SELECTOR", function(){
		if(!touchmoved){

			CODIGO


		}
	}).on('touchmove', function(e){
		touchmoved = true;
	}).on('touchstart', function(){
		touchmoved = false;
	});*/

	// Long Tab or Click Derecho
	var tapHandler = ('ontouchstart' in document.documentElement ? "taphold" : "contextmenu");
	var time_session; // <-- Monitor de sessión una ves iniciada esta.
    let html = '';
    let htmlAtrac = '<div class="contAtrac">'+
            '<div class="contButAtrac"><button id="addAtrac" class="colorYellow">Nuevo</button></div>'+
            '<div class="conttabAtrac">'+
                '<table id="tabIndTuris">'+
                    '<caption>Atractivos Turisticos</caption>'+
                    '<tr class="title">'+
                        '<th>Nombre</th>'+
                        '<th>Descripcion</th>'+
                        '<th>Tempertura</th>'+
                        '<th>Cultura</th>'+
                        '<th>Naturaleza</th>'+
                       ' <th>Longitud</th>'+
                        '<th>Latitud</th>'+
                        '<th>Estatus</th>'+
                    '</tr>'+
                  
                '</table>'+
            '</div>'+
        '</div>'+
    '</div>';

    let htmlMunis = '<div class="contMuni">'+
           // '<div class="contButAtrac"><button id="addAtrac" class="colorYellow">Nuevo</button></div>'+
            '<div class="conttabMuni">'+
                '<table id="tabMunis">'+
                    '<caption>Municipios</caption>'+
                    '<tr class="title">'+
                        '<th>Nombre</th>'+
                        '<th>Región</th>'+
                        '<th>Descripcion</th>'+
                        '<th>Descripcion corta</th>'+
                        '<th>Tempertura</th>'+
                        '<th>Cultura</th>'+
                        '<th>Naturaleza</th>'+
                    '</tr>'+
                '</table>'+
            '</div>'+
        '</div>'+
    '</div>';


    let htmlImages = '<div class="contImage">'+
            '<div class="contButAtrac"><button id="addImage" class="colorYellow">Nuevo</button></div>'+
            '<div class="conttabImage">'+
                '<table id="tabImages">'+
                    '<caption>Imagenes</caption>'+
                    '<tr class="title">'+
                        '<th>Tipo de imagen</th>'+
                        '<th>Url</th>'+
                        '<th>Imagen</th>'+
                    '</tr>'+
                '</table>'+
            '</div>'+
        '</div>'+
    '</div>';


    let htmlTypAtrac = '<div class="contTypAtrac">'+
            '<div class="contButTypAtrac"><button id="addTypAtrac" class="colorYellow">Nuevo</button></div>'+
            '<div class="contTypAtrac">'+
                '<table id="tabTypAtrac">'+
                    '<caption>Tipos de atractivos</caption>'+
                    '<tr class="title">'+
                        '<th>Nombre</th>'+
                        '<th>Status</th>'+
                    '</tr>'+
                '</table>'+
            '</div>'+
        '</div>'+
    '</div>';

    let pop1 = '<div class="popAtractivos">'+
            '<div class="contAtractivo">'+
                '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                '<h3>Agregar atractivo turistico</h3>'+
                '<form id="formAddAtrac">'+
                    '<input type="text" class="validate" name="name" placeholder="Nombre (50 caracteres)" id="">'+
                    '<textarea name="desc" class="validate" placeholder="Descripción (900 caracteres)" id=""></textarea>'+
                    '<textarea name="descShort" class="validate" placeholder="Descripción Corta (250 caracteres)" id=""></textarea>'+
                    '<input type="text" class="validate" name="lat" placeholder="Latitud" id="">'+
                    '<input type="text" class="validate" name="long" placeholder="Longitud" id="">'+
                    // '<input type="text" class="validate" name="temp" placeholder="Temperatura" id="">'+
                    // '<input type="text" class="validate" name="cult" placeholder="Cultura" id="">'+
                    // '<input type="text" class="validate" name="natu" placeholder="Naturaleza" id="">'+
                    '<input type="text" class="validate" name="dir" placeholder="Dirección (150 caracteres)">'+
                    '<input type="text" class="validate" name="hor" placeholder="Horarios (80 caracteres)" id="">'+
                    '<input type="email" class="" name="mail" placeholder="Email (100 caracteres)" id="">'+
                    '<input type="tel" maxlength="10" class="" name="tel" placeholder="Telefono de contacto (10 caracteres)" id="">'+
                   ' <input type="number" class="validate" name="price" placeholder="Precio de entrada" id="">'+
                    '<input type="text" name="face" placeholder="URL de Facebook (150 caracteres)" id="">'+
                    '<input type="text" name="inst" placeholder="URL de Instagram (200 caracteres)" id="">'+
                    '<select name="typAtrac" class="validate">'+
                       ' <option value="" hidden>Tipo de atractivo</option>'+
                       ' <option value="" hidden>Atractivo 1</option>'+
                    '</select>'+
                    ' <select name="muni" class="validate">'+
                        '<option value="" hidden>Municipio</option>'+
                    '</select>'+
                   ' <select name="region" class="validate">'+
                        '<option value="" hidden>Regiones</option>'+
                    '</select>'+
                    '<div class="contFieldset">'+
                        '<fieldset>'+
                            '<legend>Imagen de portada</legend>'+
                            
                            '<label class="__lk-fileInput">'+
                                '<span class="spanPort" data-default="Choose file">Archivo</span>'+
                                '<input name="portada" id="portada" accept="image/png, image/jpeg, image/jpg" type="file">'+
                            '</label>'+
                        '</fieldset>'+
                        '<fieldset>' +
                            '<legend>Imágenes de galería <span style="font-size:.7rem">(máximo 3 imágenes)<span></legend>' +
                            '<label class="__lk-fileInput">'+
                                '<span data-default="Elige archivos">Archivos</span>'+
                                '<input id="file-input" name="images[]" type="file" accept="image/png, image/jpeg, image/jpg" multiple>'+
                            '</label>'+
                            '<ul id="file-list"></ul> '+
                        '</fieldset>'+
                    '</div>'+
                    '<div class="contButSub"><input type="submit" class="colorYellow" value="Enviar"></div>'+
                '</form>'+
            '</div>'+
        '</div>';

        let pop2 = '<div class="popAtractivos">'+
                        '<div class="contAtractivo" style="justify-content: flex-start;">'+
                            '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                            '<form id="formAddImg">'+
                                '<select name="typImage" class="typImage" class="validate">'+
                                    ' <option value="" hidden>Tipo de imagen</option>'+
                                '</select>'+
                                '<div class="urlImgAdd"></div>'+
                                '<fieldset>'+
                                    '<legend>Imagen</legend>'+
                                    '<label class="__lk-fileInput">'+
                                        '<span class="spanPort" data-default="Choose file">Archivo</span>'+
                                        '<input class="validate" name="imagen" id="portada" accept="image/png, image/jpeg, image/jpg" type="file">'+
                                    '</label>'+
                                '</fieldset>'+
                                '<div class="contButSub"><input type="submit" class="colorYellow" value="Enviar"></div>'+
                            '</form>'+
                        '</div>'+
                    '</div>';

        let pop3 = '<div class="popAtractivos">'+
                    '<div class="contAtractivo" style="justify-content: flex-start;">'+
                        '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                        '<form id="formAddTypAtrac">'+
                            '<input name="nameAtrac" type="text" placeholder="Nombre del atractivo" class="validate">'+
                            '</fieldset>'+
                            '<div class="contButSub"><input type="submit" class="colorYellow" value="Enviar"></div>'+
                        '</form>'+
                    '</div>'+
                '</div>';

        let popValidation = '<div class="popValidation">'+
            '<div class="aliPopVali">'+
                '<div class="contPopDel">'+
                '<div class="messPop"><p></p></div>'+
                '<div class="contButDel"><img src="_images/noAcept.png" alt="cerrar" width="30px" id="closePopDel"><img class="butAccet" src="_images/accept.png" alt="aceptar" width="30px"></div>'+
                '</div>'+
        '</div>';

        let htmlPDF = '<div class="contPdf" style="">'+
        '<div class="aliPDF" style="">'+
            '<button id="prevPage">⬅ Anterior</button>'+
            '<span>Página: <span id="page_num">1</span> / <span id="page_count">--</span></span>'+
            '<button id="nextPage">Siguiente ➡</button>'+
            '&nbsp; | &nbsp;'+
            '<button id="zoomOut">- Zoom</button>'+
            '<button id="zoomIn">+ Zoom</button>'+
        '</div>'+
        '<div id="pdf-container">'+
            '<canvas id="pdf-viewer"></canvas>'+
        '</div>'+
    '</div>';

//         let incidencias = Array();
// var opcHtml = [html, html2, html3, html4, html5];
// console.log(opcHtml);

	if(!isMobile)
		{
		   clickHandler = 'click';
		   tapHandler = 'contextmenu';
		}


$(document).ready(function() {
	session_check();

    $(document).on('change', '.typImage', function(e) {
        console.log('el change');
        let id = $(this).val();
        console.log(id);

        switch (parseInt(id)) {
            case 6:
                $('.urlImgAdd').html('<input type="text" style="width: 100%; class="validate" name="urlRed" placeholder="URL de redirección">');
                $('.urlImgAdd').css('width', '45%');
                break;
        
            default:
                $('.urlImgAdd').html('');
                $('.urlImgAdd').css('width', '0');
                break;
        }
    });
	$(document).on('change', '#abrir-cerrar', function(e) {
        $('#contMenu').toggleClass('none');
        $('#contMenu').toggleClass('flex');
        $('.header').toggleClass('width-30');
    });

	$(document).on('submit', '#iniSesion', function(e) {
		e.preventDefault();
		let user = document.getElementById('user').value;
		let contra = document.getElementById('contra').value;
		// console.log(user, contra);
		validate_phpSession(user, contra);
	});

	$(document).on(clickHandler, '#closeSesion', function(e) {
		// console.log('cerrar sesion');
		close_phpSession();
	});

    $(document).on(clickHandler, '#closeWin', function(e) {
        let div = document.getElementById('aliIni');
        $('.contBanner').addClass('none');
        div.style.overflow = 'auto';
        document.querySelectorAll('#contDelete').forEach(element => element.remove());
    });




    $(document).on(clickHandler, '#closePop', function(e) {
        $('.contTabVehi').css('height', '100%');
        $('.contTabVehi').css('overflow', 'auto');
        const element = document.getElementById("popPrestamo");
        element.remove();
    });




    $(document).on(clickHandler, '.opcMenu', function(e) {
        let opc = $(this).data('opc');
        // console.log(opc);
        switch (parseInt(opc)) {
            case 1:
               
                break;
            case 2:
                $('#aliIni').html(htmlAtrac);
               atractivos();
                break;
            case 3:
                $('#aliIni').html(htmlMunis);
                municipios();
                break;
            case 4:
                $('#aliIni').html(htmlImages);
                images();
                break;

            case 5:
                $('#aliIni').html(htmlTypAtrac);
                typAtrac();
                break;
            case 6:
                $('#aliIni').html(htmlPDF);
                console.log('Inserta el html');
                manual();
                break;

            default:
                break;
        }
    });

    $(document).on(clickHandler, '#addAtrac', function(e) {
        $('#aliIni').append(pop1);
        console.log(arrayPrin);

        $.each(arrayPrin['typAtrac'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            optionElement.attr('class', 'black');
            $('select[name="typAtrac"]').append(optionElement);
        });

        $.each(arrayPrin['regs'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            optionElement.attr('class', 'black');
            $('select[name="region"]').append(optionElement);
        });
        $.each(arrayPrin['munis'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            optionElement.attr('class', 'black');
            $('select[name="muni"]').append(optionElement);
        });

    });


    $(document).on(clickHandler, '#addImage', function(e) {
        $('#aliIni').append(pop2);

        
        $.ajax({
            url: '_includes/_php/querys.php',
            type: 'POST',
            dataType: "json",
            data: {typImage:true},
            success: function(data) {
                console.log(data);
                if (data.length > 0) {
                    $.each(data, function(index, opcion) {
                        var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
                        $('select[name="typImage"]').append(optionElement);
                    });

                } else {
                        alert('Error en el servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });

    });

    $(document).on(clickHandler, '#addTypAtrac', function(e) {
        $('#aliIni').append(pop3);
    });
    
    $(document).on(clickHandler, '#close', function(e) {
        $('.popAtractivos').remove();
    });

    $(document).on(clickHandler, '#close2', function(e) {
        let cl = $(this).data('cl');
        $(`.opcMenu[data-opc="`+cl+`"]`).click();
    });

     
    $(document).on(clickHandler, '.svgStat', function(e) {
        console.log('click al svg'); 
        let color;
        let valStat;
        let boton = $(this);
        console.log(boton);
        let path = $(this).find('path'); 
        $(path).css('stroke', '');
        let stat = $(this).attr('data-stat');
        let id = $(this).attr('data-id');
        if (stat == '1') {
            color = 'gray';
            valStat = 0;
            boton.attr('data-stat', "0");
        }else{
            color='rgba(154, 189, 28, 255)';
            valStat = 1;
            boton.attr('data-stat', "1");
        }
        console.log(color);
        $(path).css('stroke', color);

        $.ajax({
            url: '_includes/_php/querys.php',
            type: 'POST',
            dataType: "text",
            data: {changeStat:true, valStat, id},
            success: function(data) {
                console.log(data);
                let color;
                if (data== 'successful') {
                    console.log('se cambio el estatus');
                } else {
                        alert('Error en el servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });
        
    });



    $(document).on(clickHandler, '.svgStatAtrac', function(e) {
      //  console.log('click al svg'); 
        let color;
        let valStat;
        let boton = $(this);
      //  console.log(boton);
        let path = $(this).find('path'); 
        $(path).css('stroke', '');
        let stat = $(this).attr('data-stat');
        let id = $(this).attr('data-id');
        if (stat == '1') {
            color = 'gray';
            valStat = 0;
            boton.attr('data-stat', "0");
        }else{
            color='green';
            valStat = 1;
            boton.attr('data-stat', "1");
        }
        console.log(color, valStat, id);
        $(path).css('stroke', color);
        $.ajax({
            url: '_includes/_php/querys.php',
            type: 'POST',
            dataType: "text",
            data: {changeStatAtrac:true, valStat, id},
            success: function(data) {
                console.log(data);
                let color;
                if (data== 'successful') {
                    console.log('se cambio el estatus');
                } else {
                        alert('Error en el servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });
        
    });



    
    $(document).on(clickHandler, '#addEditGal', function(e) {
        e.preventDefault(); 
        let id = $(this).attr('data-id');
        console.log('inserta el html');
        $('.contImgGalery').html(
                        '<label class="__lk-fileInput">'+
                            '<span data-default="Elige archivos">Selecciona archivos (3 maximo)</span>'+
                            '<input id="file-input" data-id="'+id+'" name="images[]" type="file" accept="image/png, image/jpeg, image/jpg" multiple>'+
                            '<input name="idGal" type="hidden" value="'+id+'">'+
                        '</label>'+
                        '<ul id="file-list"></ul> ');
    });

    $(document).on(clickHandler, '#addEditPort', function(e) {
        e.preventDefault(); 
        let id = $(this).attr('data-id');
        console.log('inserta el html');
        $('.contImgPort').html('<label class="__lk-fileInput">'+
                            '<span class="spanPort" data-default="Choose file">Seleccina un archivo</span>'+
                            '<input name="portada" data-id="'+id+'" id="portada" accept="image/png, image/jpeg, image/jpg" type="file">'+
                            '<input name="idPort" type="hidden" value="'+id+'">'+
                        '</label>');
    });



    $(document).on(clickHandler, '#addEditImg', function(e) {
        e.preventDefault(); 
        let id = $(this).attr('data-id');
        console.log('inserta el html');
        $('.contEditImage').html('<label class="__lk-fileInput">'+
                            '<span class="spanPort" data-default="Choose file">Seleccina un archivo</span>'+
                            '<input name="imagen" data-id="'+id+'" id="portada" accept="image/png, image/jpeg, image/jpg" type="file">'+
                            //'<input name="idPort" type="hidden" value="'+id+'">'+
                        '</label>');
    });



    $(document).on(clickHandler, '.delImg', function(e) {
        let id = $(this).attr('data-id');
        $('.aliIni').append(popValidation);
        $('.messPop ').html('¿Desea borrar este registro? <br> <span>(Esta acción no puede ser reversible)</span>');
        $('.butAccet').attr("data-id", id).attr("id", "acceptDelete");
        //console.log("ID:", this.id, "Data-ID:", this.getAttribute("data-id"));
    });

    $(document).on(clickHandler, '#closePopDel', function(e) {
        let pop = $('.popValidation');
        if (pop.length) { 
            pop.remove();
        }
    });

    $(document).on(clickHandler, '#acceptDelete', function(e) {
        let id = $(this).attr('data-id');
        request = $.ajax({
            url: '_includes/_php/querys.php',
            type: 'POST',
            dataType: "text",
            data: {delImg:true, id:id},  
        });
        request.done(function (response) {
            console.log("Respuesta:", response);
            if (response == 'succesfull') {
                $(`.opcMenu[data-opc="4"]`).click();
            }     
        });
        request.fail(function (jqXHR, textStatus) {
            console.error("Error en la solicitud: " + textStatus);
        });
    });




    $(document).on(clickHandler, '.editImage', function(e) {
        console.log('editar');
        let id = $(this).attr('data-id');
        console.log(id);
        let regId;
        let galery = Array();
        for (let i = 0; i < arrayPrin.length; i++) {
            if (arrayPrin[i]['id'] === id) {
                let url;
                console.log(arrayPrin[i]['id']);
                imgId = arrayPrin[i]['urlImg'];
                if (imgId && imgId !== '') {
                    console.log('hay imagen');        
                    console.log(arrayPrin[i]['urlImg']);
                    url = '<input type="text" name="url" class="validate" value="'+arrayPrin[i]['urlImg']+'" placeholder="URL">';
                }else{
                    url = '<div style="color: gray;margin: 10px 0 25px 0;font-weight: 100;">N/A</div>';
                }
                $('.aliIni').append('<div class="popAtractivos">'+
                '<div class="aliPopEdit">'+
                    '<div class="contPopEdit">'+
                        '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                        '<h3>Editar imagen de <span>'+arrayPrin[i]['typ_name']+'</span></h3>'+
                        '<form id="formEditImage">'+
                        '<input type="hidden" name="id" value="'+arrayPrin[i]['id']+'" id="">'+
                        '<input type="hidden" name="typ" value="'+arrayPrin[i]['typ_id']+'" id="">'+
                        '<label>URL '+url+'</label>'+
                        '<div class="contEditImage">'+
                            '<div class="alignEditImage"><button id="addEditImg" data-id="'+id+'">Editar Imagen</button/></div>'+
                            '<input type="hidden" name="urlImgExi" value="'+arrayPrin[i]['url']+'" id="">'+
                            '<img src="'+arrayPrin[i]['url']+'" alt="" />'+
                        '</div>'+
                        '<div class="contButSub"><input type="submit" class="colorYellow sendEditImage" value="Guardar"></div>'+
                    '</form>'+
                    
                    //'</div>'+
                '</div>'+
                '</div>');
            }
        }
       
    });


    $(document).on(clickHandler, '.editTypAtract', function(e) {
        console.log('editar');
        let id = $(this).attr('data-id');
        console.log(id);
        console.log(arrayPrin);
        for (let i = 0; i < arrayPrin.length; i++) {
            if (arrayPrin[i]['id'] === id) {
                let url;
                console.log(arrayPrin[i]['id']);
                
                $('.aliIni').append('<div class="popAtractivos">'+
                '<div class="aliPopEdit">'+
                    '<div class="contPopEdit">'+
                        '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                        '<h3>Editar tipo de atracativo <span>'+arrayPrin[i]['name']+'</span></h3>'+
                        '<form id="formEditTypAtrac">'+
                            '<input type="hidden" name="id" value="'+arrayPrin[i]['id']+'" id="">'+
                            '<input type="text" name="name" value="'+arrayPrin[i]['name']+'" id="">'+
                            '<div class="contButSub"><input type="submit" class="colorYellow sendEditImage" value="Guardar"></div>'+
                        '</form>'+
                    
                    //'</div>'+
                '</div>'+
                '</div>');
            }
        }
       
    });


    $(document).on(clickHandler, '.editMuni', function(e) {
        console.log('editar');
        let id = $(this).attr('data-id');
        console.log(id);
        let regId;
        let galery = Array();
        for (let i = 0; i < arrayPrin['munis'].length; i++) {
            if (arrayPrin['munis'][i]['id'] === id) {
                console.log(arrayPrin['munis'][i]['id']);
                regId = arrayPrin['munis'][i]['reg_id'];
                $('.aliIni').append('<div class="popAtractivos">'+
                '<div class="aliPopEdit">'+
                    '<div class="contPopEdit">'+
                        '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                        '<h3>Información de <span>'+arrayPrin['munis'][i]['name']+'</span></h3>'+
                        '<form id="formEditMuni">'+
                        '<label>Nombre<input type="text" name="name" class="validate" value="'+arrayPrin['munis'][i]['name']+'" placeholder="Nombre" id=""></label>'+
                        '<input type="hidden" name="id" value="'+arrayPrin['munis'][i]['id']+'" id="">'+
                        '<label>Descripción<textarea style="height: 90px;" class="validate" name="desc" placeholder="Descripción"  id="">'+arrayPrin['munis'][i]['desc']+'</textarea></label>'+
                        '<label>Descripción corta<textarea style="height: 90px;" class="validate" name="descShort" placeholder="Descripción corta"  id="">'+arrayPrin['munis'][i]['descShort']+'</textarea></label>'+
                        // '<label>Temperatura<input type="text" name="temp" placeholder="Temperatura" value="'+arrayPrin['munis'][i]['temp']+'" id=""></label>'+
                        // '<label>Cultura<input type="text" name="cult" placeholder="Cultura" value="'+arrayPrin['munis'][i]['cult']+'" id=""></label>'+
                        // '<label>Naturaleza<input type="text" name="natu" placeholder="Naturaleza" value="'+arrayPrin['munis'][i]['nat']+'" id=""></label>'+
                        '<label>Temperatura<input type="text" name="temp" class="validate" value="'+arrayPrin['munis'][i]['temp']+'" placeholder="Temperatura"></label>'+
                        '<label>Cultura<input type="text" name="cult" class="validate" value="'+arrayPrin['munis'][i]['cult']+'" placeholder="Cultura" id=""></label>'+
                        '<label>Naturaleza<input type="text" name="nat" class="validate" value="'+arrayPrin['munis'][i]['nat']+'" placeholder="Naturaleza" id=""></label>'+
                        '<label>Región<select class="validate" name="region">'+
                        '</select></label>'+
                       
                        '<div class="contButSub"><input type="submit" class="colorYellow sendEditMuni" value="Enviar"></div>'+
                    '</form>'+
                        
                    '</div>'+
                '</div>'+
                '</div>');
            }
        }

        $.each(arrayPrin['regiones'], function(index, opcion) {
            console.log(opcion.id, regId);
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            $('select[name="region"]').append(optionElement);
            // Si la opción cumple la condición, muévela a la primera posición
            // console.log(opcion.folio, empleado);
            if (opcion.id === regId) {
                // console.log(opcion.folio);
                $('select[name="region"] option:last').prependTo('select[name="region"]').prop('selected', true);;
            }
        });
       
    });

    $(document).on(clickHandler, '.editAtrac', function(e) {
        console.log('editar');
        let id = $(this).attr('data-id');
        console.log(id);
        let munId;
        let galery = Array();
        for (let i = 0; i < arrayPrin['atracs'].length; i++) {
            if (arrayPrin['atracs'][i]['id'] === id) {
                console.log(arrayPrin['atracs'][i]['id']);
                munId = arrayPrin['atracs'][i]['muni_id'];
                $('.aliIni').append('<div class="popAtractivos">'+
                '<div class="aliPopEdit">'+
                    '<div class="contPopEdit">'+
                        '<div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>'+
                        '<h3>Información de <span>'+arrayPrin['atracs'][i]['name']+'</span></h3>'+
                        '<form id="formEditAtrac">'+
                        '<label>Nombre<input type="text" name="name" class="validate" value="'+arrayPrin['atracs'][i]['name']+'" placeholder="Nombre" id=""></label>'+
                        '<input type="hidden" name="id" value="'+arrayPrin['atracs'][i]['id']+'" id="">'+
                        '<label>Descripción<textarea style="height: 90px;" class="validate" name="desc" placeholder="Descripción"  id="">'+arrayPrin['atracs'][i]['desc']+'</textarea></label>'+
                        '<label>Descripción corta<textarea style="height: 90px;" class="validate" name="descShort" placeholder="Descripción corta"  id="">'+arrayPrin['atracs'][i]['desc_short']+'</textarea></label>'+
                        // '<label>Temperatura<input type="text" name="temp" placeholder="Temperatura" value="'+arrayPrin['atracs'][i]['temp']+'" id=""></label>'+
                        // '<label>Cultura<input type="text" name="cult" placeholder="Cultura" value="'+arrayPrin['atracs'][i]['cult']+'" id=""></label>'+
                        // '<label>Naturaleza<input type="text" name="natu" placeholder="Naturaleza" value="'+arrayPrin['atracs'][i]['nat']+'" id=""></label>'+
                        '<label>Dirección<input type="text" name="dir" class="validate" value="'+arrayPrin['atracs'][i]['dir']+'" placeholder="Dirección"></label>'+
                        '<label>Latitud<input type="text" name="lat" class="validate" value="'+arrayPrin['atracs'][i]['lat']+'" placeholder="Dirección"></label>'+
                        '<label>Longitud<input type="text" name="long" class="validate" value="'+arrayPrin['atracs'][i]['lon']+'" placeholder="Dirección"></label>'+
                        '<label>Horario<input type="text" name="hor" class="validate" value="'+arrayPrin['atracs'][i]['hor']+'" placeholder="Horarios" id=""></label>'+
                        '<label>Email<input type="email" name="mail" class="" value="'+arrayPrin['atracs'][i]['mail']+'" placeholder="Email" id=""></label>'+
                        '<label>Telefono<input type="text" name="tel" class="" value="'+arrayPrin['atracs'][i]['tel']+'" placeholder="Telefono de contacto" id=""></label>'+
                        '<label>Precio<input type="number" name="price" class="validate" value="'+arrayPrin['atracs'][i]['precio']+'" placeholder="Precio de entrada" id=""></label>'+
                        '<label>URL de Facebook<input type="text" name="face" placeholder="URL de Facebook" value="'+arrayPrin['atracs'][i]['face']+'" id=""></label>'+
                        '<label>URL de Instagram<input type="text" name="inst" placeholder="URL de Instagram" value="'+arrayPrin['atracs'][i]['inst']+'" id=""></label>'+
                        '<label>Tipo de atractivo<select name="typAtrac">'+
                        '</select></label>'+
                        '<label>Municipio<select class="validate" name="muni">'+
                        '</select></label>'+
                    '<label>Región<select class="validate" name="region">'+
                        '</select></label>'+
                        '<div class="contPortada">'+
                            '<label>Portada</label>'+
                            '<div class="contImgPort"></div>'+
                        '</div>'+

                        '<div class="contGalery">'+
                            '<label>Galeria</label>'+
                            '<div class="contImgGalery"></div>'+
                        '</div>'+
                       
                        '<div class="contButSub"><input type="submit" class="colorYellow sendEditAtrac" value="Enviar"></div>'+
                    '</form>'+
                        
                    '</div>'+
                '</div>'+
                '</div>');

                
                let urlImg = arrayPrin['atracs'][i]['urlImg'];

                // obtiene las imagenes 
                if (urlImg && urlImg !== '') {
                    console.log(arrayPrin['atracs'][i]['urlImg']);
                    let valiText =  arrayPrin['atracs'][i]['urlImg'].indexOf(",");
                    if (valiText) {
                        galery = arrayPrin['atracs'][i]['urlImg'].split('***');
                    }else{
                        galery[0] = arrayPrin['atracs'][i]['urlImg']
                    }
                    
                }
            }

        }

        // Inserta las imagenes de galeria

        if (galery.length > 0) {
            $('.contImgGalery').append('<div class="alignEditImage"><button id="addEditGal" data-id="'+id+'">Editar</button/></div>');
            for (let i = 0; i < galery.length; i++) {
                $('.contImgGalery').append('<img src="'+galery[i]+'" alt="" />');
            }
        }else{
            $('.contImgGalery').append('<p>No hay imagenes de galeria</p> <button data-id="'+id+'" id="addEditGal">Agregar</button/');
        }


        // obtiene la portada si es que existe
        let resultado = Array();
        resultado = arrayPrin['ports'].find((port) => port.idElemento === id);
        console.log(resultado);
        if (resultado) {
            $('.contImgPort').append('<div class="alignEditImage"><button id="addEditPort" data-id="'+id+'">Editar</button/></div>'+
                '<img src="'+resultado['url']+'" alt="" />');
        }else{
            $('.contImgPort').append('<p>No hay portada</p> <button id="addEditPort" data-id="'+id+'">Agregar</button/>');
        }
        
        // selecciona el tipo de atractivo, lo inserta junto con los demas
        $.each(arrayPrin['typAtrac'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            $('select[name="typAtrac"]').append(optionElement);
            // Si la opción cumple la condición, muévela a la primera posición
            // console.log(opcion.folio, empleado);
            if (opcion.id === id) {
                // console.log(opcion.folio);
                $('select[name="typAtrac"] option:last').prependTo('select[name="typAtrac"]').prop('selected', true);;
            }
        });

        $.each(arrayPrin['munis'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            $('select[name="muni"]').append(optionElement);
            // Si la opción cumple la condición, muévela a la primera posición
            // console.log(opcion.folio, empleado);
            if (opcion.id === munId) {
                // console.log(opcion.folio);
                $('select[name="muni"] option:last').prependTo('select[name="muni"]').prop('selected', true);;
            }
        });
 
        // selecciona la region, lo inserta junto con los demas
        $.each(arrayPrin['regs'], function(index, opcion) {
            var optionElement = $('<option></option>').val(opcion.id).text(opcion.name);
            $('select[name="region"]').append(optionElement);
            // Si la opción cumple la condición, muévela a la primera posición
            // console.log(opcion.folio, empleado);
            if (opcion.id === id) {
                // console.log(opcion.folio);
                $('select[name="region"] option:last').prependTo('select[name="region"]').prop('selected', true);;
            }
        });
        // $('select[name="typAtrac"]').append('');
    });

    
    
    // función para actualizar el input con los archivos restantes
    function updateFileInput(files) {
        let dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        document.getElementById('file-input').files = dataTransfer.files;
        
        // Volver a renderizar la lista de archivos
        let fileList = document.getElementById('file-list');
        fileList.innerHTML = "";
        files.forEach((file, index) => {
            let li = document.createElement('li');
            li.className = "file-item";
            li.innerHTML = `
                <span>${file.name} (${(file.size / 1048576).toFixed(2)} MB)</span>
                <button class="remove-file" data-index="${index}">❌</button>
            `;
            fileList.appendChild(li);
        });
    
        // Volver a agregar los eventos de eliminación
        document.querySelectorAll('.remove-file').forEach(button => {
            button.addEventListener('click', function () {
                let indexToRemove = this.getAttribute('data-index');
                files.splice(indexToRemove, 1);
                updateFileInput(files);
            });
        });
    }



    // $(function(){  
        // $('#portada').change(function(){
        $(document).on('change', '#portada', function(event) {
            console.log('se actualiza');
          var label = $(this).parent().find('.spanPort'); 
          if(typeof(this.files) !='undefined'){ // fucking IE      
            if(this.files.length == 0 ){
                console.log('hay archivo');
              label.removeClass('withFile').text(label.data('default'));
            }else{
                console.log(this.files[0].size);
                if (this.files[0].size > 1000000) {
                    console.log('hay archivo');
                    alert('Las imagenes deben pesar menos de 1MB');
                    return;
                }else{
                    var file = this.files[0]; 
                    var name = file.name;
                    var size = (file.size / 1048576).toFixed(3); //size in mb 
                    label.addClass('withFile').text(name + ' (' + size + 'mb)');
                }
              
            }   
          }else{
            var name = this.value.split("\\");
                label.addClass('withFile').text(name[name.length-1]);
          }
          return false;
        }); 
        
        


    // });
    
// $('input#file-input').on('change', function (event) {
    $(document).on('change', '#file-input', function(event) {
    console.log('hk');
    let files = Array.from(event.target.files); 
    let fileList = $('#file-list');
    if (files.length > 3) {
        alert("Solo puedes subir un máximo de 3 imágenes.");
        $(this).val(""); 
        fileList.empty(); 
        return;
    }

    
    fileList.empty();
    files.forEach((file, index) => {console.log('el for');
        if (file.size > 1000000) {
            alert('Las imagenes no deben pesar mas de 1MB');
            return;
        }else{ console.log('el Else');
            let li = $(`
                <li class="file-item">
                    <span>${file.name} (${(file.size / 1048576).toFixed(2)} MB)</span>
                    <button class="remove-file" data-index="${index}">❌</button>
                </li>
            `);
            fileList.append(li);
        }
    });
    $('.remove-file').on('click', function () {
        let indexToRemove = $(this).data('index');
        files.splice(indexToRemove, 1);
        updateFileInput(files);
    });
});



$(document).on('submit','#formAddImg',function(e){
    e.preventDefault();
        console.log("Enviando");
        let vali = validarDatos() ;
        if (vali === 0 ) {
            console.log('si entro');
            var request;
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var formData = new FormData(this);
            let imagen = document.querySelector('input[name="imagen"]').files[0];
            if (imagen) {
                console.log(imagen)
                formData.append("imagen", imagen);
            }

            $inputs.prop("disabled", true);
            formData.append("addImg", true);
           // formData.append("editAddAtrac", true);
            for (var pair of formData.entries()) {
                console.log(pair);
            }
            //return;

            //popo
            request = $.ajax({
                url: '_includes/_php/querys.php',
                type: "post",
                data: formData,
                processData: false, 
                contentType: false  
            });
    
            request.done(function (response) {
                console.log("Respuesta:", response);
                if (response == 'succesfull') {
                    $('.contAtractivo').html('<div class="contImgClose" ><img id="close2" data-cl="4" src="_images/borrar.png" alt=""></div>'+
                        '<div class="contMessSave"><p>Se guardo correctamente</p></div>'
                    );
                } else{
                    $('.contAtractivo').html('<div class="contImgClose" ><img id="close2" data-cl="4" src="_images/borrar.png" alt=""></div>'+
                        '<div class="contMessSave"><p>ERROR EN LA CARAGA. Intente mas tarde</p></div>'
                    );
                }    
            });
    
            request.fail(function (jqXHR, textStatus) {
                console.error("Error en la solicitud: " + textStatus);
            });
    
            request.always(function () {
                $inputs.prop("disabled", false);
            });
        }
});




$(document).on('submit','#formAddTypAtrac',function(e){
    e.preventDefault();
        console.log("Enviando");
        let vali = validarDatos() ;
        if (vali === 0 ) {
            console.log('si entro');
            let name = document.querySelector('input[name="nameAtrac"]').value;
            var request;
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            $inputs.prop("disabled", true);
           // formData.append("editAddAtrac", true);
            // for (var pair of formData.entries()) {
            //     console.log(pair);
            // }
            request = $.ajax({
                url: '_includes/_php/querys.php',
                type: "post",
                dataType: "text",
                data: {addAtrac:true, name},
            });
    
            request.done(function (response) {
                console.log("Respuesta:", response);
                if (response == 'succesfull') {
                    $('.contAtractivo').html('<div class="contImgClose" ><img id="close2" data-cl="5" src="_images/borrar.png" alt=""></div>'+
                        '<div class="contMessSave"><p>Se guardo correctamente</p></div>'
                    );
                } else{
                    $('.contAtractivo').html('<div class="contImgClose" ><img id="close2" data-cl="5" src="_images/borrar.png" alt=""></div>'+
                        '<div class="contMessSave"><p>ERROR EN LA CARAGA. Intente mas tarde</p></div>'
                    );
                }    
            });

            request.fail(function (jqXHR, textStatus) {
                console.error("Error en la solicitud: " + textStatus);
            });
    
            request.always(function () {
                $inputs.prop("disabled", false);
            });
        }
});




$(document).on('submit','#formAddAtrac',function(e){
    e.preventDefault();
        console.log("Enviando");
        let vali = validarDatos() ;
        if (vali === 0 ) {
            console.log('si entro');
            var request;
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var formData = new FormData(this);
            let imagen = document.querySelector('input[name="portada"]').files[0];
            if (imagen) {
                console.log(imagen)
                formData.append("imagen", imagen);
            }
            let imagenes = document.querySelector('input[name="images[]"]').files;
            for (let i = 0; i < imagenes.length; i++) {
                console.log(imagenes[i]);
                formData.append("imagenes[]", imagenes[i]);
            }

            $inputs.prop("disabled", true);
            formData.append("validateAddAtrac", true);
           // formData.append("editAddAtrac", true);
            for (var pair of formData.entries()) {
                console.log(pair);
            }
            //return;
            request = $.ajax({
                url: '_includes/_php/querys.php',
                type: "post",
                data: formData,
                processData: false, 
                contentType: false  
            });
    
            request.done(function (response) {
                console.log("Respuesta:", response);
                if (response == 'succesfull') {
                    $('.contAtractivo').html('<div class="contImgClose"><img id="close2" data-cl="2" src="_images/borrar.png" alt=""></div>'+
                        '<div class="contMessSave"><p>Se guardo correctamente</p></div>'
                    );
                }     
            });
    
            request.fail(function (jqXHR, textStatus) {
                console.error("Error en la solicitud: " + textStatus);
            });
    
            request.always(function () {
                $inputs.prop("disabled", false);
            });
        }
});

$(document).on('submit','#formEditMuni',function(e){
    e.preventDefault();
    //"use strict";
    console.log("Enviando");
    let vali = validarDatos() ;
    console.log('antes del if validate');
    console.log(vali);
    if (vali === 0 ) {
        console.log('si entro');
        var request;
        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var formData = new FormData(this);
        var serializedData = $form.serialize();

        $inputs.prop("disabled", true);
        formData.append("validateAddMuni", true);
        //formData.append("editAddAtrac", true);
        for (var pair of formData.entries()) {
            console.log(pair);
        }
        //return;
        request = $.ajax({
            url: '_includes/_php/querys.php',
            type: "post",
            data: formData,
            processData: false, 
            contentType: false  
        });

        request.done(function (response) {
            console.log("Respuesta:", response);
            if (response == 'succesfull') {
                $(`.opcMenu[data-opc="3"]`).click();
            }
            //alert("Envío exitoso");
        });

        request.fail(function (jqXHR, textStatus) {
            console.error("Error en la solicitud: " + textStatus);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });

    }else{
        // No enviar el formulario
        return false; 
    }

});


$(document).on('submit','#formEditTypAtrac',function(e){
    e.preventDefault(); 
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    $inputs.prop("disabled", true);
    let name = document.querySelector('input[name="name"]').value;
    let id = document.querySelector('input[name="id"]').value;
    request = $.ajax({
        url: '_includes/_php/querys.php',
        type: "post",
        dataType: "text",
        data:{name, edtTypAtrac:true, id} , 
    });
    request.done(function (response) {
        console.log("Respuesta:", response);
        if (response == 'succesfull') {
            $(`.opcMenu[data-opc="5"]`).click();
        }else{
            alert("Error en la actualización");
        }
        //alert("Envío exitoso");
    });

    request.fail(function (jqXHR, textStatus) {
        console.error("Error en la solicitud: " + textStatus);
    });

    request.always(function () {
        $inputs.prop("disabled", false);
    });
});



$(document).on('submit','#formEditImage',function(e){
    e.preventDefault();
    //"use strict";
    console.log("Enviando");
    let vali = validarDatos() ;
    console.log('antes del if validate');
    console.log(vali);
    if (vali === 0 ) {
        console.log('si entro');
        var request;
        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var formData = new FormData(this);
        var serializedData = $form.serialize();
        let imagen = document.querySelector('input[name="imagen"]');
        if (imagen) {
            imagen = imagen.files[0]
            console.log(imagen)
            formData.append("imagen", imagen);
        }
        $inputs.prop("disabled", true);
        formData.append("editImage", true);
        //formData.append("editAddAtrac", true);
        for (var pair of formData.entries()) {
            console.log(pair);
        }
        //return;
        request = $.ajax({
            url: '_includes/_php/querys.php',
            type: "post",
            data: formData,
            processData: false, 
            contentType: false  
        });

        request.done(function (response) {
            console.log("Respuesta:", response);
            if (response == 'succesfull') {
                $(`.opcMenu[data-opc="4"]`).click();
            }else{
                alert("Error en la actualización");
            }
            //alert("Envío exitoso");
        });

        request.fail(function (jqXHR, textStatus) {
            console.error("Error en la solicitud: " + textStatus);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });

    }else{
        // No enviar el formulario
        return false; 
    }

});


    $(document).on('submit','#formEditAtrac',function(e){
        e.preventDefault();
        //"use strict";
        console.log("Enviando");
        let vali = validarDatos() ;
        console.log('antes del if validate');
        console.log(vali);
        if (vali === 0 ) {
           
            console.log('si entro');
            var request;
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var formData = new FormData(this);
            var serializedData = $form.serialize();
            let imagenP = document.querySelector('input[name="portada"]');
            if (imagenP) {
                let imagen = imagenP.files[0];
                console.log(imagen)
                formData.append("imagen", imagen);
            }
            let inputImagenes  = document.querySelector('input[name="images[]"]');
            if (inputImagenes) {
                let imagenes = inputImagenes.files; 
                for (let i = 0; i < imagenes.length; i++) {
                    console.log(imagenes[i]);
                    formData.append("imagenes[]", imagenes[i]);
                }
            }

            $inputs.prop("disabled", true);
            formData.append("validateAddAtrac", true);
            formData.append("editAddAtrac", true);
            for (var pair of formData.entries()) {
                console.log(pair);
            }
            //return;
            request = $.ajax({
                url: '_includes/_php/querys.php',
                type: "post",
                data: formData,
                processData: false, 
                contentType: false  
            });
    
            request.done(function (response) {
                console.log("Respuesta:", response);
                if (response == 'succesfull') {
                    $(`.opcMenu[data-opc="2"]`).click();
                }
                //alert("Envío exitoso");
            });
    
            request.fail(function (jqXHR, textStatus) {
                console.error("Error en la solicitud: " + textStatus);
            });
    
            request.always(function () {
                $inputs.prop("disabled", false);
            });

        }else{
            // No enviar el formulario
            return false; 
        }
    
    });

 });


// });
// -------------------------------------- FUNCIONES ------------------------------------
function updateFileInput(files) {
    let fileInput = $('#file-input');
    let dataTransfer = new DataTransfer();
    files.forEach(file => dataTransfer.items.add(file));
    fileInput[0].files = dataTransfer.files;
    fileInput.trigger('change');
}

function validarDatos() {
    let vali = 0;
    let inputs = document.querySelectorAll('.validate');
    let allValid = true;

    inputs.forEach(input => {
        let value = input.value.trim();
        let parentDiv = input;
        
        if (value === '' || value === null) {
            parentDiv.style.borderBottom = '2px solid red';
            allValid = false;
            vali++;
        } else {
            parentDiv.style.border = '';
        }
    });

    if (allValid) {
        // alert('Todos los campos están llenos. Procediendo a guardar...');
    } else {
        setTimeout(() => {
            alert('Por favor, llena todos los campos requeridos.'); 
        }, 500);
        
    }
    return vali;

}



function obtenerSaludo() {
    const ahora = new Date();
    const hora = ahora.getHours();
    let saludo;

    if (hora >= 6 && hora < 12) {
        saludo = "Buenos días";
    } else if (hora >= 12 && hora < 18) {
        saludo = "Buenas tardes";
    } else {
        saludo = "Buenas noches";
    }

    return `${saludo}`;
}

let arrayPrin = Array();

function municipios() {
    $.ajax({
        url: '_includes/_php/querys.php',
        type: 'POST',
        dataType: "json",
        data: {municipios:true},
        success: function(data) {
            console.log(data);
            arrayPrin = data;
            let color;
            if (data.length != 0) {
                for (let i = 0; i < data['munis'].length; i++) {
                    //data['munis'][i]['status'] == '1' ? color='rgba(154, 189, 28, 255)' : color='gray';
                    $('#tabMunis').append('<tr class="trInsert"> '+
                        '<td style="width:8%">'+data['munis'][i]['name']+'</td>'+
                        '<td style="width: 8%;">'+data['munis'][i]['reg_name']+'</p></div></td>'+
                        '<td style="width: 20%;"><div style="height: 100px; overflow: auto;"><p>'+data['munis'][i]['desc']+'</td>'+
                        '<td><div style="height: 100px; overflow: auto;"><p>'+data['munis'][i]['descShort']+'</p></div></td>'+
                        '<td><div style="height: 100px; overflow: auto;"><p>'+data['munis'][i]['temp']+'</p></div></td>'+
                        '<td><div style="height: 100px; overflow: auto;"><p>'+data['munis'][i]['cult']+'</p></div></td>'+
                        '<td><div style="height: 100px; overflow: auto;"><p>'+data['munis'][i]['nat']+'</p></div></td>'+
                        '<td class="pointer zoom editMuni" data-id="'+data['munis'][i]['id']+'">Editar</td>'+
                    '</tr>');
                }

            } else {
                    alert('Error en el servidor'); 
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la carga de datos:', status, error);
            alert('Error en la carga de datos');
        }
    });
}



function typAtrac() {
    $.ajax({
        url: '_includes/_php/querys.php',
        type: 'POST',
        dataType: "json",
        data: {typAtrac:true},
        success: function(data) {
            console.log(data);
            arrayPrin = data;
            let color;
            if (data.length != 0) {
                for (let i = 0; i < data.length; i++) {
                    //data['munis'][i]['status'] == '1' ? color='rgba(154, 189, 28, 255)' : color='gray';
                    let color;
                    //console.log(data[i]['urlImg']);
                    let stat = data[i]['stat'];
                    if (stat == '1') {
                        color = 'green';
                    }else{
                        color = 'gray';
                    }
                    $('#tabTypAtrac').append('<tr class="trInsert"> '+
                        '<td>'+data[i]['name']+'</td>'+
                        '<td style="width: 150px;"><svg class="svgStatAtrac pointer" data-id="'+data[i]['id']+'" data-stat="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 6.07026C18.3912 7.45349 20 10.0389 20 13C20 17.4183 16.4183 21 12 21C7.58172 21 4 17.4183 4 13C4 10.0389 5.60879 7.45349 8 6.07026M12 3V13" stroke="'+color+'" stroke-width="2" stroke-linecap="round"></path> </g></svg></td>'+
                        '<td style="width: 150px;" class="pointer zoom editTypAtract" data-id="'+data[i]['id']+'">Editar</td>'+
                    '</tr>');
                }

            } else {
                $('#tabImages').append('<tr><td COLSPAN=4>NO HAY REGISTROS</td></tr>');
                    //alert('Error en el servidor'); 
            }
        },
        error: function(xhr, status, error) {
            console.error('ERROR EN EL SERVIDOR:', status, error);
            $('#tabImages').append('<tr><td COLSPAN=4>NO HAY REGISTROS</td></tr>');
        }
    });
}



function images() {
    $.ajax({
        url: '_includes/_php/querys.php',
        type: 'POST',
        dataType: "json",
        data: {images:true},
        success: function(data) {
            console.log(data);
            arrayPrin = data;
            let color;
            if (data.length != 0) {
                for (let i = 0; i < data.length; i++) {
                    //data['munis'][i]['status'] == '1' ? color='rgba(154, 189, 28, 255)' : color='gray';
                    let url = '';
                    let button;
                    //console.log(data[i]['urlImg']);
                    let img = data[i]['urlImg'];
                    if (img && img !== '') {
                        url = data[i]['urlImg'];
                    }else{
                        url = 'N/A';
                    }
                    $('#tabImages').append('<tr class="trInsert"> '+
                        '<td style="">'+data[i]['typ_name']+'</td>'+
                        '<td style="">'+url+'</td>'+
                        '<td style="width: 20%;"><img style="width: 100%;" src="'+data[i]['url']+'" alt="img"></td>'+
                        '<td style="width: 55px;"><svg class="delImg" data-id="'+data[i]['id']+'" style="width:40px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z" fill="#1C274C"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12404C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001ZM10.2463 12.1886C10.2051 11.7548 9.83753 11.4382 9.42537 11.4816C9.01321 11.525 8.71251 11.9119 8.75372 12.3457L9.25372 17.6089C9.29494 18.0427 9.66247 18.3593 10.0746 18.3159C10.4868 18.2725 10.7875 17.8856 10.7463 17.4518L10.2463 12.1886ZM14.5746 11.4816C14.9868 11.525 15.2875 11.9119 15.2463 12.3457L14.7463 17.6089C14.7051 18.0427 14.3375 18.3593 13.9254 18.3159C13.5132 18.2725 13.2125 17.8856 13.2537 17.4518L13.7537 12.1886C13.7949 11.7548 14.1625 11.4382 14.5746 11.4816Z" fill="rgba(218,13,21)"></path> </g></svg></td>'+
                        '<td style="width: 60px;" class="pointer zoom editImage" data-id="'+data[i]['id']+'">Editar</td>'+
                    '</tr>');
                }

            } else {
                $('#tabImages').append('<tr><td COLSPAN=4>NO HAY REGISTROS</td></tr>');
                    //alert('Error en el servidor'); 
            }
        },
        error: function(xhr, status, error) {
            console.error('ERROR EN EL SERVIDOR:', status, error);
            $('#tabImages').append('<tr><td COLSPAN=4>NO HAY REGISTROS</td></tr>');
        }
    });
}


function manual() {
    console.log(document.location.origin);
    const url = document.location.origin+'/atlas/administrador/_pdf/manual.pdf';

    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    let pdfDoc = null,
        pageNum = 1,
        scale = 1.5,
        canvas = document.getElementById('pdf-viewer'),
        ctx = canvas.getContext('2d');

    function renderPage(num) {
        pdfDoc.getPage(num).then(function(page) {
        let viewport = page.getViewport({ scale: scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        let renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        page.render(renderContext);

        document.getElementById('page_num').textContent = num;
        });
    }

    function queueRenderPage(num) {
        if (num >= 1 && num <= pdfDoc.numPages) {
        pageNum = num;
        renderPage(pageNum);
        }
    }

    function zoom(factor) {
        scale += factor;
        if (scale < 0.5) scale = 0.5;
        if (scale > 4) scale = 4;
        renderPage(pageNum);
    }

    // Carga el documento
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;
        renderPage(pageNum);
    });

    // Botones
    document.getElementById('prevPage').addEventListener('click', function() {
        if (pageNum <= 1) return;
        queueRenderPage(pageNum - 1);
    });

    document.getElementById('nextPage').addEventListener('click', function() {
        if (pageNum >= pdfDoc.numPages) return;
        queueRenderPage(pageNum + 1);
    });

    document.getElementById('zoomIn').addEventListener('click', function() {
        zoom(0.25);
    });

    document.getElementById('zoomOut').addEventListener('click', function() {
        zoom(-0.25);
    });
}


function atractivos() {
    $.ajax({
        url: '_includes/_php/querys.php',
        type: 'POST',
        dataType: "json",
        data: {atractivos:true},
        success: function(data) {
            console.log(data);
            arrayPrin = data;
            let color;
            if (data.length != 0) {
                
                for (let i = 0; i < data['atracs'].length; i++) {
                    data['atracs'][i]['status'] == '1' ? color='rgba(154, 189, 28, 255)' : color='gray';
                    $('#tabIndTuris').append('<tr class="trInsert"> '+
                        '<td style="width:10%">'+data['atracs'][i]['name']+'</td>'+
                        '<td style="width: 30%;"><div style="height: 100px; overflow: auto;"><p>'+data['atracs'][i]['desc']+'</p></div></td>'+
                        '<td>'+data['atracs'][i]['temp']+'</td>'+
                        '<td>'+data['atracs'][i]['cult']+'</td>'+
                        '<td>'+data['atracs'][i]['nat']+'</td>'+
                        '<td><span class="ellipsis">'+data['atracs'][i]['lon']+'</span></td>'+
                        '<td><span class="ellipsis">'+data['atracs'][i]['lat']+'</span></td>  '+
                        '<td>'+
                            '<svg class="svgStat pointer" data-id="'+data['atracs'][i]['id']+'" data-stat="'+data['atracs'][i]['status']+'"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 6.07026C18.3912 7.45349 20 10.0389 20 13C20 17.4183 16.4183 21 12 21C7.58172 21 4 17.4183 4 13C4 10.0389 5.60879 7.45349 8 6.07026M12 3V13" stroke="'+color+'" stroke-width="2" stroke-linecap="round"></path> </g></svg>'+
                        '</td>'+
                        '<td class="pointer zoom editAtrac" data-id="'+data['atracs'][i]['id']+'">Editar</td>'+
                    '</tr>');
                    
                }

            } else {
                    alert('Error en el servidor');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la carga de datos:', status, error);
            alert('Error en la carga de datos');
        }
    });
    
}
/********************************************************************************************/
/******************        Función para crear menu usuario registrado        ****************/
/********************************************************************************************/
function validate_phpSession(user, contra) {

    console.log(user, contra);
    request = $.ajax({
        url: '_includes/_php/login_validate.php?method=validate_session',
        type: "POST",
		data: {login_user: user,login_password: contra}
    });
    // En conexión exitosa
    request.done(function(response, textStatus, jqXHR) {
        console.log(response);
        if (response != 'unsuccessful') {
			console.log('datos correctos');
            var session_response = $.parseJSON(response);
            // aqui generar vista de usuario registrado
            user_main(session_response[0], session_response[1]);
            
        } else {
			console.log('datos incorrectos');
            alert('Credenciales incorrectas');
            // si no existe session activa
        }
    });
}




function user_main(userName, userPassword) {
    "use strict";
    //Removemos el login Iniciar session y registrarse de el menu
    console.log(userName, userPassword);
	$('#sesion').remove();
	$('.header').removeClass('none');
	$('.aliIni').removeClass('none');

    const mensaje = obtenerSaludo('<span id="userAdmin"></span>');
    $('#saludo').html('<span>'+mensaje+', bienvenido</span><h3>Gestor de Atlas Turístico</h3>');
    
	// // Iniciamos el monitoreo de sesión
	time_session = setInterval(function() { session_check(); }, 600000);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////                            Cerrar Session                              ///////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////


function close_phpSession() {
    request = $.ajax({
        url: '_includes/_php/logout.php',
        type: "POST"
    });
    // En conexión exitosa
    request.done(function(response, textStatus, jqXHR) {
        if (response == 'session_closed') {
            console.log('Sesión cerrada correctamente');
            // Redirigir al usuario a la página de inicio de sesión u otra acción
            window.location.reload(); // Reemplaza con la URL de tu página de inicio de sesión
        } else {
            console.log('Error al cerrar la sesión');
        }
    });
}



	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////                            Validar Session                              ///////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validamos si existe una sesión de usuario.

function session_check() {
    "use strict";
	var request;

    request = $.ajax({
        url: '_includes/_php/session_check.php',
        type: "POST",
        data: { method: 'checking_a_session' }
    });
    // En conexión exitosa
    request.done(function(response, textStatus, jqXHR) {
		console.log(response);
        if (response != 'session_inactive') {
            console.log('ya existe sesion');
			$('.header').removeClass('none');
            $('.aliIni').removeClass('none');
			$('#sesion').remove();
            let userName = response;
            const mensaje = obtenerSaludo('<span id="userAdmin"></span>');
            $('#saludo').html('<span>'+mensaje+', bienvenido</span><h3>Gestor de Atlas Turístico</h3>');

            console.log(userName);
            if (userName === 'user1') {
                onesignal();
                console.log('user1');
                $('#stTransparente').remove();
            } else if (userName == 'user2'){       
            }

        } else {
            console.log('no hay sesion');
            clearInterval(time_session);
            $('.header').addClass('none');
            $('.aliIni').addClass('none');
            // $('body').prepend('<div id="sesion"><div class="contSesion"><img width="50px" src="_images/sesion.png" alt=""><form id="iniSesion" autocomplete="off" method="POST"><input required type="text" placeholder="Usuario" name="user" id="user"><input required type="password" placeholder="Contraseña" name="contra" id="contra"><button type="submit">Iniciar sesión</button></form></div></div>');
        }

    });
}





//Cambio de tamaño en la vetana
function thisResize() {

}

var resizeTimer; $(window).resize(function () { if (resizeTimer) { clearTimeout(resizeTimer); } resizeTimer = setTimeout(function() { resizeTimer = null; thisResize(); }, 500);});