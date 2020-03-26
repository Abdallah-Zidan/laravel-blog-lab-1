<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Posts</title>
    </head>
    <body>
        <h1>Hello , people</h1>
        <table>
            <tbody>
               @foreach ($posts as $post )
                      <tr>
                            <td>{{$post["title"]}}</td>
                            <td>{{$post["created_at"]}}</td>
                      </tr>
               @endforeach
            </tbody>
        </table>
    </body>
</html>
