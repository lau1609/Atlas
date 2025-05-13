<!DOCTYPE HTML>
<html lang="es" prefix="og: https://ogp.me/ns#">
    <head>
        <meta property="og:url" content="" >
        <meta property="og:type" content="website" >
        <meta property="og:title" content="" >
        <meta property="og:description" content="" >
        <meta property="og:image" content="" >
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        
        <?php include_once("phpAssets/head.php"); ?>
        
        <title>Atlas Turístico</title>
        <script src="_includes/_js/main.js"></script>

    </head>
    <body>
    <?php
        ?>
    <?php include_once("phpAssets/analytics.php"); ?>
    <?php include_once("phpAssets/header.php"); ?>
    <div id="sesion">
        <div class="backCH"></div>
        <div class="contSesion">
            <div class="blurBack"></div>
            <div class="blurBack2"></div>
            <div class="contForm">
                <div class="part1">
                    <h3></h3>
                   <img width="50px" src="_images/_svg/contra.svg" alt="">
                    <form id="iniSesion" autocomplete="off" method="POST">
                        <div class="contInput">
                            <svg viewBox="0 0 16 16" fill="rgb(95,122,42,100)" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="rgb(95,122,42,100)"></path> <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="rgb(95,122,42,100)"></path> </g></svg>
                            <input required type="text" placeholder="Usuario" name="user" id="user">
                        </div>
                        <div class="contInput">
                            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="rgb(95,122,42,100)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> </g> <g id="Layer_7" data-name="Layer 7"> <g> <path d="M39,18H35V13A11,11,0,0,0,24,2H22A11,11,0,0,0,11,13v5H7a2,2,0,0,0-2,2V44a2,2,0,0,0,2,2H39a2,2,0,0,0,2-2V20A2,2,0,0,0,39,18ZM15,13a7,7,0,0,1,7-7h2a7,7,0,0,1,7,7v5H15ZM37,42H9V22H37Z"></path> <circle cx="15" cy="32" r="3"></circle> <circle cx="23" cy="32" r="3"></circle> <circle cx="31" cy="32" r="3"></circle> </g> </g> </g> </g></svg>
                            <input required type="password" placeholder="Contraseña" name="contra" id="contra">
                        </div>
                        <button type="submit">Iniciar sesión</button>
                    </form> 
                </div>
                
                <div class="part2">
                      <img src="_images/logoA.png" alt="">
                </div>
            </div> 
            </div>
            
    </div>
    <div id="aliIni" class="aliIni none">
        <div class="inicio">
          <div id="saludo"></div>
        </div>
        <!-- <div class="popAtractivos">
            <div class="contAtractivo">
                <div class="contImgClose"><img id="close" src="_images/borrar.png" alt=""></div>
                <h3>Agregar Atractivo turistico</h3>
                <form id="formAddAtrac">
                    <input type="text" name="name" placeholder="Nombre" id="">
                    <textarea name="desc" placeholder="Descripción" id=""></textarea>
                    <input type="text" name="temp" placeholder="Temperatura" id="">
                    <input type="text" name="cult" placeholder="Cultura" id="">
                    <input type="text" name="natu" placeholder="Naturaleza" id="">
                    <input type="text" name="dir" placeholder="Dirección">
                    <input type="text" name="hor" placeholder="Horarios" id="">
                    <input type="email" name="mail" placeholder="Email" id="">
                    <input type="text" name="tel" placeholder="Telefono de contacto" id="">
                    <input type="number" name="price" placeholder="Precio de entrada" id="">
                    <input type="text" name="face" placeholder="URL de Facebook" id="">
                    <input type="text" name="inst" placeholder="URL de Instagram" id="">
                    <select name="typAtrac">
                        <option value="" hidden>Tipo de atractivo</option>
                        <option value="" hidden>Atractivo 1</option>
                    </select>
                    <select name="region">
                        <option value="" hidden>Regiones</option>
                        <option value="" hidden>Región 1</option>
                    </select>
                    <fieldset>
                        <legend>Imagen de portada</legend>
                        
                        <label class='__lk-fileInput'>
                            <span class="spanPort" data-default='Choose file'>Archivo</span>
                            <input name="portada" id="portada" accept="image/*" type="file">
                        </label>
                    </fieldset>
                    <fieldset>     
                        <legend>Imágenes de galería</legend>     
                        <label class='__lk-fileInput'>
                            <span data-default='Elige archivos'>Archivos</span>
                            <input id="file-input" name="images[]" type="file" accept="image/*" multiple>
                        </label>
                        <ul id="file-list"></ul>
                    </fieldset>
                    <div class="contButSub"><input type="submit" class="colorYellow" value="Enviar"></div>
                </form>
            </div>
        </div> -->

        <!-- <div class="contAtrac">
            <div class="contButAtrac"><button id="addAtrac" class="colorYellow">Nuevo</button></div>
            <div class="conttabAtrac">
                <table id="tabIndTuris">
                    <caption>Atractivos Turisticos</caption>
                    <tr class="title">
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Tempertura</th>
                        <th>Cultura</th>
                        <th>Naturaleza</th>
                        <th>Longitud</th>
                        <th>Latitud</th>
                        <th>Estatus</th>
                    </tr>
                    <tr> 
                        <td>Atractivo 1</td>
                        <td>Descripcion de atractivo 1</td>
                        <td>Tempertura de atractivo 1</td>
                        <td>Cultura de atractivo 1</td>
                        <td>Naturaleza de atractivo 1</td>
                        <td>-106.02333951261123</td>
                        <td>28.650414339812784</td>  
                        <td>
                            <svg class="svgStat" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 6.07026C18.3912 7.45349 20 10.0389 20 13C20 17.4183 16.4183 21 12 21C7.58172 21 4 17.4183 4 13C4 10.0389 5.60879 7.45349 8 6.07026M12 3V13" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> </g></svg>
                        </td>
                        <td class="pointer zoom" id="editAtrac">Editar</td>
                    </tr>
                </table>
            </div>
        </div>
    </div> -->
    <!-- <iframe class="none" id="contenidoPrueba" src="prueba.php" ></iframe> -->
        <?php include_once("phpAssets/footer2.php"); ?>
        <?php include_once("phpAssets/footer.php"); ?>
    
    </body>
<script>
// $(document).ready(function () {
    console.log('vbf dj');

    
    

</script>
</html>