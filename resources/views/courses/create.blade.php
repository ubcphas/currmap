<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Course Input</h2><br/>
  </div>
<!-- Handle validation errors -->
  @include('includes.errors')

  {{ Form::open(['action' => 'CourseController@store']) }}

  @include('courses.form', ['submitButtonText' => 'Create'])
  @include('courses.topics_outcomes')

  <div class='form-group'>
   {{ Form::submit('Create', ['class' => 'btn btn-lg btn-success form-control', 'style' => "margin-top:20px"]) }}
  </div>

  {{ Form::close() }}

@stop

@section('js')
<script>
  $(document).ready(function(){
    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
      return $(value).val();
    };

    var tableo = $("#dtableo").DataTable( {
      "columnDefs": [
      { "type": "html-input", "targets": 2 },
      { "orderable": false, "targets": "no-sort"}
      ],
      "order": [[1, "asc"]],
      "paging": false,

      footerCallback: function( tfoot, data, start, end, display ) {
        var api = this.api();

        total = api.column(2).data().reduce(function ( a, b ) {
          var bnum = 0;
          var bsplit;
          if (b) {
            bsplit = b.split("value=")[1];
          }
          if (bsplit) {
            bnum = parseFloat(bsplit.replace(/[^0-9.+-]/g, ''));
          }

          return a + bnum;
        }, 0);
        $('#totalFracOutcome').html("Sum: " + total.toFixed(2));
      }
    }
    );

    $("#dtableo td input").on('change', function() {
      var $td = $(this).parent('td');
      $td.find('input').attr('value', this.value);
      tableo.cell($td).invalidate().draw();
    });

    var tablet = $("#dtablet").DataTable( {
      "columnDefs": [
      { "type": "html-input", "targets": 3 },
      { "orderable": false, "targets": "no-sort"}
      ],
      "order": [[1, "asc"]],
      "paging": false,

      footerCallback: function( tfoot, data, start, end, display ) {
        var api = this.api();

        total = api.column(3).data().reduce(function ( a, b ) {
          var bnum = 0;
          var bsplit;
          if (b) {
            bsplit = b.split("value=")[1];
          }
          if (bsplit) {
            bnum = parseFloat(bsplit.replace(/[^0-9.+-]/g, ''));
          }

          return a + bnum;
        }, 0);
        $('#totalFracTopic').html("Sum: " + total.toFixed(2));
      }
    }
    );

    $("#dtablet td input").on('change', function() {
      var $td = $(this).parent('td');
      $td.find('input').attr('value', this.value);
      tablet.cell($td).invalidate().draw();
    });


  });
</script>
@stop
