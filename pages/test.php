<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/lib/js/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <form action="/services/test" method="post">
        <input type="checkbox" name="check[0][id]" id="check" value="1" checked>
        <input type="checkbox" name="check[1][id]" id="check" value="2" checked>
        <input type="checkbox" name="check[2][id]" id="check" value="3" checked>

        <textarea name="check[0][desc]" id="editor" cols="30" rows="10"></textarea>
        <button type="submit">Send</button>
    </form>
</body>

</html>