import themeToggle from './themeToggle';
export default function Global() {
    themeToggle();
    const scrollToTop = document.querySelector('#scroll-to-top');
    document.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        if (scrollToTop) {
            if (scrollTop > 100) {
                scrollToTop.classList.remove('hidden');
            }
            else {
                scrollToTop.classList.add('hidden');
            }
            scrollToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth',
                });
            });
        }
    });
}
