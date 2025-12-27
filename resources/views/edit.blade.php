<div>
    <h1>Edit Data</h1>
    <form action="/edit/{{ $data->id }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" placeholder="Name" value="{{ $data->name }}">
        <br/>
        <br/>
        <input type="text" name="email" placeholder="Email" value="{{ $data->email }}">
        <br/>
        <br/>
        <input type="text" name="phone" placeholder="Phone" value="{{ $data->phone }}">
        <br/>
        <br/>
        <button type="submit">Update Data</button>
        <a href="{{ route('Inserted-Data-Fetch') }}">Cancel</a>
    </form>
</div>
