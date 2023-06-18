@extends('dashboard.layout')
@section('content')
    <a class="btn btn-success my-3" href="{{ route('categories.create') }}">Crear categoría</a>

    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre categoría</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Slug</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Aciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          @foreach ($categories as $c)
          <tr>
              <td class="px-6 py-4">{{ $c->title }}</td>
              <td class="px-6 py-4">{{ $c->slug }}</td>
              <td class="px-10 py-4">
                  <a class="btn btn-primary btn-action edit" href="{{ route('categories.edit', $c) }}">Editar</a>
                  <a class="btn btn-primary btn-action" href="{{ route('categories.show', $c) }}">Ver</a>
                  <form action="{{ route('categories.destroy', $c) }}" method="POST" class="form-delete">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-action delete" type="submit">Eliminar</button>
                  </form>
              </td>
          </tr>
      @endforeach
      
        </tbody>
      </table>
    {{ $categories->links() }}
@endsection
