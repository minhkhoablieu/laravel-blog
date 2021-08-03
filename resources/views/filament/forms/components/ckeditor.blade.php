<x-forms::field-group
    :column-span="$formComponent->getColumnSpan()"
    :error-key="$formComponent->getName()"
    :for="$formComponent->getId()"
    :help-message="$formComponent->getHelpMessage()"
    :hint="$formComponent->getHint()"
    :label="$formComponent->getLabel()"
    :required="$formComponent->isRequired()"
>
    <div wire:ignore>
        <textarea
        {!! $formComponent->getId() ? "id=\"{$formComponent->getId()}\"" : null !!}
        {!! $formComponent->getName() ? "{$formComponent->getBindingAttribute()}=\"{$formComponent->getName()}\"" : null !!}
        class="block w-full rounded shadow-sm placeholder-gray-400 focus:placeholder-gray-500 placeholder-opacity-100 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 resize-none {{ $errors->has($formComponent->getName()) ? 'border-danger-600 motion-safe:animate-shake' : 'border-gray-300' }}"
        ></textarea>
    </div>


</x-forms::field-group>


@push('filament-scripts')
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    const editor = CKEDITOR.replace('{!! $formComponent->getId() !!}', {
        allowedContent: true,
    });

    const button = document.querySelector('button[type="submit"]');

    button.addEventListener('click', event => {
        @this.set('{!! $formComponent->getName() !!}', editor.getData())
    });
</script>
@endpush
