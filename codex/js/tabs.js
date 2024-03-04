/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////////// TABS /////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

const tabs 	= document.querySelectorAll('.tabs');

if (check(tabs)) {

	tabs.forEach( tab => {

		tab.addEventListener('click', (e) => {
			// console.log(e);
			let btn_tab = e.target;

			if( e.target && btn_tab.classList.contains('tab-link') ){

					let tab_links 	= tab.querySelectorAll('.tab-link');
					let tab_content = tab.querySelectorAll('.tab-content');
					// console.log(tab_content);

					let tab_target 	= btn_tab.dataset.tab;

					tab_links.forEach((btn) => {
						btn.classList.remove('active');
					});

					btn_tab.classList.add('active');

					tab_content.forEach((content) => {

						let tab_data = content.dataset.tab;

						if(tab_target != "all"){

							if(tab_data == tab_target){
								content.classList.add('active');
							}else{
								content.classList.remove('active');
							}

						}else{

							content.classList.add('active');

						}

					});
			}

		});

	})

}