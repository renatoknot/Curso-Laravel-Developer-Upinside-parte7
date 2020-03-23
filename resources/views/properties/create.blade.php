<form action="{{ route('imoveis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="">Título do imóvel</label>
    <input type="text" name="title"><br>

    <label for="">Preço de locação</label>
    <input type="text" name="rental_price"><br>

    <label for="">Imagem de destaque</label>
    <input type="file" name="cover"><br>

    <button type="submit">Gravar imóvel</button>
</form>
