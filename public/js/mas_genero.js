$('.clonar').click(function() {
    // Clona el .input-group
    var $clone = $('#formulario .input-group').last().clone();
  
    // Borra los valores de los inputs clonados
    $clone.find(':input').each(function () {
      if ($(this).is('select')) {
        this.selectedIndex = 0;
      } else {
        this.value = '';
      }
    });
  
    // Agrega lo clonado al final del #formulario
    $clone.appendTo('#formulario');
});

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});


$('.clonar2').click(function() {
  // Clona el .input-group
  var $clone = $('#formulario2 .input-group2').last().clone();

  // Borra los valores de los inputs clonados
  $clone.find(':input').each(function () {
    if ($(this).is('select')) {
      this.selectedIndex = 0;
    } else {
      this.value = '';
    }
  });

  // Agrega lo clonado al final del #formulario
  $clone.appendTo('#formulario2');
});

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
$('.js-example-basic-single').select2();
});

