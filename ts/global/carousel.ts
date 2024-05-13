type BreakPoint = {
	screen: number;
	itemPerSlide: number;
};

interface Options {
	autoplay: boolean;
	autoplaySpeed: number;
	itemPerSlide: number;
	gap: number;
	breakpoint?: BreakPoint[];
}

interface OptionsCustom {
	autoplay?: boolean;
	autoplaySpeed?: number;
	itemPerSlide?: number;
	gap?: number;
	breakpoint?: BreakPoint[];
}

export default class Carousel {
	carouselElement: Element;
	afterChangedSlideFunc: Function;
	options: Options;

	carouselItem: HTMLElement;
	carouselItems: NodeListOf<HTMLElement>;
	carouselIndicators: NodeListOf<HTMLElement>;
	carouselPrevButton: HTMLButtonElement | null;
	carouselNextButton: HTMLButtonElement | null;
	carouselItemsLength: number;
	currentItem: number;
	intervalFunction: null | number;

	constructor(carouselElement: Element, options?: OptionsCustom, afterChangedSlideFunc = () => {}) {
		this.carouselElement = carouselElement;

		this.carouselItem = carouselElement.querySelector('[data-name="carousel-items"]') as HTMLElement;
		this.carouselItems = this.carouselItem.querySelectorAll('[data-name="carousel-item"]');

		this.carouselIndicators = carouselElement.querySelectorAll('[data-name="carousel-indicator"]');

		this.carouselPrevButton = carouselElement.querySelector('button[data-name="action-prev"]');
		this.carouselNextButton = carouselElement.querySelector('button[data-name="action-next"]');

		this.carouselItemsLength = this.carouselItems.length;
		this.currentItem = 0;

		this.intervalFunction = null;

		this.options = {
			autoplay: true,
			autoplaySpeed: 5000,
			itemPerSlide: 1,
			gap: 0,
			...options,
		};

		this.afterChangedSlideFunc = afterChangedSlideFunc;
	}

	init() {
		this.autoPlay();
		if (this.carouselIndicators.length) this.indicatorsEvent();
		this.getID(this.currentItem);
		this.stopAutoPlayWhenHover(this.carouselElement);

		this.changeCSS(this.currentItem);
		if (this.carouselPrevButton && this.carouselNextButton) {
			this.carouselPrevButton.addEventListener('click', () => this.prev());
			this.carouselNextButton.addEventListener('click', () => this.next());
		}
		document.addEventListener('resize', ({ target }) => {
			if (target) {
				this.changeCSS(this.currentItem);
			}
		});
	}

	ResizeBreakPoint() {
		const { breakpoint } = this.options;
		if (breakpoint) {
			const { innerWidth } = window;
			breakpoint.forEach(({ screen, itemPerSlide }) => {
				if (innerWidth <= screen) {
					this.resizeItems(itemPerSlide);
				} else {
					this.resizeItems();
				}
			});
		} else {
			this.resizeItems();
		}
	}

	resizeItems(itemPerSlide = this.options.itemPerSlide) {
		const { clientWidth: parentWidth } = this.carouselElement;
		const { gap } = this.options;
		this.carouselItems.forEach((item, index) => {
			item.style.width = `${parentWidth / itemPerSlide - gap + gap / itemPerSlide}px`;
			item.style.marginRight = `${gap}px`;
			if (
				this.carouselItemsLength - 1 - itemPerSlide + this.currentItem === index ||
				(this.currentItem > 0 && index <= this.currentItem - 1)
			) {
				item.style.marginRight = '0';
			}
		});
	}

	prev() {
		this.currentItem =
			this.currentItem === 0 ? this.carouselItemsLength - this.options.itemPerSlide : this.currentItem - 1;
		this.updateCarousel();
	}

	next() {
		this.currentItem =
			this.currentItem >= this.carouselItemsLength - this.options.itemPerSlide ? 0 : this.currentItem + 1;
		this.updateCarousel();
	}

	changeCSS(next: number) {
		const classes = this.carouselItem.classList;
		classes.forEach((className) => className.includes('translate-x-') && classes.remove(className));
		const { clientWidth } = this.carouselItems[0];
		if (next) this.carouselItem.classList.add(`translate-x-[-${clientWidth * next}px]`);
		this.ResizeBreakPoint();
	}

	updateCarousel() {
		if (this.intervalFunction) clearInterval(this.intervalFunction);
		if (this.carouselIndicators.length) {
			this.carouselIndicators.forEach(this.indicatorInactive);
			this.indicatorActive(this.carouselIndicators[this.currentItem]);
		}
		this.changeCSS(this.currentItem);
		this.getID(this.currentItem);
		this.ResizeBreakPoint();
	}

	goToSlide(id: number) {
		this.changeCSS(id);
		this.currentItem = id;
	}

	indicatorsEvent() {
		if (this.currentItem === 0) {
			this.carouselIndicators[0].classList.remove('bg-white/40');
			this.carouselIndicators[0].classList.add('bg-white');
		}
		this.carouselIndicators.forEach((indicator, index) => {
			indicator.addEventListener('click', () => {
				if (this.intervalFunction) clearInterval(this.intervalFunction);
				this.carouselIndicators.forEach(this.indicatorInactive);
				this.indicatorActive(indicator);
				this.afterChangedSlideFunc(this.carouselItems[index].getAttribute('data-props'));
				this.autoPlay();
			});
		});
	}

	indicatorActive(indicator: HTMLElement) {
		indicator.classList.remove('bg-white/40');
		indicator.classList.add('bg-white');
		const indicatorIndex = parseInt(indicator.getAttribute('data-index') || '1');
		this.goToSlide(indicatorIndex);
	}

	indicatorInactive(indicator: HTMLElement) {
		indicator.classList.add('bg-white/40');
		indicator.classList.remove('bg-white');
	}

	getID(id: number) {
		const item = this.carouselItems[id];
		const dataID = item.getAttribute('data-props');
		this.afterChangedSlideFunc(dataID);
	}

	autoPlay() {
		if (!this.options.autoplay) return;
		if (this.intervalFunction) {
			clearInterval(this.intervalFunction as number);
		}

		this.intervalFunction = setInterval(() => {
			this.next();
			this.ResizeBreakPoint();
		}, this.options.autoplaySpeed);
	}

	stopAutoPlayWhenHover(element: Element) {
		element.addEventListener('mouseover', () => {
			clearInterval(this.intervalFunction as number);
		});
		element.addEventListener('mouseleave', () => {
			this.autoPlay();
		});
	}
}
