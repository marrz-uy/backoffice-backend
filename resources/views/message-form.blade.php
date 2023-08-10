<form method="POST" action="{{ route('send-message') }}">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" id="title">
    <br>
    <label for="message">Mensaje:</label>
    <textarea name="message" id="message"></textarea>
    <br>
    <button type="submit">Enviar</button>
</form>
