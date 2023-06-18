@extends('dashboard.layout')

@section('content')
    <a class="btn btn-success my-3" href="{{ route('posts.create') }}">Crear publicación</a>

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titulo</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Categoria</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Posted</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Accones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($posts as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $p->title }}</td>
                    <td class="px-6 py-4">{{ $p->category->title }}</td>
                    <td class="px-6 py-4">{{ $p->posted }}</td>
                    <td class="px-8 py-4">
                        <a class="btn btn-primary" href="{{ route('posts.edit', $p) }}">Editar</a>
                        <a class="btn btn-primary" href="{{ route('posts.show', $p) }}">Ver</a>
                        <form action="{{ route('posts.destroy', $p) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-2" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        
          </tbody>
        </table>
      </div>


    {{ $posts->links() }}
@endsection
