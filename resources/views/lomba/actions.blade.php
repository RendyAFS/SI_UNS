<div class="d-flex">
    {{-- <a href="{{ route('lombas.show', ['lomba' => $lomba->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a> --}}
    <a href="{{ route('lombas.edit', ['lomba' => $lomba->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('lombas.destroy', ['lomba' => $lomba->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
