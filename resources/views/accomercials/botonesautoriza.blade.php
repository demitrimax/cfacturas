@can('accomerciales-supervised')
  @if(empty($accomercial->aut1_at))
    <a href="{!! url('accomercials/autoriza1', [$accomercial->id]) !!}" class='btn bg-green' title="Autoriza Supervisor"><i class="fa fa-check-square-o"></i></a>
  @endif
@endcan
@can('accomerciales-authorized')
  @if(empty($accomercial->aut2_at))
    <a href="{!! url('accomercials/autoriza2', [$accomercial->id]) !!}" class='btn bg-purple' title="Autoriza Gerente"><i class="fa fa-check-square"></i></a>
  @endif
@endcan
