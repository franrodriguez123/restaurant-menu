class UploadPreview
{
	constructor(input)
	{
		let wrapper = document.createElement('DIV');
		let img = document.createElement('IMG');
		
		wrapper.classList.add('upload-preview');
        wrapper.classList.add('none');
		wrapper.append(img);
		
		input.parentNode.insertBefore(wrapper, input)
		
		input.addEventListener('change', event => {
			const [file] = input.files;
			
			wrapper.classList.remove('none');
			
			if(file)
			{
    			img.src = URL.createObjectURL(file);
			}
		});
		
		if(input.dataset.file)
		{
			wrapper.classList.remove('none');
			img.src = '/img/logo/' + input.dataset.file;
		}
	}
}

document.querySelectorAll('input[type="file"]').forEach(element => {
	new UploadPreview(element);
});

document.querySelectorAll('select[multiple]').forEach(element => {
	new window.Choices('select[multiple]', {
		removeItemButton: true,
	});
});

document.querySelectorAll('table.sortable').forEach(element => {
	new Sortable(element.querySelector('tbody'), {
		animation: 150,
		onSort: event => {
			let data = {
				model: element.dataset.model,
				data: new Array(),
			};

			element.querySelectorAll('.id').forEach(item => {
				data.data.push(item.innerHTML);
			});

			axios.put(element.dataset.sortableListAjaxUpdateUrl, data, {
                	headers: {
                    	csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                	}
				})
				.then(response => {
					if(!response.data.success)
						alert(response.data.details);
				})
				.catch(error => {
					alert('Error: ' + error);
					console.error(error)
				});
		}
	});
});