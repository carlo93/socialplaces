@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Social Places Contact Dashboard</h1>

                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                        <thead>
                            <tr>
                                
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Gender
                                </th>
                                
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $key => $contact)
                                <tr data-entry-id="{{ $contact->id }}">
                                    
                                    <td>
                                        {{ $contact->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $contact->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $contact->gender->name ?? '' }}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('contact-view', encrypt($contact->id)) }}">
                                            View
                                        </a>
                                        <form action="{{ route('contact-view', encrypt($contact->id)) }}" method="POST" onsubmit="return confirm('Confirm Deletion');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
            
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 0, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-Company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection