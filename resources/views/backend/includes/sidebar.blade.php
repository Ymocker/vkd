<h4>{{ trans('bside.operation') }}</h4>
<!-- Sidebar Menu -->
<ul class="sidebar-menu nav">

	<li class="{{ active_class(if_uri(['admin/dashboard']), 'selected') }}">
		<a href="{!! url('admin/dashboard') !!}" title="{{ trans('bside.titlerednum') }}">{{ trans('bside.rednum') }}</a>
	</li>
	<li class="{{ active_class(if_uri(['admin/add']), 'selected') }}">
		<a href="{!! url('admin/add') !!}" title="{{ trans('bside.titleadd') }}">{{ trans('bside.newrek') }}</a>
	</li>
	<li class="{{ active_class(if_uri(['admin/addtext']), 'selected') }}">
		<a href="{!! url('admin/addtext') !!}" title="{{ trans('bside.titletext') }}">{{ trans('bside.text') }}</a>
	</li>

	<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('bside.del') }} <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
                    <li><a href="{!! url('admin/polosa/1') !!}">{{ trans('bside.first') }}</a></li>
                    <li><a href="{!! url('admin/polosa/2') !!}">{{ trans('bside.inner') }}</a></li>
                    <li><a href="{!! url('admin/polosa/4') !!}">{{ trans('bside.fourth') }}</a></li>
                    <li class="divider"></li>
                    <li><a href="{!! url('admin/polosa/0') !!}">{{ trans('bside.site') }}</a></li>
            </ul>
	</li>

	<li class="{{active_class(if_uri(['admin/polosa/999']), 'selected') }}">
		<a href="{!! url('admin/polosa/999') !!}" title="{{ trans('bside.titlearch') }}">{{ trans('bside.arch') }}</a>
	</li>

	@if ($admData['addNewNom'])
		<li class="{{active_class(if_uri(['admin/newnumber']), 'selected') }}">
			<a href="{!! url('admin/newnumber') !!}" title="{{ trans('bside.titleadd') }}">{{ trans('bside.newnum') }}</a>
		</li>
	@else
		<li class="{{active_class(if_uri(['admin/delnumber']), 'selected') }}">
			<a href="{!! url('admin/delnumber') !!}" title="{{ trans('bside.titlelast') }}">{{ trans('bside.last') }}</a>
		</li>
	@endif

	<li class="{{active_class(if_uri(['admin/settings']), 'selected') }}">
		<a href="{!! url('admin/settings') !!}" title="{{ trans('bside.sett') }}">{{ trans('bside.sett') }}</a>
	</li>
	<li>
	   <hr>
	</li>
        <li class="{{active_class(if_uri(['admin/stat']), 'selected') }}">
		<a href="{!! url('admin/stat') !!}" title="{{ trans('bside.stat') }}">{{ trans('bside.stat') }}</a>
	</li>
        <li class="{{active_class(if_uri(['admin/security']), 'selected') }}">
		<a href="{!! url('admin/security') !!}" title="{{ trans('bside.sec') }}">{{ trans('bside.sec') }}</a>
	</li>
	<li>
	   <hr>
	</li>
        <li>
		<a href="{!! url('admin/logout') !!}" title="{{ trans('bside.exit') }}">{{ trans('bside.exit') }}</a>
	</li>

</ul><!-- /.sidebar-menu -->