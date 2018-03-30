@include('boilerplate::load.select2')

@push('js')
<script>
    $(".select2").select2();
</script>
@endpush

<div class="box box-default">
    <iframe width="100%" height="100vh" style="overflow: hidden;height: 80vh;display: block;" src="https://apifootball.com/widget/display/index.php?display=nextMatch&id=4544"></iframe>

</div>