//script para la configuración de las tablas
$(document).ready(function(){
    $('.dataTables').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'}
        ]

    });

});