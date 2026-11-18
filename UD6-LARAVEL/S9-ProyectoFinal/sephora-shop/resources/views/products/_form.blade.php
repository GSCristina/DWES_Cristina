@php
    $selected = old('ingredients', $product->ingredients->pluck('id')->all());
@endphp

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
    @error('name') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
    <label for="brand_id">Marca</label>
    <select id="brand_id" name="brand_id" required>
        <option value="">— Selecciona una marca —</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
    @error('brand_id') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description">Descripción</label>
    <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
    @error('description') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price">Precio (€)</label>
    <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
    @error('price') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}" required>
    @error('stock') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <div class="checkbox-list">
        <label>
            <input type="checkbox" name="is_available" value="1"
                @checked(old('is_available', $product->exists ? $product->is_available : true))>
            Disponible
        </label>
    </div>
</div>

<div class="form-group {{ $errors->has('ingredients') || $errors->has('ingredients.*') ? 'has-error' : '' }}">
    <label>Ingredientes</label>
    <div class="checkbox-list">
        @foreach ($ingredients as $ingredient)
            <label>
                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                    @checked(in_array($ingredient->id, $selected))>
                {{ $ingredient->name }}
            </label>
        @endforeach
    </div>
    @error('ingredients.*') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="actions">
    <button type="submit" class="btn">Guardar</button>
    <a class="btn btn-outline" href="{{ route('products.index') }}">Cancelar</a>
</div>