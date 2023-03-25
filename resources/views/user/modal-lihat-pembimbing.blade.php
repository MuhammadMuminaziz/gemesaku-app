<div class="col-md-4 text-center mb-2">
    @if($pembimbing->image == null)
<img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle" width="120" data-toggle="tooltip" title="Wildan Ahdian">
@else
<img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle" width="120" data-toggle="tooltip" title="Wildan Ahdian">
@endif
</div>
<div class="col-md-8 pt-3 text-md-left text-center">
    <h5 class="mb-0">{{ $pembimbing->name }}</h5>
    <p class="text-secondary" style="margin-bottom: -10px;">{{ $pembimbing->email }}</p>
    <p class="text-secondary" style="margin-bottom: -10px;">{{ $pembimbing->school->name }}</p>
</div>