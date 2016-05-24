<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img alt="DMK" src="/Resources/Public/Images/dmk_e-business_logo.png" width="20" height="20"/></a>
			<a class="navbar-brand" href="/"><?php echo $GLOBALS['defaultTitle']?></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php if($controller == 'calculation') echo 'class="active"' ?>>
					<a href="/?controller=calculation&action=index">Kalkulationen</a>
				</li>
				<li <?php if($controller == 'item') echo 'class="active"' ?>>
					<a href="/?controller=item&action=index">Kalkulations&shy;positionen</a>
				</li>
				<li <?php if($controller == 'customer') echo 'class="active"' ?>>
					<a href="/?controller=customer&action=index">Kunden</a>
				</li>
				<li <?php if($controller == 'category') echo 'class="active"' ?>>
					<a href="/?controller=category&action=index">Kategorien</a>
				</li>
			</ul>
		</div>
	</div>
</nav>