<div>
    <h1>Api Call</h1>
    <ul>
        <li>Name: <b>{{ $data->name }}</b></li>
        <li>Username: <b>{{ $data->username }}</b></li>
        <li>Email: <b>{{ $data->email }}</b></li>
        <li>Phone: <b>{{ $data->phone }}</b></li>
        <li>Website: <b>{{ $data->website }}</b></li>
        <li>Company: <b>{{ $data->company->name }}</b></li>
        <li>Street: <b>{{ $data->address->street }}</b></li>
    </ul>
</div>
