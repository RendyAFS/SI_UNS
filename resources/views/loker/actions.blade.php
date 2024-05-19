<div class="d-flex">
    {{-- <a href="{{ route('lokers.show', ['loker' => $loker->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a> --}}
    <a href="{{ route('lokers.edit', ['loker' => $loker->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('lokers.destroy', ['loker' => $loker->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
