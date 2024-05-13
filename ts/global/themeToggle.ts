export default function themeToggle({ classList }: HTMLElement = document.querySelector('html') as HTMLElement) {
	let isDarkMode = localStorage.getItem('dark-mode') === 'true';

	if (isDarkMode) {
		classList.add('dark');
		classList.remove('light');
	} else {
		classList.add('light');
		classList.remove('dark');
	}

	document.addEventListener('keydown', (event) => {
		if (event.shiftKey && event.key === 'T' && document.activeElement.tagName !== 'INPUT') {
			localStorage.setItem('dark-mode', isDarkMode ? 'false' : 'true');
			isDarkMode = !isDarkMode;
			toggle(isDarkMode);
		}
	});

	const lightSwitch: HTMLInputElement = document.getElementById('theme-toggle') as HTMLInputElement;

	if (!lightSwitch) return;

	if (isDarkMode) lightSwitch.checked = true;

	lightSwitch.addEventListener('change', () => {
		const { checked } = lightSwitch;
		lightSwitch.checked = checked;
		isDarkMode = checked;
		toggle(checked);
	});
}

function toggle(state: boolean) {
	if (state) {
		document.documentElement.classList.add('dark');
		document.documentElement.classList.remove('light');
		localStorage.setItem('dark-mode', 'true');
	} else {
		document.documentElement.classList.remove('dark');
		document.documentElement.classList.add('light');
		localStorage.setItem('dark-mode', 'false');
	}
}
