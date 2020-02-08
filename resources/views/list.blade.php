@extends('layouts/main')

@section('title', 'Artigos salvo no banco.')

@push('styles')
    <link rel="stylesheet" href="{{asset("api/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("api/DataTables/Buttons-1.6.1/css/buttons.bootstrap4.min.css")}}">
@endpush
@section('body-content')

    <div class="container mt-5">
    <!--ALERT-->
        @include('partials/_msg')

        <div class="table-responsive">
          <table id="userTable" class="table border mt-2 text-center table-sm">
            <thead class="border table-active rounded">
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Url</th>
                <th scope="col">Registro</th>
              </tr>
            </thead>
            <tbody>
              <!--RETORNAR DADOS DO BANCO-->
            @foreach ($valores as $data)
            <tr>
                <td><span class="d-inline text-truncate">{{$data->titulo}}</span></td>
                <td><span class="d-inline text-truncate">{{$data->link}}</span></td>
                <td><span class="d-inline text-truncate">{{$data->created_at}}</span></td>
            </tr>
            @endforeach
                    </tbody>
                </table>
                </div>
    </div>

    @parent
@endsection

@push('script-bottom')
<!--SCRIPT DATATABLE-->
  <script src="{{asset("api/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("api/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.bootstrap4.min.js")}}"></script>
  <script src="{{asset("api/DataTables/JSZip-2.5.0/jszip.min.js")}}"></script>
  <script src="{{asset("api/DataTables/pdfmake-0.1.36/pdfmake.min.js")}}"></script>
  <script src="{{asset("api/DataTables/pdfmake-0.1.36/vfs_fonts.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.html5.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.print.min.js")}}"></script>
  <script src="{{asset("api/DataTables/Buttons-1.6.1/js/buttons.colVis.min.js")}}"></script>

  <script>
   $(document).ready(function() {
    var table = $('#userTable').DataTable( {
        responsive: true,
        "searching": true,
         "language": {
            "search": "Pesquisar",
             "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
              },
                "lengthMenu": "_MENU_",
                "zeroRecords": "Não encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
          },
          buttons: [

           'colvis',
          ],
    } );
    // $('#userTable').addClass('form-inline');
    table.buttons().container().appendTo( '#userTable_wrapper .col-md-6:eq(0)' );
    } );

  <!--FIM SCRIPT DATATABLE-->
  </script>
@endpush

