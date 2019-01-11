<div class="row">
    <div class="form-group col-md-12">
        <table id="dtable" class="table table-striped">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <!-- Make input fields for all courses for the user to enter fractions -->
                @foreach($courses as $course)
                <tr>
                    <td>
                        {{ Form::checkbox('ocheck['.$course->id.']', 1, isset($course->selected)) }}
                        {{ Form::label('check', $course->name) }}
                    </td>
                    <td>{{ $course->short_description }}</td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>
