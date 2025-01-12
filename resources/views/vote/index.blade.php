{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-vote | Vote</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-semibold text-gray-800">E-Vote</span>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{route('index')}}" class="text-gray-800 hover:text-blue-600">Home</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Contact</a>
            </div>
        </nav>
    </header>
    <p>Ready to vote ?!!</p>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Page</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-semibold text-gray-800">E-Vote</span>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('index') }}" class="text-gray-800 hover:text-blue-600">Home</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Contact</a>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">GCTU Voting Page</h1>
        <div class="flex flex-row justify-between">
            <p class="my-3 uppercase font-semibold">To vote for a candidate, select the specific category and cast your
                vote. As easy as that !</p>
            <a href="{{ route('voting.results') }}">
                <button class="bg-blue-600 text-white p-3 rounded-md text-xl">View Results</button>
            </a>
        </div>
        <div class="mb-8">
            <label for="category" class="block mb-2 font-semibold">Select Category:</label>
            <select id="category" class="w-full p-2 border rounded">
                <option value="">--Select a category--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="candidates" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Candidates will be dynamically inserted here -->
        </div>
    </div>

    <script>
        const categorySelect = document.getElementById('category');
        const candidatesContainer = document.getElementById('candidates');

        categorySelect.addEventListener('change', async (e) => {
            const categoryId = e.target.value;
            if (categoryId) {
                try {
                    const response = await axios.get(`/candidates/${categoryId}`);
                    const candidates = response.data;
                    renderCandidates(candidates);
                } catch (error) {
                    console.error('Error fetching candidates:', error);
                }
            } else {
                candidatesContainer.innerHTML = '';
            }
        });

        function renderCandidates(candidates) {
            candidatesContainer.innerHTML = candidates.map(candidate => `
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-semibold mb-2">${candidate.name}</h3>
                    <p class="mb-2">Votes: <span id="votes-${candidate.id}">${candidate.votes}</span></p>
                    <button onclick="vote(${candidate.id})" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Vote
                    </button>
                </div>
            `).join('');
        }

        async function vote(candidateId) {
            try {
                const response = await axios.post('/vote', {
                    candidate_id: candidateId
                });
                if (response.data.success) {
                    const votesElement = document.getElementById(`votes-${candidateId}`);
                    votesElement.textContent = response.data.votes;
                }
            } catch (error) {
                console.error('Error voting:', error);
            }
        }
    </script>
</body>

</html>
