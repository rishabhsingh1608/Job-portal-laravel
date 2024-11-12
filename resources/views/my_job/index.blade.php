<x-layout>
    <x-breadcrumbs :links="[
        'My jobs' => '#',
    ]" class="mb-4">
    </x-breadcrumbs>
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>

    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>{{ $application->created_at->diffForHumans }}</div>
                            <div>Download CV</div>


                        </div>
                        <div>${{ $application->expected_salary }}</div>

                    </div>
                @empty
                    No applications yet
                @endforelse
                <div class="flex space-x-2 mt-4">
                    <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-button>Delete</x-button>
                    </form>

                </div>

            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet

            </div>
            <div class="text-center">
                Post your first job <a href="{{ route('my-jobs.create') }}"
                    class="text-indigo-500 hover:underline">here!</a>

            </div>

        </div>
    @endforelse
</x-layout>
