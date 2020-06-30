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
}, false);
