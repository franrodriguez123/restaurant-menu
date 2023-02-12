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