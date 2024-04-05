@props(['id' => '', 'name' => '', 'label' => '', 'passenger'])
<div class="space-x-2">
    {{dd($passenger)}}
    <input type="checkbox" id="{{$id}}" name="{{$name}}" {!! $passenger === 1 ? 'checked' : '' !!}/>
    <label for="{{$name}}">{{$label}}</label>
</div>
