class Slider {

    /* selecting elements from a HTML document */  

	offset = 0;
	prev_btn = document.querySelector('.project_preview_slaider_prev');
	next_btn = document.querySelector('.project_preview_slaider_next');
    slider_line = document.querySelector('.project_preview_slaider_line');

    btn_first = document.querySelector('.project_preview_first_slaid');
    btn_second = document.querySelector('.project_preview_second_slaid');
    btn_third = document.querySelector('.project_preview_third_slaid');
    btn_fourth = document.querySelector('.project_preview_fourth_slaid');

    /* creating and initializing an object instance of that class */

	constructor() {
		this.GoPrev();
		this.GoNext();
        this.SliderFirst();
        this.SliderSecond();
        this.SliderThird();
        this.SliderFourth();
	}

    /* navigation buttons */

    /* open first slide */

    SliderFirst() {
        this.btn_first.addEventListener('click', () => {
        this.offest = 0;
        this.slider_line.style.left = -this.offest + 'px';
        })
    }

    /* open second slide */
    
    SliderSecond() {
        this.btn_second.addEventListener('click', () => {
        this.offest = 1220;
        this.slider_line.style.left = -this.offest + 'px';
        })
    }

    /* open third slide */
    
    SliderThird() {
        this.btn_third.addEventListener('click', () => {
        this.offest = 2440;
        this.slider_line.style.left = -this.offest + 'px';
        })
    }

    /* open fourth slide */

    SliderFourth() {
        this.btn_fourth.addEventListener('click', () => {
        this.offest = 3660;
        this.slider_line.style.left = -this.offest + 'px';
        })
    }

    /* main buttons */

    /* open previous slide */

	GoPrev() {
		this.prev_btn.addEventListener('click', () => {
			this.offset -= 1220;
			if (this.offset < 0) this.offset = 3660;
			this.slider_line.style.left = -this.offset + 'px';
		})
	}

    /* open next slide */

	GoNext() {
		this.next_btn.addEventListener('click', () => {
			this.offset += 1220;
			if (this.offset > 3660) this.offset = 0;
			this.slider_line.style.left = -this.offset + 'px';
		})
	}
}

/* class Slider constructor call */

new Slider();