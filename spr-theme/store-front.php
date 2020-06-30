<?php ?>
<!-- Category menu with dropdowns-->
<div id="categoryDropdownDiv" class="row">
	<!-- Jaunumu kolonna -->
	<div class="col dropdown">
		<button id="jaumumiBtn" class="dropBtn"><a href="#jaunumi" class="dropActionAnchor">Jaunumi</a></button>
	</div>
	<!-- Zēniem kolonna -->
	<div class="col dropdown">
		<button id="dropZeniemBtn" class="dropBtn"><a href="#zeniem" class="dropActionAnchor">Zēniem</a></button>
		<div id="zeniemDropDown" class="dropdown-content">
			<a href="#zenu_krekli">Krekli</a>
			<a href="#zenu_bikses">Bikses</a>
			<a href="#zenu_apavi">Apavi</a>
			<a href="#zeniem">Vairāk</a>
		</div>
	</div>
	<!-- Meitenēm kolonna -->
	<div class="col dropdown">
		<button id="dropMeitenemBtn" class="dropBtn"><a href="#meitenem" class="dropActionAnchor">Meitenēm</button></a>
		<div id="meitenemDropDown" class="dropdown-content">
			<a href="#meitenu_krekli">Krekli</a>
			<a href="#meitenu_bikses">Bikses</a>
			<a href="#meitenu_apavi">Apavi</a>
			<a href="#meitenem">Vairāk</a>
		</div>
	</div>
	<!-- Zīdaiņiem kolonna -->
	<div class="col dropdown">
		<button id="dropZidainiemBtn" class="dropBtn"><a href="#zidainiem" class="dropActionAnchor">Zīdaiņiem</button></a>
		<div id="zidainiemDropDown" class="dropdown-content">
			<a href="#zidainu_1">Prece 1</a>
			<a href="#zidainu_2">Prece 2</a>
			<a href="#zidainu_3">Prece 3</a>
			<a href="#zidainiem">Vairāk</a>
		</div>
	</div>
	<!-- Akciju kolonna -->
	<div class="col dropdown">
		<button id="akcijasBtn" class="dropBtn"><a href="#akcijas" class="dropActionAnchor">Akcijas</a></button>
	</div>
</div>
<hr>
<br>
<!-- Product showcase div-->
<div id="productShowcaseDiv">
	<div class="row">

		<div class="col product-window-col">
			<div class="card">
				<img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/images/baby_clothes_example.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Bērnu apģērbs</h5>
					<p class="card-text">Izmērs: S</p>
					<a href="#" class="btn btn-primary">Skatīt vairāk</a>
				</div> <!-- Card body -->
			</div> <!-- Card ends -->
		</div> <!-- Col ends -->

		<div class="col product-window-col">col2</div>
		<div class="col product-window-col">col3</div>
		<div class="col product-window-col">col4</div>
	</div>
	<div class="row">
		<div class="col">col1</div>
		<div class="col">col2</div>
		<div class="col">col3</div>
		<div class="col">col4</div>
	</div>
	<div class="row">
		<div class="col">col1</div>
		<div class="col">col2</div>
		<div class="col">col3</div>
		<div class="col">col4</div>
	</div>
</div>
<?php ?>