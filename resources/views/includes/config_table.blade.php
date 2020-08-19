<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'}
            ]

        });

    });
</script>