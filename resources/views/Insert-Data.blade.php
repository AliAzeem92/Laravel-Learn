<div>
    <h1>Inserting Data to DB</h1>
    <form action="{{ route('insert.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <br/>
        <br/>
        <input type="text" name="email" placeholder="Email">
        <br/>
        <br/>
        <input type="text" name="phone" placeholder="Phone">
        <br/>
        <br/>
        <button type="submit">Insert Data</button>
    </form>
</div>
