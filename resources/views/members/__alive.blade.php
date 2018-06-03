<table class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Place Of Birth</th>
        <th>Phone</th>
        <th>Father Name</th>
        <th>Father Occupation</th>
        <th>Mother Name</th>
        <th>Mother Occupation</th>
    </tr>
    </thead>
    <tbody>
    @foreach($result as $user)
        <tr>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->place_of_birth }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->father_name }}</td>
            <td>{{ $user->father_occupation }}</td>
            <td>{{ $user->mother_name }}</td>
            <td>{{ $user->mother_occupation }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
