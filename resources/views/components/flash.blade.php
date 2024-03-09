 @props(['status', 'message'])

 @php
     $class = '';
     if ($status === 'success') {
         $class = 'bg-green-500';
     } elseif ($status === 'info') {
         $class = 'bg-blue-500';
     } elseif ($status === 'warning') {
         $class = 'bg-yellow-500';
     } elseif ($status === 'danger') {
         $class = 'bg-red-500';
     }
 @endphp

 @if ($status)
     <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
         <div x-show="show" x-transition class="fixed left-1/2 top-12 -translate-x-1/2">
             <p class="{{ $class }} rounded-lg px-4 py-3 text-sm text-black">{{ $message }}</p>
         </div>
     </div>
 @endif
