@extends('app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
<div class="card card-custom example example-compact">
<div class="card-body">
    <form class="form" id="">

      <div class="row" >
          <div class="col-md-6">
              <h3 class="ui header" style="margin-top: 10px;">
                  Departamentos registrados
              </h3>
          </div>

          <div class="col-md-6" style="text-align: right;">

            <a href="javascript: editaArea(0, 0);" class="btn btn-primary">
                <i class="fas fa-plus icon-sm"></i>
                Nueva estructura inicial
            </a>


          </div>

      </div>


        <!-- <div class="ten wide field">
            <label>Seleccione una opción</label>
            <div class="ui selection tipo dropdown multiple" id="cve_cat_tipo">
                <input type="hidden" name="cve_cat_tipo" id="cve_cat_tipo" >
                <i class="dropdown icon"></i>
                <div class="default text">Seleccione </div>
                <div class="menu">
                    <div class="item" data-value="0">Todos... </div>
                    <div class="item" data-value="1">Dependencia </div>
                    <div class="item" data-value="2">Entidad </div>
                    <div class="item" data-value="3">Otro </div>
                </div>
            </div>
        </div> -->
        <br>


      <div class="row">

        <div class="col-xl-5">

          <div id="ra-tree-wrapper" style="max-width:800px;">
          <div class="mb-2">
            <input id="tree-search" class="form-control" placeholder="Buscar..." />
          </div>

          <!-- Aquí va el árbol -->
          <div id="divTree" class="arbol" style="border:1px solid #ddd; padding:8px; min-height:200px; overflow:auto;"></div>

          <div class="mt-2">
            <button id="open-all"  type="button"class="btn btn-sm btn-primary">Abrir todo</button>
            <button id="close-all" type="button" class="btn btn-sm btn-secondary">Cerrar todo</button>
            <button id="reload-tree" type="button" class="btn btn-sm btn-info">Recargar</button>
          </div>
        </div>




            <!-- Fin: areas -->

        </div>

        <div class="col-xl-7 needs-validation"  style="display: none; padding-top: 0 !important;" id="columna_crear_area">

            <div class="row">
              <div class="col-md-6 nivel" id="div_nivel">
                  <label>Nivel <span class="requerido">requerido </span></label>
                  <select class="form-control nivel" name="nivel" id="nivel" value="1"  >
                    <option value="0">Selecciona...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
              </div>

              <div class="col-md-6" >
                  <label>Tipo <span class="requerido">requerido </span></label>
                  <select class="form-control tipo"  name="id_tipo" id="id_tipo"  >
                    <option value="0">Selecciona...</option>
                    <option value="1">Secretaria</option>
                    <option value="2">Subsecretaria</option>
                    <option value="3">Dirección General</option>
                    <option value="4">Dirección</option>
                    <option value="5">Departamento</option>
                  </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 nombre_areas" id="areas_ts">
                  <label>Nombre del Área <span class="requerido">requerido </span></label>
                  <input type="text" name="nombre_area" class="form-control" placeholder="Nombre del Área" id="nombre_area">

              </div>
              <div class="col-md-4 nombre_areas" id="areas_ts">
                  <label>Clave departamental <span class="requerido">requerido </span></label>
                  <input type="text" name="clave_departamental" class="form-control" placeholder="Clave departamental" id="clave_departamental">

              </div>
            </div>


            <div role="separator" class="dropdown-divider"></div>
            <label>Agregar Responsable del Área</label>

            <div class="row">
              <div class="col-md-4">
                <label>Nombre <span class="requerido">requerido </span></label>
                <input type="text" name="nombre_empleado" id="nombre-empleado"  class="form-control" required>
              </div>

              <div class="col-md-4">
                <label>Apellido Paterno <span class="requerido">requerido </span></label>
                <input type="text" name="apellido_p_empleado" id="apellido-p-empleado" class="form-control" required>

              </div>


              <div class="col-md-4">
                <label>Apellido Materno </label>
                <input type="text" name="apellido_m_empleado" id="apellido-m-empleado" class="form-control" required>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label>Nivel <span class="requerido">requerido </span></label>
                <input type="text" name="puesto_empleado" id="nivel-empleado" class="form-control"  required>
              </div>

              <div class="col-md-6">
                <label>Numero de Empleado <span class="requerido">requerido </span></label>
                <input type="text" name="telefono_empleado" id="numeros-empleado" class="form-control" onkeypress='return validaNumericos(event)'  >

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label>Puesto <span class="requerido">requerido </span></label>
                <input type="text" name="puesto_empleado" id="puesto-empleado" class="form-control"  required>
                  <input type="hidden" id="id_empleado_es" name='id_empleado'>
              </div>


              <div class="col-md-6">
                <label>Teléfono </label>
                <input type="text" name="telefono_empleado" id="telefono-empleado" class="form-control" onkeypress='return validaNumericos(event)'  >

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label>Extensión </label>
                <input type="text" name="extension" id="extension-empleado" class="form-control" onkeypress='return validaNumericos(event)'  >

              </div>

              <div class="col-md-6">
                <label>Correo Eléctronico </label>
                <input type="email" name="correo" id="correo-empleado" class="form-control"  >
              </div>

            </div>


            <div role="separator" class="dropdown-divider"></div>

            <br />
            <div class="col-md-6" >
                <a class="btn btn-primary" onclick="guardarEstructura()">
                    <i class="fas fa-save"></i>
                    Guardar
                </a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- (tu script.js va aquí si existe) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
<script>
/*
  Inicialización segura de jsTree.
  - Comprueba existencia del contenedor.
  - Protege destroy con data('jstree').
  - Soporta datos estáticos (ejemplo) o datos por AJAX.
*/

(function($){

  // Debounce helper para búsqueda
  function debounce(fn, delay){
    var t;
    return function(){
      var args = arguments;
      clearTimeout(t);
      t = setTimeout(function(){ fn.apply(null, args); }, delay);
    }
  }

  // Inicializa el árbol con datos estáticos (ejemplo)
  function initTreeStatic(){
      safeDestroy('#divTree');

      $.ajax({
          type: "GET",
          url: "/grupos/buscaAreas/0/1/1",
          dataType: "json",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data){




              let treeData = data[0].map(function(item){
                  return {
                      id: item.id,
                      parent: (item.id_padre == 0 ? "#" : item.id_padre),
                      text: item.nombre
                  };
              });



              $('#divTree').jstree({
                  'core' : {
                      'data' : treeData,
                      'check_callback' : true,
                      'themes' : { "responsive": false }
                  },
                  "plugins" : ["search", "wholerow", "state", "contextmenu"],
                  "contextmenu": {
                      "items": function(node) {
                          return {
                              "Add": {
                                  "label": "Agregar hijo",
                                  "action": function (obj) {
                                      var newNode = $('#divTree').jstree().create_node(node, { "text": "Nuevo nodo" });
                                      $('#divTree').jstree('edit', newNode);
                                  }
                              },
                              "Rename": {
                                  "label": "Renombrar",
                                  "action": function (obj) { $('#divTree').jstree('edit', node); }
                              },
                              "Delete": {
                                  "label": "Eliminar",
                                  "action": function (obj) { $('#divTree').jstree('delete_node', node); }
                              }
                          };
                      }
                  }
              })
              .on('ready.jstree', function() {
                  console.log('✔ jsTree listo');
              })
              .on('changed.jstree', function(e, data) {
                  console.log('Nodo seleccionado:', data.selected);
              })
              .on('error.jstree', function(e, data) {
                  console.error('❌ Error jsTree:', data);
              });

          }
      });
  }




  // Destruir árbol de forma segura (evita error: jstree is not a function)
  function safeDestroy(selector){
    var $el = $(selector);
    if ($el.length === 0) return;
    var inst = $el.jstree(true);
    if (inst) {
      try { $el.jstree('destroy'); } catch(e) { console.warn('Destroy jstree fallo', e); }
    }
    // limpiamos html para evitar duplicados
    $el.empty();
  }

  // Conecta botones, búsqueda y utilidades
  function wireControls(){
    // Abrir / cerrar
    $('#open-all').on('click', function(){ if ($('#divTree').jstree(true)) $('#divTree').jstree('open_all'); });
    $('#close-all').on('click', function(){ if ($('#divTree').jstree(true)) $('#divTree').jstree('close_all'); });

    // Recargar: aquí decides si usas AJAX o estático
    $('#reload-tree').on('click', function(){
      // ejemplo: recargar AJAX
      initTreeStatic();
    });

    // Búsqueda con debounce
    var doSearch = debounce(function(txt){
      var tree = $('#divTree').jstree(true);
      if (!tree) return;
      tree.search(txt);
    }, 300);

    $('#tree-search').on('input', function(){
      doSearch($(this).val());
    });
  }

  // Inicialización principal
  $(function(){
    // comprobación básica
    if (typeof $.fn.jstree === 'undefined') {
      console.error('jsTree NO está cargado. Verifica el orden de scripts (jQuery -> otros -> jsTree).');
      return;
    }

    if ($('#divTree').length === 0) {
      console.error('#divTree no existe en el DOM. Asegúrate de colocar el HTML correctamente.');
      return;
    }

    // Elige una de las inicializaciones:
    // initTreeStatic();
    initTreeStatic();

    wireControls();
  });

})(jQuery);
</script>


@endsection
