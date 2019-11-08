@extends('layout.app')

@section('title', 'Create')

@section('content')
<form method="POST" action="{{route('home.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="usr">Name:</label>
        <input type="text" class="form-control" name="name" id="usr">
    </div>
    <br>
    <label for="usr">Gender:</label> 
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" value="male">Male
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" value="female">Female
        </label>
    </div>
    <br>
    <label for="usr">Aktif</label>
    <input type="date" name="from" id="">
    <label for="usr">to</label>
    <input type="date" name="to">
    <br>
    <label for="usr">Skills:</label>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="skill[]" value="php">PHP
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="skill[]" value="python">Python
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="skill[]" value="java">JAVA
        </label>
    </div>
    <br>
    
    <br>
    
    <label for="usr">Dokumen:</label>
    <div id="if">
        <button id="add_field_button" class="btn btn-primary mb-3">Add More Fields</button>
        <div><input type="file" name="dokumen[]" class="form-control-file border" multiple></div>
    </div>
    
    <br>
    <br>

    <button type="submit" class="btn btn-success">Save</button>
</form>

    



    
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $("#if"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="file" name="dokumen[]" class="form-control-file border" multiple><a href="#" class="remove_field  btn btn-danger">Remove</a></div>');
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove(); x--;
    })
});
</script>