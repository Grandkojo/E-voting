<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <div class="flex justify-between items-center mb-5">
            <a href="{{ route('voting.vote') }}">
                <button class="bg-blue-600 text-white p-2 rounded-md text-lg">Back to Vote</button>
            </a>
            <h1 class="text-3xl font-bold  text-center pr-[40%]">Voting Results</h1>
        </div>

        @foreach($categoryData as $category)
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">{{ $category['name'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <canvas id="chart-{{ Str::slug($category['name']) }}"></canvas>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Results Breakdown</h3>
                        <ul class="space-y-2">
                            @foreach($category['candidates'] as $candidate)
                                <li class="flex justify-between items-center">
                                    <span>{{ $candidate['name'] }}</span>
                                    <span class="font-semibold">{{ $candidate['votes'] }} votes ({{ $candidate['percentage'] }}%)</span>
                                </li>
                            @endforeach
                        </ul>
                        <p class="mt-4 text-right">Total Votes: {{ $category['totalVotes'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($categoryData as $category)
                new Chart(document.getElementById('chart-{{ Str::slug($category['name']) }}'), {
                    type: 'pie',
                    data: {
                        labels: {!! json_encode($category['candidates']->pluck('name')) !!},
                        datasets: [{
                            data: {!! json_encode($category['candidates']->pluck('votes')) !!},
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(153, 102, 255, 0.8)',
                            ],
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: '{{ $category['name'] }} - Vote Distribution'
                            }
                        }
                    }
                });
            @endforeach
        });
    </script>
</body>
</html>