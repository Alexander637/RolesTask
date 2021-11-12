<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@php
    $user = auth()->user();

if ($user->role == 'user'){
     abort('404');
}
elseif ($user->role == 'admin'){
 @endphp
@include('admin-form')

@php
}

@endphp



<table>
        <tr>
            <th>
                name
            </th>
            <th>
                email
            </th>
            <th>
                role
            </th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->role}}

                </td>
                <td class="delete">

                    <form action="{{route('delete-user')}}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>

<script>

    $.ajax({
        url: '/api/get-user-role',
        type: "GET",

        success: function (user) {
            if (user.role == 'admin'){
                let createButton = document.createElement('button')
                button.type = 'submit';
                button.innerHTML('Create new User');
                document.body.append(createButton);
                let deleteButton = document.createElement('button')
                button.type = 'submit';
                button.innerHTML('Delete User');
                let td = document.getElementsByClassName('delete');
                td.prepend(deleteButton)
            } else if (user.role == 'manager'){
                let createButton = document.createElement('button')
                button.type = 'submit';
                button.innerHTML('Create new User');
                document.body.append(createButton);
            }
        },
        error: function () {
            stores = 0;
        }
    })

</script>

</body>
</html>
