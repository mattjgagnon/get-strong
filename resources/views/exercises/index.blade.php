<div>
    <h1>Exercises</h1>
    @foreach ($exercises as $exercise)
        <h2>{{ $exercise->name }}</h2>
        <p>{{ $exercise->instructions }}</p>
    @endforeach
</div>
