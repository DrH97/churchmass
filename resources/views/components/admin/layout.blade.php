<div class="flex items-start max-md:flex-col">

    <div class="flex-1 self-stretch max-md:pt-6">
        <flux:heading size="xl" level="1">{{ $heading ?? '' }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ $subheading ?? '' }}</flux:subheading>

        <flux:separator variant="subtle" />

        <div class="mt-5 w-full">
            {{ $slot }}
        </div>
    </div>
</div>
