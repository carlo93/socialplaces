<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    @yield('styles')
    
</head>

<body class="app">
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between ">

                <div class="topnav" id="myTopnav">
                    <a href="#" class="nav-link navlink" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt">

                        </i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </header>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    <div class="app-body">
        
        <main class="main">
                @yield('content')
            </div>
        </main>
        
    </div>
    <div class="modal fade" id="ctModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    
    
    <script>
        $(document).ready(function(){

         $('.ctinfo').click(function(){
           
           var id = $(this).data('id');
        console.log('view clicked');
           // AJAX request
           $.ajax({
            url: 'view',
            type: 'get',
            data: {id: id},
            success: function(response){ 
              $('.modal-title').html(response['title']);
              // Add response in Modal body
              $('.modal-body').html(response['body']);

              // Display Modal
              $('#ctModal').modal('show'); 
            }
          });
         });
        });

        $(function() {
          let copyButtonTrans = 'Copy'
          let csvButtonTrans = 'CSV'
          let excelButtonTrans = 'Excel'
          let pdfButtonTrans = 'PDF'
          let printButtonTrans = 'Print'

          $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
          $.extend(true, $.fn.dataTable.defaults, {
            
            columnDefs: [ {
                orderable: false,
                searchable: true,
                targets: -1
            }],
            select: {
              style:    'multi+shift',
              selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 100,
            dom: 'lBfrtip<"actions">',
            buttons: [
              {
                extend: 'copy',
                className: 'btn-default',
                text: copyButtonTrans,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'csv',
                className: 'btn-default',
                text: csvButtonTrans,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'excel',
                className: 'btn-default',
                text: excelButtonTrans,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'pdf',
                className: 'btn-default',
                text: pdfButtonTrans,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'print',
                className: 'btn-default',
                text: printButtonTrans,
                exportOptions: {
                  columns: ':visible'
                }
              }
            ]
          });

          $.fn.dataTable.ext.classes.sPageButton = '';
        });

    </script>
    @yield('scripts')
</body>

</html>
