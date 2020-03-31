<div class="col-sm-12">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ $client->name ?? '' }}">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ $client->email ?? '' }}">
    </div>
</div>
