<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ebooks</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f2f2f2; }
        .text-center{ text-align: center}
    </style>
</head>
<body>
    <h2>Ebooks</h2>
    <table>
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>Title</th>
                <th>Created By</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $index => $ebook)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $ebook->title }}</td>
                    <td class="text-center">{{ $ebook->user->name ?? 'N/A' }}</td>
                    <td class="text-center">{{ $ebook->starts_at->format('d-M-Y H:i') }}</td>
                    <td class="text-center">{{ $ebook->ends_at->format('d-M-Y H:i') }}</td>
                    <td class="text-center">{{ $ebook->is_active ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
