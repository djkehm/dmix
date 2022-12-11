
<script src="https://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
    <script>
    function AgregarMas() {
        $("<div>").load("generos-artistas", function() {
                $("#productos").append($(this).html());
        });	
    }
    function BorrarRegistro() {
        $('div.lista-producto').each(function(index, item){
            jQuery(':checkbox', this).each(function () {
                if ($(this).is(':checked')) {
                    $(item).remove();
                }
            });
        });
    }
    </script>
    
    </head>
    
    <body>
    <header> 
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
          </form>
        </div>
      </nav>
    </header>
    
    <!-- Begin page content -->
    
    <div class="container">
      <h3 class="mt-5"><a href="https://www.baulphp.com/inputs-dinamicos-usando-jquery-y-php/">Inputs dinámicos usando jQuery y PHP</a></h3>
      <hr>
      <div class="row">
        <div class="col-12 col-md-12"> 
          <!-- Contenido -->
          
    
    
    <FORM name="frmProduct" method="post" action="">
    <div id="outer">
    <div id="header">
    <div class="float-left">&nbsp; Nro.</div>
    <div class="float-left col-heading"> Nombre</div>
    <div class="float-left col-heading2"> Precio</div>
    <div class="float-left col-heading2"> Cantidad</div>
    </div>
    <div id="productos">
    <div class="lista-producto float-clear" style="clear:both;">
     <ul class="list-group">
       <li class="list-group-item">
    <div class="float-left"><input type="checkbox" name="item_index[]" /></div>
    <div class="float-left"><input class="form-control" type="text" name="pro_nombre[]"/></div>
    <div class="float-left"><input class="form-control" type="text" name="pro_precio[]" style="width:110px;" /></div>
    <div class="float-left"><input class="form-control" type="text" name="pro_cantidad[]" style="width:110px;"/></div>
        </li>
     </ul> 
    </div></div>
    <div class="btn-action float-clear">
    <input class="btn btn-success" type="button" name="agregar_registros" value="Agregar Mas" onClick="AgregarMas();" />
    <input class="btn btn-danger" type="button" name="borrar_registros" value="Borrar Campos" onClick="BorrarRegistro();" />
    <span class="success"></span>
    </div>
    <div style="position: relative;">
    <inpuT disabled class="btn btn-primary" type="submit" name="guardar" value="Guardar Ahora" />
    </div>
    </div>
    </form>
    
    
          <!-- Fin Contenido --> 
        </div>
      </div>
      <!-- Fin row --> 
    
      
    </div>
