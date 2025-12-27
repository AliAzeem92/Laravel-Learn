<div>
    <h1>DB Query</h1>
    <table border="1" >
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Roll No</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->class }}</td>
                <td>{{ $data->roll_no }}</td>
            </tr>
        </tbody>
    </table>
</div>
