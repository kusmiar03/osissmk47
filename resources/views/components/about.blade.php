<h1 class="text-4xl leading-[45px] font-bold text-center">
    Tentang Kami
</h1>

<div style="margin: 0 1rem;">
    <img src="{{Storage::url($category->post[0]->thumbnail)}}" alt="thumbnail photo" class="object-cover w-full h-full" />

    <br>

    {!! $category->post[0]->isi !!}


</div>
