<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Summarizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Article Summarizer</h1>
        <form action="{{ route('summarize') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="url">Article URL</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>
            <button type="submit" class="btn btn-primary">Summarize</button>
        </form>
        @isset($summary)
        <div class="mt-5">
            <h3>Summary</h3>
            <p>{{ $summary }}</p>
        </div>
        @endisset
    </div>
</body>

</html>