<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link href="{{ asset('/assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="prev">

    </div>

<script src="{{ asset('/assets/js/pdfobject.js') }}"></script>
<script>PDFObject.embed("{{ asset('/storage/' . $file) }}", "#prev" , { height : "50rem"});</script>
</body>
</html>