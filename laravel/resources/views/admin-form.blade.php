<form action="{{route('create-user')}}">
    <button type="submit">
        Create User
    </button>
</form>

<script>
    deleteButton.innerHTML('Delete User');

    let form = document.getElementsByTagName('form');
    form.append(deleteButton)
</script>
