<input
        type  = "hidden"
        name  = "permissions[{{ $id }}][{{ $operation }}]"
        value = "{{ isset($disable) ? '1' : '0' }}"
        {{ isset($disable) ? 'disabled' : '' }}
/>
<input
        type  = "checkbox"
        name  = "permissions[{{ $id }}][{{ $operation }}]"
        value = "1"
        {{ $allowed ? 'checked' : '' }}
        {{ isset($disable) ? 'disabled' : '' }}
/>
