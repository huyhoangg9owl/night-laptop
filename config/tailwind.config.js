tailwind.config = {
	darkMode: 'class',
	theme: {
		extend: {
			colors: {
				zinc: {
					600: '#2f2f2f',
					800: '#1f1f1f',
				},
			},
			keyframes: {
				sweepIn: {
					'0%': {
						opacity: '0',
						transform: 'translateY(-10px)',
					},
					'100%': {
						opacity: '1',
						transform: 'translateY(0)',
					},
				},
			},
			gridTemplateRows: {
				'auto-35px': 'repeat(auto-fit, 35px)',
			},
		},
	},
};
