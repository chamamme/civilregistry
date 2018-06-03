<table class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>DOB</th>
        <th>Time</th>
        <th>Date</th>
        <th>Location</th>
    </tr>
    </thead>
    <tbody>
    @foreach($result as $user)
        <tr>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->time_of_death }}</td>
            <td>{{ $user->date_of_death }}</td>
            <td>{{ $user->death_location }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
