<h2 class="text-lg font-bold mb-4">Preview Formulir</h2>

<iframe src="{{ route('preview.pdf', basename($pdfUrl)) }}" width="100%" height="600px"></iframe>

<form action="{{ route('formulir.store') }}" method="POST">
    @csrf
    @foreach($formData as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <input type="hidden" name="tempId" value="{{ $tempId }}">

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">
        Simpan
    </button>
</form>
