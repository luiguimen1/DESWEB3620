<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/custom.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/MiCSS.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="JS/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="JS/jquery-ui.js" type="text/javascript"></script>
        <script src="JS/popper.min.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <script src="JS/custom.js" type="text/javascript"></script>
        <script src="JS/jquery.validate.js" type="text/javascript"></script>
        <script src="JS/additional-methods.js" type="text/javascript"></script>
        <script src="JS/localization/messages_es.js" type="text/javascript"></script>
        <script src="JS/public.js" type="text/javascript"></script>
        <script src="JS/MiLibreria.php" type="text/javascript"></script>
        <script src="JS/planetas.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="./">Proyecto WEB</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor02">
                        <ul class="navbar-nav mr-auto">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-info">Cliente</button>
                                <div class="btn-group show" role="group">
                                    <button id="btnGroupDrop2" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item inici" cod="1" href="javascript:void(0)">Agregar Cliente</a>
                                        <a class="dropdown-item inici" cod="7" href="javascript:void(0)" id="lisClie">Listar Cliente</a>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-info">Factura</button>
                                <div class="btn-group show" role="group">
                                    <button id="btnGroupDrop2" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item inici" cod="2" href="javascript:void(0)">Crear Factura</a>
                                        <a class="dropdown-item " href="javascript:void(0)">Buscar Factura</a>
                                        <a class="dropdown-item " href="javascript:void(0)">Listar Factura</a>
                                    </div>
                                </div>
                            </div>



                            <li class="nav-item active">

                            </li>
                            <li class="nav-item active">
                                <button type="button" class="btn btn-info inici" cod="6">Agregar Productos</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-info inici" cod="3">Buscar</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-info inici" cod="4">Ayuda</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-info inici" cod="5">Planetas</button>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <div id="contenido">

            </div>
            <footer>
                <div class="">

                </div>

            </footer>
        </div>
        <!--
        Bloque de apoyo para el manejo de mensaje por GUI
        -->
        <div id="apoyo" style="display: none;">
            <!--
        Bloque de alertas
            -->
            <div id="dialog" title="">
            </div>
            <!--
                   Bloque de alertas de solicitud de confirmación
            -->
            <div id="dialog-confirm" title="">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span><span id="msnConf"></span></p>
            </div>

        </div>
    </body>
</html>
