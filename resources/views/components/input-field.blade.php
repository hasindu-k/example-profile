<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium">{{ $label }}</label>

    <div class="relative">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
            value="{{ old($name, $value) }}"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @if ($type === 'password') pr-10 @endif">

        @if ($type === 'password')
            <button type="button" class="absolute inset-y-0 right-3 flex items-center togglePassword">
                <i id="eyeIcon" class="fas fa-eye text-gray-500"></i>
            </button>
        @endif
    </div>

    @error($name)
        <div class="text-red-500 mt-2 text-sm font-medium">{{ $message }}</div>
    @enderror
</div>
