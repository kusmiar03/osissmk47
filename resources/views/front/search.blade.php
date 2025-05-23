<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="{{ asset('output.css') }}" rel="stylesheet" />
		<link href="{{ asset('main.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
		<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

	</head>
	<body class="font-[Poppins]">
	<x-navbar/>
	<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
		@foreach ($categories as $category)
		<a href="{{ route('front.category', $category->slug) }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="flex w-6 h-6 shrink-0">
				<img src="{{ Storage::url($category->icon) }}" alt="icon" />
			</div>
			<span>{{ $category->judul }}</span>
		</a>
		@endforeach
	</nav>
		<section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
			<h1 class="text-4xl leading-[45px] font-bold text-center">
				Explore Hot Trending <br />
				Good News Today
			</h1>
			<form action="{{ route('front.search') }}" method="GET">
				<label for="search-bar" class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
					<div class="flex w-5 h-5 shrink-0">
						<img src="assets/images/icons/search-normal.svg" alt="icon" />
					</div>
					<input
						autocomplete="off"
						type="text"
						id="search-bar"
						name="keyword"
						placeholder="Search hot trendy news today..."
						class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
					/>
				</label>
			</form>
		</section>
		<section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
			<h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{ ucfirst($keyword) }}</span></h2>
			<div id="search-cards" class="grid grid-cols-3 gap-[30px]">

				@forelse($posts as $post)
				<a href="{{ route('front.details', $post->slug) }}" class="card-news">
					<div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">{{ $post->category->judul }}</p>
							<img src="{{ Storage::url($post->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">{{ $post->judul }}</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $post->created_at->format('M d, Y') }}</p>
						</div>
					</div>
				</a>
				@empty
				<p>Belum ada artikel</p>
				@endforelse
			</div>
		</section>
	</body>
</html>
