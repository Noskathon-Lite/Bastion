<div>
<div>
    <h3>Category Details</h3>

    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Minimum Price:</strong> ${{ number_format($category->min_price, 2) }}</p>
    <p><strong>Maximum Price:</strong> ${{ number_format($category->max_price, 2) }}</p>

    <a href="{{ route('vehicle-categories.edit', $category->id) }}" class="btn btn-warning">Edit Category</a>
</div>
{{-- Do your work, then step back. --}}
</div>
