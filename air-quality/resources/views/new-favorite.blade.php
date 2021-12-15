<h2>Add a new favorite place</h2>


<div>
    <form action="" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name of place"> <br>
                <select name="category">
            <option value="">select here</option>
            <option value="park">Park</option>
            <option value="city">City</option>
            <option value="running path">Running</option>
        </select><br>
        <input type="number" name="user_id" placeholder="user_id hidden">
        <br>

        <button type="submit" name="submitBtn" id="submitBtn">Add</button>
        <!-- <button type="submit" name="clearBtn" id="clearBtn">Clear selected marker</button> -->
    </form>
</div>