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
<br>

<!-- Product showcase div-->
<!-- Get 12 latest products -->
<?php
$latest_products = get_latest_products();
?>
<div id="productShowcaseDiv">
<?php
$i = 1;

// Product loop starts
while($row = $latest_products->fetch_assoc()) {
	if($i === 1) { ?>
		<div class="row mb-4"> <!-- Row starts -->
	<?php } ?>
		<div class="col-6 col-md-3 product-window-col"> <!-- Product column starts -->
			<div class="card"> <!-- Card starts -->
				<a href="<?php echo(get_site_url() . "/index.php/prece?id=" . $row['Product_ID']); ?>" class="card-img-a"><img class="card-img-top" src="<?php echo($row['Product_Image1']); ?>" alt="Card image cap"></a>
				<?php if($row['Is_New']) { ?> <span class="jauns-ribbon ribbon">Jauns</span> <?php } ?>
				<?php if($row['Is_Discounted']) { ?> <span class="akcija-ribbon ribbon">Akcija</span> <?php } ?>
				<div class="card-body"> <!-- Card body starts -->
					<a class="listed-product-header" href="<?php echo(get_site_url() . "/index.php/prece?id=" . $row['Product_ID']); ?>"><?php echo($row['Product_Name']); ?></a>
					<p class="card-text" style="text-align: center;">Izmērs: <?php echo($row['Product_Size']); ?></p>
					<span class="listed-product-price" style="text-align: center; display: block;"><?php echo($row['Product_Price']); ?> €</span>
				</div> <!-- Card body ends -->
			</div> <!-- Card ends -->
		</div> <!-- Product column starts -->
<?php
	if($i === 4) { ?>
	</div> <!-- Row ends -->
	<?php }
	if ($i === 4) {
		$i = 1;
	} else {
		$i++;
	}
?>
<?php } // Product loop ends ?> 
</div>
