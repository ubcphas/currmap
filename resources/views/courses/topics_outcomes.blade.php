<div class="row">
    <h2>Outcome List</h2>
    <div class="form-group col-md-12">
        <select id="ctrl-show-selected-outcomes">
           <option value="all" selected>Show all</option>
           <option value="selected">Show selected</option>
        </select>

        <table id="dtableo" class="table table-striped">
            <thead>
                <tr>
                    <th class="no-sort">Sel</th>
                    <th>Name</th>
                    <th>Fraction</th>
                </tr>
            </thead>
            <tbody>
                <!-- Make input fields for all outcomes for the user to enter fractions -->
                @foreach($outcomes as $outcome)
                <tr class={{ isset($outcome->fraction) ? "sel" : "" }}>
                    <td>
                        {{ Form::checkbox('ocheck[]', 1, isset($outcome->fraction)) }} </td>
                    <td>{{ $outcome->name }}</td>
                    <td>
                       {{ Form::number('ofrac['.$outcome->id.']', $outcome->fraction, ['step' => "0.05", 'min' => '0', 'class' => 'form-control']) }}
                   </td>
               </tr>
               @endforeach
           </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td><span id="totalFracOutcome">0.0</span></td>
                </tr>
            </tfoot>
       </table>
   </div>
</div>

<div class="row">
    <h2>Topic List</h2>
    <div class="form-group col-md-12">
        <select id="ctrl-show-selected-topics">
           <option value="all" selected>Show all</option>
           <option value="selected">Show selected</option>
        </select>
        <table id="dtablet" class="table table-striped">
            <thead>
                <tr>
                    <th class="no-sort">Sel</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Fraction</th>
                </tr>
            </thead>
            <tbody>
                <!-- Make input fields for all outcomes for the user to enter fractions -->
                @foreach($topics as $topic)
                <tr class={{ isset($topic->fraction) ? "sel" : "" }}>
                    <td>
                    {{ Form::checkbox('tcheck[]', 1, isset($topic->fraction)) }}
                    </td>
                    <td>{{ $topic->name }}</td>
                    <td>
                       {{ Form::number('tlevel['.$topic->id.']', $topic->level, ['step' => "1", 'min' => '0', 'class' => 'form-control']) }}
                    </td>
                    <td>
                       {{ Form::number('tfrac['.$topic->id.']', $topic->fraction, ['step' => "0.05", 'min' => '0', 'class' => 'form-control']) }}
                   </td>
               </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><span id="totalFracTopic">0.0</span></td>
                </tr>
            </tfoot>
       </table>
   </div>
</div>
