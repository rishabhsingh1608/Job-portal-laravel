<x-layout>
    <x-breadcrumbs :links="[
        'My jobs' => route('my-jobs.index'),
        'Create' => '#',
    ]" class="mb-4">
    </x-breadcrumbs>

    <x-card class="mb-8">
        <form action="{{ route('my-jobs.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title"></x-text-input>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location"></x-text-input>
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number"></x-text-input>
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea"></x-text-input>
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience')" :all-options="false"
                        :options="array_combine(
                            array_map('ucfirst', \App\Models\JobListing::$experience),
                            \App\Models\JobListing::$experience,
                        )"></x-radio-group>
                </div>


                <div>
                    <x-label for="category" :required="true">Category</x-label>


                    <x-radio-group name="category" :value="old('category')" :all-options="false"
                        :options="\App\Models\JobListing::$category"></x-radio-group>

                </div>
                <div class="col-span-2">

                    <x-button class="w-full">Create Job</x-button>
                </div>

            </div>
        </form>
    </x-card>
</x-layout>
