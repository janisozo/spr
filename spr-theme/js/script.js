window.addEventListener('load', function() {
	var dropdownA_tags = document.getElementsByClassName("dropActionAnchor");
	var dropdowns = [];
	var dropdown;

	

	// Add event listeners category dropdown tags
	for(let a_tag of dropdownA_tags) {
		
		// Check if dropdown exists first
		var dropdown = a_tag.parentElement.nextSibling.nextSibling;
		if(dropdown !== null) {
			dropdowns.push(dropdown); // Add dropdowns to an array to use process in a different loop

			// A tag enter event
			a_tag.addEventListener('mouseover', event => {
				dropdown = event.target.parentElement.nextSibling.nextSibling;
				dropdown.classList.add("show");
			});
			
			// A tag out event
			a_tag.addEventListener('mouseout', event => {
				if(!dropdown.matches(':hover')) {
					dropdown.classList.remove("show");
				}
			});
		}
	}
	
	// Add leave event listeners for when mouse is on dropdown
	for(let dropdown of dropdowns) {
		dropdown.addEventListener('mouseleave', event => {
			dropdown.classList.remove("show");
		});
	}


	// Add event listeners for single product page
	let re = /http:\/\/68\.183\.71\.67\/wordpress2\/index.php\/prece\/\?id=\d+$/;
	if (re.test(document.URL)) {
		// Product single page - add listeners for small thumbnails to change highlight if clicked
		single_product_highlight_change();

		// Product single page - check if size is chosen before adding to cart
		check_for_size_before_addtocart();
	}

	// New Product add page - image input and preview handling
	re = /http:\/\/68\.183\.71\.67\/wordpress2\/index.php\/jauna-prece/;
	if (re.test(document.URL)) {
		// Tmp thumbnail functionality
		prepare_upload_thumbnail_functionality();
		// Upload remove + reorder functionality
		prepare_upload_remove_functionality();
		// Enable category selection after gender selection
		enable_product_category_selection();
		// Enable size selection type change after category selection
		enable_size_selection_by_category();
	}
}, false);

function single_product_highlight_change() {
	var highlight = document.getElementById("product-highlight-img");
	var thumbnails = document.getElementsByClassName("single-product-small-image");

	// Add event listeners for each thumbnail
	for (let thumbnail of thumbnails) {
		thumbnail.addEventListener('click', event => {
			highlight.src = thumbnail.src;
		});
	}
}

function check_for_size_before_addtocart() {
	let hidddenSpan = document.getElementById("size-warning-span");
	let sizeBtns = document.getElementsByClassName("single-product-size-btn");
	let addToCartBtn = document.getElementById("add-to-cart-btn");
	let sizeChosen = false;

	// Add event listeners for each size btn
	for (let sizeBtn of sizeBtns) {
		sizeBtn.addEventListener('click', event => {
			sizeChosen = true;
			for(let sizeBtn of sizeBtns) {
				sizeBtn.classList.remove("active");
			}
			sizeBtn.classList.add("active");
		});
	}
	
	// Add event listeners for cart button
	addToCartBtn.addEventListener('click', event => {
		if(sizeChosen) {
			// console.log("added to cart"); - SUCCESS
			hidddenSpan.textContent = "Jūsu pirkums pievienots grozam!";
			hidddenSpan.style.display = "block";
			hidddenSpan.classList.remove("error");
			hidddenSpan.classList.add("success");
		} else {
			hidddenSpan.textContent = "Lūzdzu izvēlieties izmēru pirms ievietošanas grozā";
			hidddenSpan.style.display = "block";
			hidddenSpan.classList.remove("success");
			hidddenSpan.classList.add("error");
		}
	});
}

// 'Add new product page -->'
// * Image upload logic -->
function prepare_upload_thumbnail_functionality() {
	let image_inputs = document.getElementsByClassName("new-product-image-input");
	// let image_upload_previews = document.getElementsByClassName("new-product-img-preview-div");
	for(let image_input of image_inputs) {
		image_input.addEventListener('change', event => {
			let input_id_num = image_input.id.charAt(image_input.id.length-1);
			let upload_preview_div = document.getElementById("preview-thumbnail-div-" + input_id_num);
			let upload_preview_img = upload_preview_div.firstChild;
			let upload_file = image_input.files[0];
			let upload_type = upload_file.type;
			let image_file_types = ["image/jpeg", "image/png", "image/jpg"];
			let warning_box = document.getElementById('photo-input-warning');
			let remove_span = image_input.nextSibling;
			if (!(upload_type == image_file_types[0] || upload_type == image_file_types[1] || upload_type == image_file_types[2])) {
				console.log("file is not an image");
				upload_preview_div.style.visibility = "hidden";
				warning_box.textContent = "Lūdzu izvēlieties pareizu foto failu.";
				// image_input.style.color = "red";
				return false;
			} else {
				// Successful file upload
				let reader = new FileReader();
				reader.onload = (function(e) {
					warning_box.style.visibility = "hidden";
					// image_input.style.color = "green";
					upload_preview_div.style.visibility = "visible";
					upload_preview_div.style.display = "inline-block";
					upload_preview_img.src = e.target.result;
					remove_span.style.visibility = "visible";
					remove_span.classList.add("active-span");
					
					// Next input enabling
					if(input_id_num < 5) {
						let next_input_num = Number(input_id_num) + 1;
						let next_input = document.getElementById('input-image' + next_input_num);
						next_input.disabled = false;
						
					}
				});
				reader.readAsDataURL(upload_file);
			}
		});
	}

}

// Image remove functionality
function prepare_upload_remove_functionality() {
	let remove_spans = document.getElementsByClassName("cancel-file-span");

	// Get HTMLCollections
	let thumbnails = document.getElementsByClassName('preview-thumbnail-img');
	let image_inputs = document.getElementsByClassName('new-product-image-input');

	// Loop - add eventlisteners for each span
	for(let span of remove_spans) {
		// Get current span index
		let span_num = Number(span.id.charAt(span.id.length - 1));

		// Get individual same-index dynamic upload elements
		let image_input = document.getElementById('input-image' + span_num);
		let thumbnail = document.getElementById('preview-thumbnail-' + span_num);

		// Add event listener for span
		span.addEventListener('click', event => {

			// Get all the active spans first
			let active_spans = document.getElementsByClassName("active-span");

			// span.style.visibility = "hidden";
			// thumbnail.src = "";
			// thumbnail.parentElement.style.display = "none";
			// image_input.value = "";
			// image_input.disabled = true;

			// Only first span active
			if(active_spans.length === 1) {
				console.log("clicked first and only span");

				image_input.value = "";
				thumbnail.src = "";
				thumbnail.parentElement.style.display = "none";
				span.style.visibility = "hidden";
				span.classList.remove("active-span");
				
				// Disable second span
				image_inputs.item(span_num).disabled = true;
			} else if(span_num != active_spans.length) {
				console.log("clicked middle span");
				let i = 0;

				for (let active_span of active_spans) {
					console.log("i value: " + i);
					// Only change values for the tmp upload values with index starting from selected
					if(i + 1 >= span_num) {
						console.log("index i reached needed span_num");
						// Get iterated span index
						let span_index = Number(active_span.id.charAt(active_span.id.length - 1));

						// Get iterated span respective dynamic upload elements
						thumbnail = thumbnails.item(span_index - 1);
						image_input = image_inputs.item(span_index - 1);

						// Iterating last span
						if (i === active_spans.length - 1) {
							console.log("reached last span when iterating");
							
							// Remove set values
							thumbnail.src = "";
							thumbnail.parentElement.style.display = "none";
							image_input.value = "";
							active_span.style.visibility = "hidden";
							span.classList.remove("active-span");

							// Disable next input
							if (span_index !== 5) {
								image_inputs.item(span_index).disabled = true;
							}

						}
						// Iterating non-last span
						else {
							console.log("iterating middle span...");

							// Get iterated span respective next dynamic upload values => pop values from the stack
							next_thumbnail = thumbnails.item(span_index);
							next_img_input = image_inputs.item(span_index);
							// console.log("next thumbnail src: " + next_thumbnail.src);
							// console.log("next img_input value: " + next_img_input.value);
							
							thumbnail.src = next_thumbnail.src;
							image_input.value = "";
							// image_input.value = next_img_input.value;

						}
					} 
					// Increment the index
					i++;
				}	
			} else {
				console.log("clicked last active span");

				// Disable next input
				if (span_num !== 5) {
					image_inputs.item(span_num).disabled = true;
				}

				// Deletes uploaded values
				image_input.value = "";
				thumbnail.src = "";
				thumbnail.parentElement.style.display = "none";
				span.style.visibility = "hidden";
				span.classList.remove("active-span");
			}
		});
	}
}
// <-- Image upload logic *

// Enable category selection after gender selection
function enable_product_category_selection() {
	let gender_select = document.getElementById('new-product-gender-select');
	let category_select_container = document.getElementById('category-sub-container');
	let category_select = document.getElementById('new-product-category-select');

	gender_select.addEventListener('change', event => {
		let selected = event.target.value;

		let girlsSelected = false,
			boysSelected = false,
			babiesSelected = false;
		if(document.getElementsByClassName('girl-category').length > 0) { girlsSelected = true; }
		if (document.getElementsByClassName('boy-category').length > 0) { boysSelected = true; }
		if (document.getElementsByClassName('baby-category').length > 0) { babiesSelected = true; }

		switch(selected) {
			case "Meitenēm":
				// Remove boy options if they exist
				if (boysSelected) {
					var boy_options = document.getElementsByClassName("boy-category");
					for (let i = boy_options.length - 1; i >= 0; i--) {
						boy_options[i].remove();
					}
				}

				// Remove baby options if they exist
				if (babiesSelected) {
					var baby_options = document.getElementsByClassName("baby-category");
					for (let i = baby_options.length - 1; i >= 0; i--) {
						baby_options[i].remove();
					}
				}

				let girls_already_selected = document.getElementsByClassName('girl-category');
				if(girls_already_selected.length === 0) {
					let girls_product_categories = [
						"Aksesuāri",
						"Apakšveļa",
						"Apavi",
						"Bikses & legingi",
						"Blūzes",
						"Džemperi",
						"Džinsi",
						"Gultas veļa",
						"Jakas",
						"Kleitas",
						"Kostīmi",
						"Peldkostīmi",
						"Pidžamas",
						"Sporta tērpi",
						"Svārki",
						"T - krekli",
						"Tunikas",
						"Virsjakas",
						"Zeķes",
					];
					for(let i = 0; i < girls_product_categories.length; i++) {
						let option = document.createElement("option");
						option.text = girls_product_categories[i];
						option.classList.add('girl-category');
						category_select.add(option);
					}
				}
				break;
			case "Zēniem":

				// Remove girl options if they exist
				if (girlsSelected) {
					var girl_options = document.getElementsByClassName("girl-category");
					for (let i = girl_options.length - 1; i >= 0; i--) {
						girl_options[i].remove();
					}
				}

				// Remove baby options if they exist
				if (babiesSelected) {
					var baby_options = document.getElementsByClassName("baby-category");
					for (let i = baby_options.length - 1; i >= 0; i--) {
						baby_options[i].remove();
					}
				}

				let boys_already_selected = document.getElementsByClassName('boy-category');
				if (boys_already_selected.length === 0) {
					let boys_product_categories = [
						'Aksesuāri',
						'Apakšveļa',
						'Apavi',
						'Bikses',
						'Džemperi',
						'Džinsi',
						'Gultas veļa',
						'Jakas & Vestes',
						'Kostīmi',
						'Krekli',
						'Peldbikses',
						'Pidžamas',
						'Svētkiem bikses',
						'T - krekli',
						'Uzvalki',
						'Virsjakas',
						'Zeķes'
					];
					for (let i = 0; i < boys_product_categories.length; i++) {
						let option = document.createElement("option");
						option.text = boys_product_categories[i];
						option.classList.add('boy-category');
						category_select.add(option);
					}
				}
				break;
			case "Zīdaiņiem":

				// Remove girl options if they exist
				if (girlsSelected) {
					var girl_options = document.getElementsByClassName("girl-category");
					for (let i = girl_options.length - 1; i >= 0; i--) {
						girl_options[i].remove();
					}
				}

				// Remove boy options if they exist
				if (boysSelected) {
					var boy_options = document.getElementsByClassName("boy-category");
					for (let i = boy_options.length - 1; i >= 0; i--) {
						boy_options[i].remove();
					}
				}
	
				let babies_already_selected = document.getElementsByClassName('baby-category');
				if (babies_already_selected.length === 0) {
					let babies_product_categories = [
						'Aksesuāri',
						'Bodiji',
						'Gultas veļa',
						'Jaciņas',
						'Kombinzoni',
						'Komplekti',
						'Kristību tērpi',
						'Pidžamas',
						'Rāpulīši'
					];
					for (i = 0; i < babies_product_categories.length; i++) {
						option = document.createElement("option");
						option.text = babies_product_categories[i];
						option.classList.add('baby-category');
						category_select.add(option);
					}
				}
				break;
		}
		category_select_container.style.visibility = "visible";
	});
}

// Enable size selection by category selection
function enable_size_selection_by_category() {
	var category_select = document.getElementById('new-product-category-select');
	category_select.addEventListener('change', event => {
		let selected_category = event.target.value;

		// Define categories to check the size type by
		let misc_categories = [
			'asd',
			'asd'
		];
		let shoe_categories = [
			'apavi',
			'zeķes'
		];
		let pants_categories = [
			'Apakšveļa',
			'Bikses&legingi',
			'Džinsi',
			
		];

		// Define actual size arrays
		let misc_sizes = [
			'50',
			'56',
			'62',
			'68',
			'74',
			'80',
			'86',
			'92',
			'98',
			'104',
			'110',
			'116',
			'122',
			'128',
			'134',
			'140',
			'146',
			'152',
			'158',
			'164',
			'170',
			'176'
		];
		let shoe_sizes = [
			'16',
			'17',
			'18',
			'19',
			'20',
			'21',
			'22',
			'23',
			'24',
			'25',
			'26',
			'27',
			'28',
			'29',
			'30',
			'31',
			'32',
			'33',
			'34',
			'35',
			'36',
			'37',
			'38',
			'39',
			'40',
			'41',
			'42',
			'43',
			'44',
			'45'
		];
		let pants_sizes = [
			'98/104',
			'110/116',
			'122/128',
			'134/140',
			'146/152',
			'158/164',
			'170/176',
			'27',
			'28',
			'29',
			'30',
			'31',
			'32'
		];
		let age_sizes = [
			'0 / 1',
			'2 / 3',
			'4 / 5',
			'6 / 7',
			'8 / 9',
			'10 / 11',
			'12 / 13',
			'14 / 15'
		];

		console.log(selected_category);
	});
}
// <-- 'Add new product' page