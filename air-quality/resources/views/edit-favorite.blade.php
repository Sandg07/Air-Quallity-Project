<h2>Edit a place</h2>
<p>You may select a new place on the map to edit the current position.</p>

<div>

    {{-- SAVE ERRORS --}}
    @if ($message = Session::get('success'))
    <p style="color:green">{{ $message }}</p>
    @endif
    
    @if ($message = Session::get('error'))
    <p style="color:red">{{ $message }}</p>
    @endif
    
    
    {{-- ERROR MESSAGES --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- EDIT FORM --}}
    <form action="" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$favorite->id}}"> <br>
        <input type="text" name="name" placeholder="Name of place" value="{{$favorite->name}}"> <br>
          <select name="category">
            <option <?php if ($favorite->category == 'park') { echo 'selected';} ?> value="park">Park</option>
            <option <?php if($favorite->category ==  'city') {echo 'selected';} ?> value="city">City</option>
            <option <?php if($favorite->category ==  'running place') {echo 'selected'; } ?> value="running place">Running place</option>
        </select><br>
        <input type="text" name="coordinates_x" value="{{$favorite->coordinates_x}}">
        <input type="text" name="coordinates_y" value="{{$favorite->coordinates_y}}">
        <input type="number" name="user_id" placeholder="user_id hidden" value="{{$favorite->user_id}}">
        <br>
        <button type="submit" name="submitBtn" id="submitBtn">Save</button>
    
    </form>
</div>