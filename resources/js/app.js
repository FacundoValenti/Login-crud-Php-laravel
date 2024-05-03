import './bootstrap';

// Importa jQuery
import $ from 'jquery';

// Importa el plugin datepicker de Bootstrap
import 'bootstrap-datepicker';

// Inicializa el datepicker en el documento
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});


