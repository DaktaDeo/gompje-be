import './bootstrap';

import Alpine from 'alpinejs';
import { toDarkMode, toLightMode, toSystemMode, updateTheme, updateThemeAndSchemeColor } from './components/theme';

window.Alpine = Alpine;

Alpine.start();

// window.toDarkMode = toDarkMode;
// window.toLightMode = toLightMode;
// window.toSystemMode = toSystemMode;
// window.updateTheme = updateTheme;
//
// window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
//     if (localStorage.theme === 'system') {
//         if (e.matches) {
//             document.documentElement.classList.add('dark');
//         } else {
//             document.documentElement.classList.remove('dark');
//         }
//     }
//     updateThemeAndSchemeColor();
// });
//
// updateTheme();



