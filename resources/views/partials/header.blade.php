<header>
    <div class="container my-5">
        <a href="{{ route('comics.index') }}" class="bg-primary rounded subtitle"><b>Home</b></a>
        <a href="{{ route('comics.create')}}" class="bg-primary rounded subtitle"><b>New Comics</b></a>
    </div>

</header>
<style scoped>
    .subtitle {
        text-decoration: none;
        color: white;
        margin-right: 5rem;
        padding: 20px;
    }
</style>