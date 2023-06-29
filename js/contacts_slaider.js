class Slider {
	
	/* selecting elements from a HTML document */

	offset = 0;
	prev_btn = document.querySelector('.contact_info_slaider_prev');
	next_btn = document.querySelector('.contact_info_slaider_next');
    slider_line = document.querySelector('.contact_info_slaider_line');

	/* creating and initializing an object instance of that class */

	constructor() {
		this.GoPrev();
		this.GoNext();
	}
	
	/* open previous slide */

	GoPrev() {
		this.prev_btn.addEventListener('click', () => {
			this.offset -= 500;
			if (this.offset < 0) this.offset = 1500;
			this.slider_line.style.left = -this.offset + 'px';
		})
	}

	/* open next slide */

	GoNext() {
		this.next_btn.addEventListener('click', () => {
			this.offset += 500;
			if (this.offset > 1500) this.offset = 0;
			this.slider_line.style.left = -this.offset + 'px';
		})
	}
}

/* class Slider constructor call */

new Slider();