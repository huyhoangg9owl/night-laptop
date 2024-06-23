import Carousel from '../global/carousel';

export default function Home() {
	const newsBannerCarousel = document.querySelector('[data-name="banner-carousel"]');
	const newsProductCarousel = document.querySelector('[data-name="news-product-carousel"]');

	if (newsBannerCarousel) new Carousel(newsBannerCarousel).init();

	if (newsProductCarousel) {
		new Carousel(newsProductCarousel, {
			autoplaySpeed: 3000,
			itemPerSlide: 5,
			gap: 8,
			breakpoint: [
				{
					screen: 1024,
					itemPerSlide: 3,
				},
			],
		}).init();
	}
}
