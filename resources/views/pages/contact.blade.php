<x-layouts.app>
    <div class="container">
        <form>
            @csrf
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" class="form-control" id="name" placeholder="Naam">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="message">Bericht:</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Inhoud"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Versturen</button>
        </form>
    </div>
</x-layouts.app>
